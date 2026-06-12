<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private function generateCaptcha(): array
    {
        $a = rand(1, 20);
        $b = rand(1, 20);
        return ['a' => $a, 'b' => $b, 'answer' => $a + $b];
    }

    public function showLogin()
    {
        $captcha = $this->generateCaptcha();
        session(['captcha_answer' => $captcha['answer']]);
        return view('auth.login', ['captcha' => $captcha]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
            'captcha'  => 'required|integer',
        ]);

        if ((int) $request->captcha !== (int) session('captcha_answer')) {
            $captcha = $this->generateCaptcha();
            session(['captcha_answer' => $captcha['answer']]);
            return back()->withErrors(['captcha' => 'Jawaban verifikasi salah.'])->onlyInput('email')->with('captcha', $captcha);
        }

        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(
                auth()->user()->is_admin ? '/admin/dashboard' : '/member/dashboard'
            );
        }

        $captcha = $this->generateCaptcha();
        session(['captcha_answer' => $captcha['answer']]);
        return back()->withErrors(['email' => 'Email atau password salah.'])->onlyInput('email')->with('captcha', $captcha);
    }

    public function showRegister()
    {
        $captcha = $this->generateCaptcha();
        session(['captcha_answer' => $captcha['answer']]);
        return view('auth.register', ['captcha' => $captcha]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'captcha'  => 'required|integer',
        ]);

        if ((int) $request->captcha !== (int) session('captcha_answer')) {
            $captcha = $this->generateCaptcha();
            session(['captcha_answer' => $captcha['answer']]);
            return back()->withErrors(['captcha' => 'Jawaban verifikasi salah.'])->onlyInput('name', 'email')->with('captcha', $captcha);
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect('/member/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
