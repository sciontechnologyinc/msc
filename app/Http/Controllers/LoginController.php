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

        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|exists:users,password'
        ]);

        
        if(Auth::attempt([
            'email'      => $request->email,
            'password'   => $request->password
        ]))

      
        {
            $user = User::where('email', $request->email)->first();

            if($user->is_admin())

            {
                return redirect()->route('dashboard.index');
            }

                return redirect()->route('monitoring.index');
        }

            
            return redirect()->back();
                
    }

}
