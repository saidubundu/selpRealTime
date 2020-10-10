<?php

namespace App\Http\Controllers;

use App\Http\Resources\NotificationResource;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NotificationController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('auth:sanctum');
    }

    public function index(){
        return [
            'read' => NotificationResource::collection(auth()->user()->readNotifications),
            'unread' => NotificationResource::collection( auth()->user()->unreadNotifications)
        ];
    }

    public function markAsRead(Request $request)
    {
        auth()->user()->notifications->where('id', $request->id)->markAsRead();
    }
}
