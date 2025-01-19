<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('layouts.auth.login.index', [
            'title' => 'Login'
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return redirect('login')->with('error', $validator->errors());
        }

        $data = $request->only(['username', 'password']);

        if(!Auth::attempt($data)) {
            return redirect('login')->with('error', collect(['message' => 'Username or password incorrect']));
        }

        return redirect('/admin');

    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
