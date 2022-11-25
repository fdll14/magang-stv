<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title'=> 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }

        return back()->with('loginError', 'Gagal untuk login!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        return redirect('/');
    }

    public function register()
    {
        return view('login.register', [
            'title'=> 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'NIM' => 'required|string',
            'jurusan' => 'required|string',
            'asal' => 'required|string',
            'name' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'email' => 'required|email|unique:users,email,',
            'nohp' => 'required|string'
        ]);

        $user = User::create([
            'NIM' => $request->NIM,
            'jurusan' => $request->jurusan,
            'asal' => $request->asal,
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email,
            'nohp' => $request->nohp,
            'role' => 'magang'
        ]);

        if ($user) {
            return redirect()
                ->route('login')
                ->with([
                    'success' => 'Akun Berhasil Dibuat!'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Oops!, something went wrong please try again!'
                ]);
        }
    }
}
