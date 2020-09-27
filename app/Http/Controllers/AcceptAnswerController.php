<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;

class AcceptAnswerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Reply $reply)
    {
        $this->authorize('accept', $reply);
        $reply->question->acceptBestAnswer($reply);
//        broadcast(new BestReplyEvent($reply->id, 1))->toOthers();
//        if(request()->expectsJson()){
//            return response()->json([
//                'message' => "You've Marked this Answer as Best Answer"
//            ]);
//        }
        return redirect()->back();
    }
}
