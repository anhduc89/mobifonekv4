<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLogin
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
        /**
         * + Trường hợp hết session: 
         * 
         *      Khi chuyển hướng sau 1 page thì vào đây check session.
         * 
         *      Trường hợp hết session thì lấy địa trang hiện tại lưu vào session pre_url
         * 
         *      Để khi đi đăng nhập lại thì vẫn về trang vừa chuyển mà mất session.
         * 
         * + Trường đăng nhập bình thường:  thì không ảnh hưởng gì
         * 
         */
        
        $url = url()->current();

        if ($request->session()->has('name')) {

            if($request->session()->has('pre_url')){

                $pre_url = session()->get('pre_url');

                session()->forget('pre_url');

                return redirect()->to($pre_url);

            }

            return $next($request);

        } else {
            
            session()->put('pre_url', $url);

            return redirect()->to('/loginAdmin');
        }

    }
}
