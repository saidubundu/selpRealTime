<?php

namespace App\Http\Controllers;

use App\Models\Watcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WatchersController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function watcher($id)
    {
        Watcher::create([
            'question_id' => $id,
            'user_id' => \auth()->user()->id(),
        ]);

        return redirect()->back();
    }

    public function unWatcher($id)
    {
        $watcher = Watcher::where('question_id', $id)->where('user_id', Auth::id());
        $watcher->delete();

        return redirect()->back();
    }
}
