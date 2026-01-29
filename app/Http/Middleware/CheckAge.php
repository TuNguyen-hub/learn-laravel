<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
{
    // Lấy tuổi từ Session
    $age = session('user_age');

    // Kiểm tra logic theo đề bài
    // 1. Nếu không có tuổi, hoặc không phải số, hoặc nhỏ hơn 18
    if (!$age || !is_numeric($age) || $age < 18) {
        return response("Không được phép truy cập", 403);
    }

    // 2. Nếu >= 18 thì cho qua
    return $next($request);
}
}
