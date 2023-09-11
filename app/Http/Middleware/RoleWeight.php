<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleWeight
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $weight): Response
    {
        $userRole = $request->user()?->user_role ?? 0;

        //嘗試進入不是自己身分該進的路由
        if (!str_contains($weight, strval($userRole))) {
            //若身分是管理員
            if ($userRole == '1') {
                return redirect(route('backend.index'));
            }
            //身分不是管理員
            return redirect(route('front.index'));
        }
        return $next($request);
    }
}
