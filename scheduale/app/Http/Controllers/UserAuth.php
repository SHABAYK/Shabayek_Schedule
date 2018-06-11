<?php

namespace App\Http\Controllers;

use App\Model\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAuth extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function dologin()
    {
       /*$users = User::where('type','admin')->get();*/
       $admin = DB::table('users')->where('type','admin')->pluck('type')->first();
       $academic= DB::table('users')->where('type','academic')->pluck('type')->first();
       $manager= DB::table('users')->where('type','manager')->pluck('type')->first();
       $student= DB::table('users')->where('type','student')->pluck('type')->first();
       $doctor= DB::table('users')->where('type','doctor')->pluck('type')->first();
       $email = \request('email');
       $type = DB::table('users')->where('email','like',"%{$email}%")->pluck('type')->first();
         //return dump($student);
        $rememberme = request('rememberme') == 1 ? true : false;

        if (auth()->attempt(['email' => request('email'), 'password' => request('password')], $rememberme) AND $admin == $type) {
                return redirect('user');
            }
            elseif (auth()->attempt(['email' => request('email'), 'password' => request('password')], $rememberme) AND $academic == $type ) {
                return 'Welcome Academic';
            }
            elseif (auth()->attempt(['email' => request('email'), 'password' => request('password')], $rememberme) AND $manager == $type ) {
                return redirect('semester');
            }
            elseif (auth()->attempt(['email' => request('email'), 'password' => request('password')], $rememberme) AND $student == $type ) {
                return view('Student.Profile.home');
            }
            elseif (auth()->attempt(['email' => request('email'), 'password' => request('password')], $rememberme) AND $doctor == $type ) {
                return 'Welcome Doctor';
            }
            else {
                session()->flash('error', 'Invalid Email or Pass');
                return redirect('login');
            }


    }

    public function logout(){
        auth()->guard('web')->logout();
        return redirect('/');
    }
}
