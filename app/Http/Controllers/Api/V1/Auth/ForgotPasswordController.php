<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @group Authentication
 */
class ForgotPasswordController extends Controller
{
    /**
     * Forgot Password
     * 
     * This api endpoint help the user to reset password
     * by sending the link to user email
     * @unauthenticated
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        
    }
}
