<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\ForgotPasswordApiRequest;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Password;

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
     * @responseFile status=200 scenario="Success" responses/auth/forgot-password/success.json
     * @responseFile status=422 scenario="Validation error" responses/auth/forgot-password/validation-error.json
     * @responseFile status=500 scenario="Internal server error" responses/common/internal-server-error.json
     * @unauthenticated
     *
     * @param App\Http\Requests\Api\V1\ForgotPasswordRequest $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ForgotPasswordApiRequest $request, UserRepositoryInterface $userRepository)
    {
        try {
            $email  = $request->only('email');
            $exists = $userRepository->exists(['email' => $email]);

            if($exists){
                $status = Password::sendResetLink($email);
                
                if($status === Password::RESET_LINK_SENT){
                    return $this->sendResponse(__($status));
                } else if($status === Password::RESET_THROTTLED){
                    return $this->sendError('Too many request. '.__($status), HTTP_TOO_MANY_REQUESTS);
                }else{
                    return $this->sendError(__($status));
                }

            }else{
                return $this->sendError('We can\'t find a user with that email address.');
            }
        } catch (\Exception $th) {
            return $this->sendInternalError([
                                'class' => __CLASS__,
                                'function' => __FUNCTION__,
                                'message' => $th->getMessage()
                            ]);
        }
    }
}
