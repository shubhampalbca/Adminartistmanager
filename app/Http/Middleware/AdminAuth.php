<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class AdminAuth
{
   
    public function handle(Request $request, Closure $next): Response
    {
        if(!Session::has('id'))
        {
            return redirect('admin')->with('message', 'Invliad credential');
        }
        return $next($request);
    }
}
