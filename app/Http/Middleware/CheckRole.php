<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


         if ($request->user()===null) {

           return redirect('/post');
        }

        $actions=$request->route()->getaction();
        $roles=isset($actions['roles']) ? $actions['roles']:null;

        if ($request->user()->hasAnyRole($roles) || !$roles) {
            # code...
             return $next($request);
        }


           return redirect('/post'); 

       
    }
}
