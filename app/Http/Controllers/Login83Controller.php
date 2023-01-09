<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Session;

class Login83Controller extends Controller
{
    public function login83()
    {
        Auth::logout();
        return view('login.login');
    }

    public function registrasi83()
    {
        return view('login.registrasi');
    }

    public function prosesregistrasi83(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        if($request->role){
            $role = 'admin';
        }else {
            $role = 'user';
        }

        $name = $request->old('name');
        $email = $request->old('email');

        $addUser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $role
        ]);

        return redirect('login83');
    }

    public function prosesLogin83(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns', 
            'password' => 'required',
		]);

        $password = User::where('email', $request->email)->first()->password;
        if (!Hash::check($request->password, $password)) {
            throw ValidationException::withMessages([
                'password' => 'Password salah'
            ]);
        }

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        if (Auth::Attempt($data)) {
            if (Auth::user()->role == 'admin') {
                return redirect('/');
            } else {
                return redirect('/profile83');
            }
        } else {
            // Session::flash('error', 'Email atau Password Salah');
            return redirect('login83');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login83');
    }
}
