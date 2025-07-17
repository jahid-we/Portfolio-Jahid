<?php

namespace App\Http\Controllers\Admin;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\ResetPasswordNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ResetPasswordController extends Controller
{
    // Reset Password Email Send Part start ***************************
    public function sendEmail(Request $request)
    {
        try {

            $request->validate([
                'email' => 'required|string|email|max:255|exists:users,email',
            ]);
            $token = Str::random(64);
            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $request->email],
                [
                    'token' => $token,
                    'created_at' => Carbon::now(),
                ]
            );

            $user = User::where('email', $request->email)->first();
            $user->notify(new ResetPasswordNotification($token));

            return ResponseHelper::Out(true, 'Reset Password Link Sent to Your Email', 200);

        } catch (ValidationException $e) {
            return ResponseHelper::Out(false, $e->errors(), 422);
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'Email Send Failed, Please Try Again.', 500);
        }
    }
    // Reset Password Email Send Part end ***************************

    // Reset Password Part start ***************************
    public function resetPassword(Request $request)
    {
        try {
            $request->validate([
                'token' => 'required|string|max:64',
                'password' => 'required|string|min:4|max:20|confirmed',
            ]);
            $record = DB::table('password_reset_tokens')->where('token', $request->token)->first();
            if (! $record) {
                return ResponseHelper::Out(false, 'Invalid or Expired Token', 400);
            }
            $user = User::where('email', $record->email)->first();
            if (! $user) {
                return ResponseHelper::Out(false, 'User Not Found', 404);
            }

            $user->update(['password' => Hash::make($request->password)]);

            DB::table('password_reset_tokens')->where(['token' => $request->token])->delete();

            return ResponseHelper::Out(true, 'Password Reset Successful', 200);

        } catch (ValidationException $e) {
            return ResponseHelper::Out(false, $e->errors(), 422);
        } catch (Exception $e) {
            return ResponseHelper::Out(false, 'Reset Password Failed, Please Try Again.', 500);
        }
    }
    // Reset Password Part end ***************************

}
