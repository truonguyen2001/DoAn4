<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginApiController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
