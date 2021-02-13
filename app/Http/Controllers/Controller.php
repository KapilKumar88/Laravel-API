<?php

namespace App\Http\Controllers;

use App\Models\ErrorLog;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Send json response on success
     * 
     * @param string $message
     * @param array $data
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse($message, $data = null, $code = HTTP_OK){
        $res = [
            'success' => true,
            'message' => $message
        ];

        if ($data !== null) {
            $res['data'] = $data;
        }

        return Response::json($res, $code);
    }

    /**
     * Send json response on error 
     * 
     * @param $message
     * @param optional array $data
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($message, $code = HTTP_NOT_FOUND, array $data = []){
        $res = [
            'success' => false,
            'message' => $message,
        ];

        if (!empty($data)) {
            $res['data'] = $data;
        }
        
        return Response::json($res, $code);

    }

    /**
     * Send json response on Internal server error 
     * 
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendInternalError(array $data){
        try {
            $errorId = ErrorLog::create([
                            'error_id'  => (string) Str::uuid(),
                            'class'     => $data['class'],
                            'function'  => $data['function'],
                            'message'   => $data['message']
                        ])->error_id;
            
            $res = [
                'success' => false,
                'message' => 'Internal server error.',
                'error_id' => $errorId
            ];

            return Response::json($res, HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Exception $th) {
            Log::channel('customerrorlog')
                ->info('Exception in sendInternalError function in controller class and below is the error which is not logged in the error log table.', [
                    __CLASS__,
                    __FUNCTION__,
                    $th->getMessage()
                ]);
            Log::channel('customerrorlog')->info('Error not logged to the error log table in DB', $data);
            return $this->sendError('Internal server error.', HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
