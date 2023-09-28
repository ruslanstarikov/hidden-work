<?php

namespace App\Http\Controllers;

use App\Helpers\Country;
use App\Mail\PasswordResetMail;
use App\Models\User;
use App\Notifications\PasswordResetSuccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $request->has('remember_me'))) {
            // Authentication was successful
            return response(null)
                ->withHeaders([
                    'HX-Redirect' => '/'
                ]);
        }

        // Authentication failed
        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);
    }

    public function registerForm()
    {
        return view('auth.register', ['countries' => Country::all()]);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'country' => 'required|string',
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'location' => $data['country'],
        ]);

        // Automatically log the user in after registration
        Auth::attempt(['email' => $data['email'], 'password' => $data['password']]);

        return redirect()->route('home');  // or wherever you'd like to redirect after registration
    }

    public function forgotForm()
    {
        return view('auth.forgot');
    }

    public function forgot(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $user = User::where('email', $request->email)->first();

        // Generate a token for the user
        $token = Str::random(60);

        // Store it in the password_reset_tokens table
        DB::table('password_reset_tokens')->where([
            'email' => $user->email,
        ])->delete();
        DB::table('password_reset_tokens')->insert([
            'email' => $user->email,
            'token' => $token,
            'created_at' => now()
        ]);

        // Send the email
        Mail::to($user->email)->send(new PasswordResetMail($token));

        return back()->with('status', 'We have emailed your password reset link!');
    }

    public function resetForm()
    {
        $token = request()->route('token');
        return view('auth.reset', ['token' => $token]);
    }

    public function reset(Request $request, string $token)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        // Check if the email exists in the database
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'No account found with this email address.']);
        }
        // Validate the token
        $tokenData = DB::table('password_reset_tokens')->where('token', $token)->where('email', $request->email)->first();

        if (!$tokenData) {
            return redirect()->back()->withErrors(['email' => 'Invalid token provided.']);
        }

        // Update the password and delete the token
        $user->password = Hash::make($request->password);
        $user->setRememberToken(Str::random(60));
        $user->save();

        // Notify the user about the password change
        $user->notify(new PasswordResetSuccess());

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('status', 'Password reset successfully. You can now log in with your new password.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}




