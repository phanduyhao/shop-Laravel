<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginContronller extends Controller
{
    public function index(){
       return view('admin.users.login',[
        'title' => 'Đăng nhập hệ thống'
       ]);
    }
    public function store(Request $request){

        $this->validate($request,[
            'email' => 'required|email::filter', // Kiểm tra đã nhập Email chưa, có đúng định dạng Email không ?
            'password' => 'required' // Kiểm tra đã nhập mật khẩu chưa ?
        ] );
        // Kiểm tra người dùng nhập vào có đúng thông tin Email và Pass không ?
        if(Auth::attempt([ //Auth:  Xác thực
            'email' => $request->input('email'),
            'password' => $request->input(('password'))
        ], $request->input('remember'))){
            return redirect()->route('admin');
        }
        return redirect()->back();
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
