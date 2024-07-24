<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class ArtistAuth
{
   
    public function handle(Request $request, Closure $next): Response
    {
        if(!Session::has('id'))
        {
            return redirect('artist')->with('message', 'Invliad credential');
        }
        return $next($request);
    }
}
