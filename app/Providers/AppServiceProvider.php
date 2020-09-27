<?php

namespace App\Providers;

use App\Models\Reply;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //JsonResource::withoutWrapping();

        Inertia::share('auth.user', function (Reply $reply){
            return[
                'loggedIn' => Auth::user(),
                //'accept' => Auth::user()->can('accept', $reply),
            ];
        });
    }
}
