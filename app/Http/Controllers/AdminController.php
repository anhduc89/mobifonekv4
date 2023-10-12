<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginAdmin()
    {
        // dd(bcrypt('anhduc89'));
        if (auth()->check() == true) {
            return redirect()->route('/homeAdmin'); // nếu đăng nhập thành công thì về đây
        } else {
            return back()->with('error','Bạn chưa đăng nhập');
            // return view('login');
        }

    }

    public function postLogin(Request $request)
    {

        $remember = $request->has('remember_me') ? true : false;
        if (
            auth()->attempt([
                'name' => $request->name,
                'password' => $request->password
            ],
                $remember)
        ) {
            return redirect()->to('homeAdmin');
        }
    }

    public function postLogout(Request $request)
    {
        Session::flush();

        Auth::logout();

        return redirect()->route('login');
    }
}
