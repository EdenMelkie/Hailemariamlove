<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validate login data
        $request->validate([
            'UserName' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        // Attempt to authenticate the user
        $account = Account::where('UserName', $request->UserName)->first();

        if ($account && \Hash::check($request->password, $account->password)) {
            // Set the authenticated user
            Auth::login($account);

            // Redirect based on user type
            switch ($account->U_Type) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'staff':
                    return redirect()->route('staff.dashboard');
                case 'student':
                    return redirect()->route('student.dashboard');
                default:
                    return redirect()->route('login')->with('error', 'User type not recognized');
            }
        }

        // If authentication fails
        return back()->withErrors(['UserName' => 'Invalid credentials'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
