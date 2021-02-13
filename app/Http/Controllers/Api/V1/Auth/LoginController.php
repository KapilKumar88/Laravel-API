<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\LoginApiRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Generate a api token
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
     * Revoke the api token
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        try {
            $user = auth()->user();
            $res = $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
            if($res){
                return $this->sendResponse('Logout successfully',[]);
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
