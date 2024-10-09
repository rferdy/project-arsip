<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    // view login
    public function index()
    {
        return view('login');
    }
    // view register
    public function viewReg() {
        return view('register');
    }
    // store register
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('login');
    }

    // login function
    public function submitLogin(Request $request){
        $data = $request->only('email', 'password');

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('datatower');
        } else {
            return redirect()->back()->with('Gagal', 'Email atau Password anda salah!');
        }
    }
    // Logout
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
