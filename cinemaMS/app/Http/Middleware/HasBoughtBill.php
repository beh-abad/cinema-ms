<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HasBoughtBill
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if (session()->has('user_id')) {
        //     if (DB::table('orders')->where('who_ordered_id', '=', session('user_id'))->exists()) {
        //         return $next($request);
        //     } else {
        //         redirect('successaction');
        //     }
        // }
        return $next($request);
    }
}
