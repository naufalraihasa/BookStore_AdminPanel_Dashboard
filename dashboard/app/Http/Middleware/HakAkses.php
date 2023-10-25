<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HakAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if(in_array($request->user()->role, $roles)){
            return $next($request);
        }
        return redirect('/');
    }
}

// class HakAkses
// {
//     // /**
//     //  * Handle an incoming request.
//     //  *
//     // //  * @param  \Closure  $next
//     // //  * @param  string  ...$roles
//     // //  * @return mixed
//     //  */
//     public function handle(Request $request, Closure $next, ...$roles)
//     {
//         $userRole = $request->user()->role;

//         if ($userRole === 'master') {
//             return redirect('/analytics');
//         } elseif ($userRole === 'userA') {
//             return redirect('/analytics_store_A');
//         } elseif ($userRole === 'userB') {
//             return redirect('/analytics_store_B');
//         }

//         return $next($request);
//     }
// }

