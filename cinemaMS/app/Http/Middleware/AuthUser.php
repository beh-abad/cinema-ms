<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class AuthUser
{
    public function handle(Request $request, Closure $next)
    {
        $order = Order::where('who_ordered_id', '=', session('user_id'));
        $order_film_id = Order::where('film_id', '=', session('film_id'));
        $order_film_id_count = $order_film_id->count();
        if (session()->has('frgt') && $request->path() == 'resettingpassword') {
            return $next($request);
        }
        if (!session()->has('user_id')) {
            return redirect('userlogin');
        }
        return $next($request);
    }
}
