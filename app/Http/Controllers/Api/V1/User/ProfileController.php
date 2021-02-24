<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @group User
 */
class ProfileController extends Controller
{
    /**
     * Profile
     * 
     * Show user profile
     * @responseFile status=200 scenario="On success" responses/user/profile/success.json
     * @responseFile status=401 scenario="Unauthorized" responses/common/unauthenticated.json
     * @responseFile status=500 scenario="Internal server error" responses/common/internal-server-error.json
     */
    public function __invoke()
    {
        try {
            return $this->sendResponse('User profile retrived successfully', request()->user());
        } catch (\Exception $th) {
            return $this->sendInternalError([
                                    'class'     => __CLASS__,
                                    'function'  => __FUNCTION__,
                                    'message'   => $th->getMessage()
                                ]);
        }
    }
}
