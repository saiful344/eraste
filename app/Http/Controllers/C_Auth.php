<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class C_Auth extends Controller
{
   public function login()
    {
		return view('auth.login');
	}
	public function postlogin(Request $request)
	{
	 	if (Auth::attempt($request->only('email','password'))) {
	 	if (Auth::user()->role == "user") {
	 			return redirect("/");
	 	} else {
	 			return redirect("/product");
	 	}
	 }
	 return redirect("/login");
	} 

	public function logout()
	{
		Auth::logout();
		return redirect("/login");
	}
}
