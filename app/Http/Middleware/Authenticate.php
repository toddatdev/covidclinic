<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('index');
        }

//        if (auth()->user()->is_admin == 1) {
//            return route('dashboard.index');
//        }elseif (auth()->user()->is_admin == 0){
//            return route('root');
//        }
//        else{
//            return '/';
//        }

    }
}
