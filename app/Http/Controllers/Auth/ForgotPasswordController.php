<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\ForgotPasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /**
     * show the rest password form
     * @param token
     * @return view
     */
    public function showForm($token){
        $data['token'] = $token;
        $data['email'] = request()->query('email') ?? '';
        return view('auth.forgot-password', compact('data'));
    }

    /**
     * handle the password rest form submission
     * @param 
     * 
     */
    public function formSubmission(ForgotPasswordRequest $request){
        try {
            
            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $password) use ($request) {
                    $user->forceFill([
                        'password' => Hash::make($password)
                    ])->save();

                    $user->setRememberToken(Str::random(60));

                    event(new PasswordReset($user));
                }
            );

            return $status == Password::PASSWORD_RESET
                        ? redirect()->route('success')->with('status', __($status))
                        : back()->withErrors(['email' => [__($status)]]);
        } catch (\Exception $th) {
            return back()->with('fail', 'Internal server error.');
        }
    }

    /**
     * display succes form
     * 
     */
    public function success(){
        return view('success');
    }
}
