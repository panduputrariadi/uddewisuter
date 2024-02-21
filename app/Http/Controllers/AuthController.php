<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function login()
    {
        return view('auth.login');
    }


    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Alert::toast('Selamat datang dan selamat belanja!', 'success')->position('top-end');
            return redirect()->intended('/');
        }

        Alert::error('Error', 'Username and Password are Wrong!');

        return redirect('/login');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function signUp(Request $request){
        try {
            $validated = $request->validate([
                'name' => 'string|nullable',
                'email' => 'string|required|email|unique:users,email',
                'password' => 'string|required|min:6|unique:users,password',
                'role' => 'nullable'
            ]);

            $validated['password'] = Hash::make($validated['password']);
            $validated['role'] = 'pelanggan';

            $user = User::create($validated);
            Alert::success('success', 'Berhasil mendaftarkan akun anda');
            return redirect('login');
        } catch (ValidationException $e) {
            $errors = $e->errors();
            foreach ($errors as $field => $errorMessages) {
                foreach ($errorMessages as $errorMessage) {
                    Alert::error('Error', $errorMessage);
                }
            }

            return redirect()->back()->withInput();
        }
    }
}
