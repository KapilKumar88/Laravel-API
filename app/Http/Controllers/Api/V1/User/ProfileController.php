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
     * @response status=200 scenario="On success" {
     *          "success": true,
     *          "message": "User profile retrived successfully",
     *          "data": {
     *                      "id": 20,
     *                      "name": "Nathanael Brown",
     *                      "email": "heath78@example.net",
     *                      "email_verified_at": "2021-02-14T13:49:53.000000Z",
     *                      "created_at": "2021-02-14 13:49:55",
     *                      "updated_at": "2021-02-14 13:49:55"
     *                  }
     *  }
     * @responseFile status=401 scenario="Unauthorized" responses/common/unauthenticated.json
     * @responseFile status=500 scenario="Internal server error" responses/common/internal_error.json
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
