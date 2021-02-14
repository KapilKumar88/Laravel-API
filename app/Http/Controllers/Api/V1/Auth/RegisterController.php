<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\RegisterApiRequest;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

/**
 * @group Authentication
 */
class RegisterController extends Controller
{
    /**
     * Register
     * 
     * This endpoint helps you to register the user in the
     * application by entering the email, name, password 
     * @unauthenticated
     * @responseFile status=201 scenario="On success" responses/auth/register_success.json
     * @responseFile status=422 scenario="Validation error" responses/auth/register_validation_res.json
     * @responseFile status=500 scenario="Internal server error" responses/common/internal_error.json
     * 
     * @param  \App\Http\Requests\Api\V1\RegisterApiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterApiRequest $request, UserRepositoryInterface $userRepository)
    {
        try {
            $validatedRequest = $request->validated();
            $validatedRequest['password'] = Hash::make($validatedRequest['password']);

            $user = $userRepository->create($validatedRequest);
            return $this->sendResponse('User registered successfully', $user, HTTP_CREATED);

        } catch (\Exception $th) {
           return $this->sendInternalError([
                                        'class'     => __CLASS__,
                                        'function'  => __FUNCTION__,
                                        'message'   => $th->getMessage()
                                    ]);
        }
    }
}
