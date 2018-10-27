<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
class LoginController extends Controller
{


    public function login(Request $request){

        $messages = [
            "email.required" => "Email is required",
            "email.email" => "Email is not valid",
            "email.exists" => "Email doesn't exists",
            "password.required" => "Password is required",
            "password.min" => "Password must be at least 6 characters"
        ];

        // validate the form data
        $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
                'password' => 'required|min:6'
            ], $messages);
        $validator->getMessageBag()->add('password', 'Wrong password');

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            // attempt to log
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password ])) 
            {
            $user = User::where('email', $request->email)->first();
            if($user->is_admin())
                {
                return redirect()->route('dashboard.index');
                }
            else 
                {
                return redirect()->route('monitoring.index');
                }
            }

            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
                'password' => 'Wrong password',
            ]);
           
        }


       
                
    }

}
