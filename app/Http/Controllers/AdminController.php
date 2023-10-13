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
        // dd(bcrypt('anhduc89'));
        if ($request->session()->all())
        {
            return redirect()->route('homeAdmin'); // nếu đăng nhập thành công thì về đây
        }
        else
        {
            // return back()->with('error','Bạn chưa đăng nhập');
            return view('loginAdmin');
        }
    }

    public function postLogin(Request $request)
    {
        // $remember = $request->has('remember_me') ? true : false;
        // if (
        //     auth()->attempt([
        //         'name' => $request->name,
        //         'password' => Hash::make($request->password)
        //     ])
        // ) {
        //     return redirect()->to('homeAdmin');
        // }
        $name = $request->name;
        $password = bcrypt($request->password);

        $userLogin = collect(DB::select('SELECT * FROM USERS WHERE NAME=\''.$name.'\' AND PASSWORD=\''.$password.'\''))->first();

        // echo "<pre>"; print_r($userLogin);
        // // // #echo $userLogin->password;
        // exit;

        if( $userLogin )
        {
            if($name == $userLogin->name && Hash::check($password,$userLogin->password))
            {
                $request->session()->put([
                    'id'            =>  $userLogin->id,
                    'name'          =>  $userLogin->name,
                    'email'         =>  $userLogin->email
                ]);
                return redirect()->to('homeAdmin');
            }
            else
            {
                return redirect()->to('/loginAdmin')->with('warning','Mật khẩu không đúng');
            }
        }
        else
        {
            return redirect()->to('/loginAdmin')->with('error','Tài khoản hoặc mật khẩu không chính xác');
        }
    }

    public function postLogout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('loginAdmin');
    }
}
