<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    // Admin Login PArt Logic Start *******************
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email|max:255|exists:users,email',
                'password' => 'required|min:4|max:20',
            ]);
            $credentials = $request->only('email', 'password');
            $remember = ($request->filled('remember')) ? true : false;
            if (Auth::attempt($credentials, $remember)) {
                $request->session()->regenerateToken();

                return ResponseHelper::Out(true, 'Login SuccessFully', 200);
            } else {
                return ResponseHelper::Out(false, 'Invalid Credentials,Check Your Email Or Password.', 401);
            }
        } catch (ValidationException $e) {
            return ResponseHelper::Out(false, $e->errors(), 422);
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'Login Failed, Please Try Again.', 500);
        }

    }
    // Admin Login PArt Logic End *******************

    // Admin Logout Part start ***************************
    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return ResponseHelper::Out(true, 'Logout Successful', 200);
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'Logout Failed, Please Try Again.', 500);
        }
    }
    // Admin Logout Part end ***************************
}
