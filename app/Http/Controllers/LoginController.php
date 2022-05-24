<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('/admin/pages/login');
    }
    public function loginPost(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //Validation
            $rules = [
                'email' => 'required|email:filter',
                'password' => 'required'
            ];

            $customMasage = [
                'email.required' => 'Vui lòng nhập Email!',
                'password.required' => 'Vui lòng nhập Password!',
                'email.email' => 'Email không hợp lệ!'
            ];

            $this->validate($request, $rules, $customMasage);

            //Check TK và MK đúng
            if (Auth::guard('web')->attempt([
                'email' => $data['email'],
                'password' => $data['password'],
            ])) {
                return redirect('/admin/home');
            } else {
                Session::flash('error_message', 'Đăng nhập không thành công!');
                return redirect()->back()->withInput();
            }
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('admin/login');
    }
}
