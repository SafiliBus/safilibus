<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Models\User;


class ForgotPasswordController extends Controller
{
    // Tampilkan form kirim email lupa password
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email'); // pastikan kamu ada view ini
    }

    // Proses kirim email reset password
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with(['status' => __($status)]);
        } else {
            return back()->withErrors(['email' => __($status)]);
        }
    }

    public function sendVerificationCode(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email',
    ]);

    $user = User::where('email', $request->email)->first();

    // Buat kode random 6 digit
    $code = rand(100000, 999999);

    // Simpan kode ke database
    $user->verification_code = $code;
    $user->save();

    // Kirim email
    Mail::raw("Kode verifikasi kamu: $code", function ($message) use ($user) {
        $message->to($user->email)
                ->subject('Kode Verifikasi Reset Password');
    });

    return response()->json(['message' => 'Kode verifikasi telah dikirim ke email kamu.']);
}
}