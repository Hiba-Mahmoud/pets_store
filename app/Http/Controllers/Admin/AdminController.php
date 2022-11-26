<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\User;
use App\Mail\ConfirmEmail;
use Illuminate\Support\Str;
use App\Http\Requests\Login;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use Ramsey\Uuid\Rfc4122\Validator
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PinCodeRequest;
use App\Http\Requests\AddAdminRequest;
use Illuminate\Support\Facades\Validator;
// use Validator;
class AdminController extends Controller
{


    public function home()
    {
        return view('admin.dashboard');
    }
    public function loginForm()
    {
        return view('admin.login');
    }





    public function login(Login $request)
    {

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (!(auth()->user()->email_verified_at)) {
                return redirect('index')->with(['message' => 'please verify you email']);
            }

            return redirect()->intended('/');
        }

        return redirect("login")->withSuccess('Login details are not valid or make sure you are an admin');
    }




    public function verifyEmail(PinCodeRequest $request)
    {

        // $admin = User::where('email', $request->email)->first();
        // $updated =  $admin->update(['email_verified_at' => Carbon::now()]);
        auth()->user()->update(['email_verified_at' =>now()]);

        return redirect()->intended('/');
    }





    public function index()
    {
        return view('admin.verifyEmail');
    }



    public function addAdminForm()
    {
        return view('admin.register');
    }




    public function addAdmin(AddAdminRequest $request)
    {
        $code = rand(1111, 9999);
        $admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
            'pin_code' => $code,
            'remember_token' => Str::random(40),
        ]);
        Mail::to($admin->email)
            ->send(new ConfirmEmail($code));

        return redirect('/')->with(['message' => 'admin created successfuly']);
    }


    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
