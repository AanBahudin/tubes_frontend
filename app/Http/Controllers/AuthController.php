<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginPage(Request $request)
    {
        $isLoggedIn = $request->session()->get('isLoggedIn');
        $role = $request->session()->get('role');
        $username = $request->session()->get('username');

        if ($isLoggedIn) {
            if ($role == "ADMIN") {
                return redirect('/admin/dashboard');
            } else if ($role == "OWNER") {
                return redirect('/owner/dashboard');
            } else {
                return redirect('/');
            }
        }

        return view('login', [
            'title' => 'Login in to your account',
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ]);
    }

    public function registerPage(Request $request) {
        $isLoggedIn = $request->session()->get('isLoggedIn');
        return view('register', [
            'title' => 'Create your own account',
            'isLoggedIn' => $isLoggedIn,
            'username' => $username
        ]);
    }

    public function login(Request $request)
    {

        $email = $request->email;
        $password  = $request->password;

        // check if email exist
        $isEmailExist = Pengguna::where('email', $email)->first();

        if (!$isEmailExist) {
            dd("email is not found!");

            // later throw new error message
        }

        // check user password
        $isPasswordMatch = Hash::check($password, $isEmailExist->password);
        if (!$isPasswordMatch) {
            dd("password salah");
        }

        // store data 

        Session::put('user_id', $isEmailExist->id);
        Session::put('nama', $isEmailExist->nama);
    Session::put('username', $isEmailExist->username);
        Session::put('email', $isEmailExist->email);
        Session::put('role', $isEmailExist->role);
        Session::put('isLoggedIn', TRUE);

        return redirect('/');

    }

    public function register(Request $request)
    {
        $validateUser = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required|unique:pengguna',
            'password' => 'required',
            'role' => 'required'
        ]);

        $validateUser['password'] = Hash::make($request->password);
        Pengguna::create($validateUser);

        return redirect('/');
    }

    public function logout(Request $request) {
        $request->session()->flush();

        return redirect('/');
    }
}
