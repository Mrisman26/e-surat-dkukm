<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ceklevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$levels)
    {
        if (in_array($request->user()->level,$levels)){
            return $next($request);
        }
        // abort(403, 'Akses Ditolak');

        return redirect('/Dashboard')->with('error','Maaf Anda Tidak Memiliki Akses');

    }
}
