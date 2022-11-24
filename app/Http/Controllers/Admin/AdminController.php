<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Mail\ConfirmEmail;
use App\Http\Requests\Login;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\AddAdminRequest;

class AdminController extends Controller
{


    public function loginForm(){
        return view('admin.login');
    }




    public function login(Login $request){
        $admin = User::where('email',$request->email);
        return 'tuuuuuuuuuuuuu';

    }




    public function addAdminForm(){
        return view('admin.register');
    }




    public function addAdmin(AddAdminRequest $request ){
        $code = rand(1111, 9999);
        $admin = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password,
            'role'=>$request->role,
            'pin_code'=> $code,
        ]);
        Mail::to($admin->email)
        ->send(new ConfirmEmail($code));

        return redirect('/')->with(['message'=>'admin created successfuly']);

    }
}
