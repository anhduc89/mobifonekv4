<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginAdmin(Request $request)
    {
        // return view('login');
        // dd(bcrypt('anhduc89'));
        if ($request->session()->has('name')) {
            return redirect()->route('homeAdmin'); // nếu đăng nhập thành công thì về đây
        } else {
            // return back()->with('error','Bạn chưa đăng nhập');
            return view('login');
        }
    }

    public function postLogin(Request $request)
    {

        $password = $request->password;

        $name = preg_replace('/[><" ";]/', '', $request->name);

        $userLogin = collect(DB::select("SELECT * FROM `users` WHERE NAME= '" . $name . "'"))->first();

        // Kiểm tra xem mật khẩu
        if ($userLogin) {
            if (Hash::check($password, $userLogin->password)) {

                $request->session()->put([
                    'id' => $userLogin->id,
                    'name' => $userLogin->name,
                    'email' => $userLogin->email
                ]);

                return redirect()->to('/homeAdmin');

            } else {
                return redirect()->to('/loginAdmin')->with('warning', 'Mật khẩu không đúng');
            }
        } else {
            return redirect()->to('/loginAdmin')->with('warning', 'Tài khoản không tồn tại');
        }
    }

    public function postLogout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('loginAdmin');
    }
}
