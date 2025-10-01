<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Http\Requests\signupRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // signup (GET), signup (POST), login (GET), login (POST), logout (POST)
    public function showSignupForm() // signup (GET) to render the signup page
    {
        return view("auth.signup", ["pageTitle" => "signup"]);
    }

    public function signup(signupRequest $request) // signup (POST) the logic for the signup request
    {
        $user = new User();
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->password = $request->input("password");

        $user->save();

        auth()->login($user);

        // $user->password = bcrypt($request->input("password"));
        return redirect("/");
    }

    public function showLoginForm() // login (GET) to render the login page
    {
        return view("auth.login", ["pageTitle" => "login"]);
    }

    public function login(loginRequest $request) // login (POST) the logic for the login request
    {
        $credentials = $request->only("email", "password");
        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect("/");
        }

        return back()->withErrors(["email" => "Email or Password is wrong."])->withInput();
    }

    public function logout()
    {
        auth()->logout();
        return redirect("/");
    }
}
