<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class TwoFactorController extends Controller
{
    /**
     * Tampilkan halaman verifikasi 2FA.
     */
    public function index(Request $request)
    {
        if (!$request->session()->has('2fa:user:id')) {
            return redirect()->route('login');
        }

        return view('auth.2fa');
    }

    /**
     * Proses verifikasi token 2FA.
     */
    public function store(Request $request)
    {
        $request->validate([
            'two_factor_code' => ['required', 'string'],
        ]);

        $userId = $request->session()->get('2fa:user:id');
        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('login');
        }

        if ($user->two_factor_code !== $request->two_factor_code) {
            throw ValidationException::withMessages([
                'two_factor_code' => 'Kode verifikasi salah.',
            ]);
        }

        if (now()->greaterThan($user->two_factor_expires_at)) {
            // Reset code
            $user->two_factor_code = null;
            $user->two_factor_expires_at = null;
            $user->save();

            $request->session()->forget(['2fa:user:id', '2fa:remember']);

            throw ValidationException::withMessages([
                'two_factor_code' => 'Kode verifikasi sudah kedaluwarsa. Silakan login kembali.',
            ]);
        }

        // Login sukses
        Auth::login($user, $request->session()->get('2fa:remember', false));
        
        // Bersihkan token
        $user->two_factor_code = null;
        $user->two_factor_expires_at = null;
        $user->save();
        
        $request->session()->forget(['2fa:user:id', '2fa:remember']);
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }
}
