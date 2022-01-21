<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin;
use Illuminate\Support\Str;


class AdminLoginController extends Controller
{
    public function adminLogin(Request $request){
       $data = $request->all();
         
        if($request->isMethod('post')){
            $validatedata = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
            if(Auth::guard('admin')->attempt(['email' => $data['email'],'password'=>$data['password']])){
                Session::flash('success_message', "You are successfully loggedin..");
                return view('admin.dashboard');
            }else{
               Session::flash('error_message', "Sorry ! credentials doesnot match");
                return redirect()->back();
            }
        }else{
            if(Auth::guard('admin')->check()){
                return view('admin.dashboard');
            }else{
                return view('admin.login');
            }
        }
    }

    public function adminDashboard(){
        return view('admin.dashboard');
    }

    public function forgetPassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $validateData = $request->validate([
                'email'=> 'required|email'
            ]);
            $adminCount = Admin::where('email', $data['email'])->count();
            if($adminCount == 0){
                return redirect()->back()->with('error_message', 'User does not exists in the database.');
            }
            $adminDetail = Admin::where('email', $data['email'])->first();
            $random_password = Str::random(10);
            $new_password = bcrypt($random_password);
            Admin::where('email', $data['email'])->update(['password' => $new_password]);
            $email = $data['email'];
            $name = $adminDetail->name;
            $messageData = ['email' => $data['email'], 'password' => $random_password, 'name' => $name];
            Mail::send('email.forgetPassword', $messageData, function($message) use ($email){
                $message->from('thagunnaharish23@gmail.com', 'First Website');
                $message->to($email)->subject('New Password -> First Website.');
            });
            return redirect()->route('adminLogin')->with('success_message', 'Your Password updated successfully. please check your emailaddress.');

        }
        return view('admin.forgetPassword');
    }

    public function registerUser(){
        return view('admin.registerUser');
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        Session::flash('warning_message', "You are logged out.");
        return redirect('/admin/login');
    }

}
