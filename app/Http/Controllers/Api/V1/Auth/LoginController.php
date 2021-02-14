<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\LoginApiRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * @group Authentication
 */
class LoginController extends Controller
{
    /**
     * Login
     * 
     * This api endpoint help Login user to application by entering the email
     * and password
     * @unauthenticated
     * @responseFile status=200 scenario="On success" responses/auth/login_success.json
     * @responseFile status=422 scenario="Validation error" responses/auth/login_validation.json
     * @responseFile status=401 scenario="Unauthorized" responses/auth/login_credential_not_match.json
     * @responseFile status=404 scenario="Not found" responses/auth/login_not_exists.json
     * @responseFile status=500 scenario="Internal server error" responses/common/internal_error.json
     * 
     * @param  App\Http\Requests\Api\V1\LoginApiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function login(LoginApiRequest $request)
    {
        try {
            $validatedRequest = $request->validated();
            
            $user = User::where('email', $validatedRequest['email'])->first();

            if($user === null){
                return $this->sendError('User does not exists');
            }

            if(Hash::check($validatedRequest['password'], $user->password)){
                $token = $user->createToken('API token')->plainTextToken;
                return $this->sendResponse('Login successfull', ['token' => $token]);
            }else{
                return $this->sendError('Credentials does not match', HTTP_UNAUTHORIZED);
            }
        } catch (\Exception $th) {
            return $this->sendInternalError([
                            'class' => __CLASS__,
                            'function' => __FUNCTION__,
                            'message' => $th->getMessage()
                        ]);
        }
    }

    /**
     * Logout
     *
     * This api endpoint revoke the access token provides by login api
     * @response status=200 scenario="On success" {
     *      "success": true,
     *      "message": "Logout successfully"
     * }
     * @response status=503 scenario="Service Unavailable" {
     *      "success": false,
     *      "message": "Something went wrong plrase try again."
     * }
     * @responseFile status=500 scenario="Internal server error" responses/common/internal_error.json
     * 
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        try {
            $user = auth()->user();
            $res = $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
            if($res){
                return $this->sendResponse('Logout successfully');
            }else{
                return $this->sendError('Something went wrong plrase try again.', HTTP_SERVICE_UNAVAILABLE);
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
