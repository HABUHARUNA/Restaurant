<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function register(){
        return view('payment.register');
    }
    public function store(Request $request){
        $formdata = $request->validate([
            'fullname' => 'required',
            'emailAddress' => 'required|email',
            'number' => 'required|min:11|max:15',
            'password' => 'required|confirmed|min:5',
            'password_confirmation' => 'required'
        ]);
        try {
            $user = User::create([
                'name' => $request->fullname,
                'email' => $request->emailAddress,
                'number' => $request->number,
                'is_admin' => false,
                'password' => bcrypt($request->password)
            ]);
        
        return redirect('/')->with('success', 'User Created Successfully');
        } catch(\Throwable $th){
            return back()->with('danger', $th->getMessage());
        }
    }
}
