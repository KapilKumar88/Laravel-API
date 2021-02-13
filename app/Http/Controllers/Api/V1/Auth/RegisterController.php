<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\RegisterApiRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Api\V1\RegisterApiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterApiRequest $request)
    {
        try {
            $validatedRequest = $request->validated();
            $user = User::create([
                                    'name' => $validatedRequest['name'],
                                    'email' => $validatedRequest['email'],
                                    'password' => Hash::make($validatedRequest['password'])
                                ]);
            return $this->sendResponse('User registered successfully', $user);

        } catch (\Exception $th) {
           return $this->sendInternalError([
                                        'class'     => __CLASS__,
                                        'function'  => __FUNCTION__,
                                        'message'   => $th->getMessage()
                                    ]);
        }
    }
}
