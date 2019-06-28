<?php

namespace App\Http\Middleware;

use Redirect;
use Closure;

class Adminlogin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (!$request->user() || $request->user()->admin != 1) {
            return redirect('/');
        }
        if ($request->route()->named('user')) {
            return view('admin.index');
        }
        return $next($request);
    }

}
