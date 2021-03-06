<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Http\Resources\QuestionResource;
use App\Http\Resources\UserResource;
use App\Models\Category;
use App\Models\Question;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

class QuestionController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth:sanctum', ['except' => ['index', 'show', 'user']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Inertia::render('Question/Index', [
            'questions' => Question::latest()->get()->map(function ($question){
                return [
                  'id' => $question->id,
                  'title' => $question->title,
                    'slug' => $question->slug,
                    'path' => $question->path,
                     'body' => $question->body,
                    'views' => $question->views,
                    'likes' => $question->like,
                    'created' => $question->created_at->diffForHumans(),
                    'category'=> $question->category->name,
                    'category_id'=> $question->category->id,
                    'author' => $question->user->name,
                    'reply_count' => $question->replies->count(),
                    'best_reply' => $question->best_reply_id,
                    'user_path' => $question->user->path,
                    'user_id' => $question->user->id

                ];
            }),
            'auth_user' => Auth::user(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Question $question)
    {
        //
        return Inertia::render('Question/CreateQuestion',[
            'categories' => Category::all()->map(function ($category){
                return[
                    'id' => $category->id,
                    'slug' => $category->slug,
                    'name' => $category->name
                ];
            }),

            'auth_user' => Auth::user(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        //
        auth()->user()->question()->create($request->all());
        return Redirect::route('question.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question, Reply $reply)
    {
        //
        $question->increment('views');
        return Inertia::render('Question/ReadQuestion', [
             'question' => new QuestionResource($question),
            'auth_user' => Auth::user(),

//            'can' => [
//                'edit_question' => Auth::user()->can('update', $question),
//                'delete_question' => Auth::user()->can('delete', $question),
//                'accept' => Auth::user()->can('accept', $reply),
//            ]
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
        $this->authorize("update", $question);
        return Inertia::render('Question/EditQuestion',[
            'categories' => Category::all()->map(function ($category){
                return[
                    'id' => $category->id,
                    'slug' => $category->slug,
                    'name' => $category->name
                ];
            }),
            'question' => $question,
            'auth_user' => Auth::user(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, Question $question)
    {
        //
        $this->authorize("update", $question);
        $question->update($request->all());
        return redirect()->route('question.show', $question->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
        $this->authorize('delete', $question);
        $question->delete();
        return Redirect::route('question.index');
    }

    public function user(User $user)
    {
        return Inertia::render('User/Index',[
            'users' => new UserResource($user),
            'auth_user' => Auth::user(),
        ]);
    }
}
