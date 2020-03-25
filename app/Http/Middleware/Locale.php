<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;
use App;
use Session;

class Locale
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

        $language = session('language', 'vi');
        // Lấy dữ liệu lưu trong Session, không có thì trả về default lấy trong config

        App::setLocale($language);

        return $next($request);    
    }
}
