<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Gregwar\Captcha\CaptchaBuilder;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function index()
    {
        $builder = new CaptchaBuilder();
        $builder->build(200, 60);

        // Store the captcha phrase in session
        session(['captcha' => $builder->getPhrase()]);

        // Get inline base64 image representation
        $captchaImage = $builder->inline();

        return view('auth.register', compact('captchaImage'));
    }

    /**
     * Handle user registration.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'captcha' => ['required', 'string'],
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal terdiri dari 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'captcha.required' => 'Kode captcha wajib diisi.',
        ]);

        // Verify Captcha (Case-Insensitive comparison)
        if (strtolower($request->captcha) !== strtolower(session('captcha'))) {
            return back()
                ->withErrors(['captcha' => 'Kode captcha yang Anda masukkan salah.'])
                ->withInput();
        }

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Clear captcha from session
        session()->forget('captcha');

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan masuk menggunakan akun Anda.');
    }
}
