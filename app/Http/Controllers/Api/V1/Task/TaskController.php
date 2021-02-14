<?php

namespace App\Http\Controllers\Api\V1\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\TaskApiRequest;
use App\Repositories\Task\TaskRepositoryInterface;
use Illuminate\Support\Facades\Auth;

/**
 * @group Task
 */
class TaskController extends Controller
{

    protected $taskRespository;

    /**
     * Creating the instance of TaskRepository
     */
    public function __construct(TaskRepositoryInterface $taskRespository)
    {
        $this->taskRespository = $taskRespository;
    }


    /**
     * Task List
     * 
     * This API endpoint is used to get the list of all
     * task created by the user
     * @responseFile status=200 scenario="On Success" responses/task/get_task.json
     * @responseFile status=401 scenario="Unauthorized" responses/common/unauthenticated.json
     * @responseFile status=404 scenario="Not found" responses/common/common_error.json
     * @responseFile status=500 scenario="Internal server error" responses/common/internal_error.json
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $tasks = $this->taskRespository->get([
                                            'user_id' => Auth::id()
                                        ]);
            if($tasks->count() > 0){
                return $this->sendResponse('Tasks retrived successfully', $tasks);
            }else{
                return $this->sendError('No task found');
            }
        } catch (\Exception $th) {
            return $this->sendInternalError([
                                    'class'     => __CLASS__,
                                    'function'  => __FUNCTION__,
                                    'message'   => $th->getMessage()
                                ]);
        }
    }

    /**
     * Create Task
     * 
     * This API endpoint is used to create the task 
     * @bodyParam title string required Title of the task
     * @bodyParam description string required Description of the task
     * @bodyParam status string required Status of the task and the value must be one of <code>open</code>, <code>in_progress</code>, or <code>close</code>.
     * @responseFile status=200 scenario="On Success" responses/task/create_task.json
     * @responseFile status=401 scenario="Unauthorized" responses/common/unauthenticated.json
     * @responseFile status=422 scenario="Validation errors" responses/task/validation_create_task.json
     * @responseFile status=500 scenario="Internal server error" responses/common/internal_error.json
     * 
     * @param  \App\Http\Requests\Api\V1\TaskApiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskApiRequest $request)
    {
        try {
            $validatedRequest = $request->validated();
            $validatedRequest['user_id'] = Auth::id();
            $validatedRequest['status'] = $validatedRequest['status'] ?? 'OPEN';
            
            $task = $this->taskRespository->create($validatedRequest);

            return $this->sendResponse('Task created successfully', $task, HTTP_CREATED);
        } catch (\Exception $th) {
            return $this->sendInternalError([
                                    'class'     => __CLASS__,
                                    'function'  => __FUNCTION__,
                                    'message'   => $th->getMessage()
                                ]);
        }
    }

    /**
     * Show Task
     * 
     * This API endpoint is used to show a particular task 
     * of the user
     * @urlParam task integer required The ID of the task.
     * @responseFile status=200 scenario="On Success" responses/task/get_single_task.json
     * @responseFile status=401 scenario="Unauthorized" responses/common/unauthenticated.json
     * @responseFile status=404 scenario="Not found" responses/common/common_error.json { "message" : "Task does not exists"}
     * @responseFile status=500 scenario="Internal server error" responses/common/internal_error.json
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $task = $this->taskRespository->first([
                                            'id' => $id,
                                            'user_id' => Auth::id()
                                        ]);
            if(isset($task)){
                return $this->sendResponse('Task details fetched successfully', $task);
            }else{
                return $this->sendError('Task does not exists');
            }
        } catch (\Exception $th) {
            return $this->sendInternalError([
                        'class'     => __CLASS__,
                        'function'  => __FUNCTION__,
                        'message'   => $th->getMessage()
                    ]);
        }
    }

    /**
     * Edit/Update Task
     * 
     * This API endpoint update the specific task details in storage.
     * @urlParam task integer required The ID of the task.
     * @bodyParam title string Title of the task
     * @bodyParam description string Description of the task
     * @bodyParam status string required Status of the task and the value must be one of <code>open</code>, <code>in_progress</code>, or <code>close</code>.
     * @responseFile status=200 scenario="On Success" responses/common/common_error.json { "success":true, "message" : "Task details updated successfully"}
     * @responseFile status=401 scenario="Unauthorized" responses/common/unauthenticated.json
     * @responseFile status=404 scenario="Not found" responses/common/common_error.json { "message" : "Task not found"}
     * @response status=422 scenario="Validation errors" {
     *          "message": "The given data was invalid.",
     *          "errors": {
     *                   "title": [
     *                          "The Title field is required."
     *                      ],
     *                   "description": [
     *                          "The Description field is required."
     *                      ]
     *                  }
     *      }
     * @responseFile status=500 scenario="Internal server error" responses/common/internal_error.json
     * @param  App\Http\Requests\Api\V1\TaskApiRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskApiRequest $request, $id)
    {
        try {
            $validatedRequest = $request->validated();
            $task = $this->taskRespository->exists([
                                                'id' => $id,
                                                'user_id' => Auth::id()
                                            ]);
            
            if($task){   
                $this->taskRespository->update($validatedRequest, $id);
                return $this->sendResponse('Task details updated successfully');
            }else{
                return $this->sendError('Task not found');
            }


        } catch (\Exception $th) {
            return $this->sendInternalError([
                        'class'     => __CLASS__,
                        'function'  => __FUNCTION__,
                        'message'   => $th->getMessage()
                    ]);
        }
    }

    /**
     * Delete Task
     * 
     * This API endpoint delete the task
     * @urlParam task integer required The ID of the task.
     * @responseFile status=200 scenario="On Success" responses/common/common_error.json { "message" : "Task deleted successfully"}
     * @responseFile status=401 scenario="Unauthorized" responses/common/unauthenticated.json
     * @responseFile status=404 scenario="Not found" responses/common/common_error.json { "message" : "Task not found"}
     * @responseFile status=500 scenario="Internal server error" responses/common/internal_error.json
     * @responseFile status=503 scenario="Service unavailable" responses/common/common_error.json { "message" : "Something went wrong please try again"}
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $task = $this->taskRespository->exists([
                                        'id' => $id,
                                        'user_id' => Auth::id()
                                    ]);
            if($task){
                $response = $this->taskRespository->delete($id);
                
                if($response){   
                    return $this->sendResponse('Task deleted successfully');
                }else{
                    return $this->sendError('Something went wrong please try again', HTTP_SERVICE_UNAVAILABLE);
                }
            }else{
                return $this->sendError('Task not found');
            }

        } catch (\Exception $th) {
            return $this->sendInternalError([
                        'class'     => __CLASS__,
                        'function'  => __FUNCTION__,
                        'message'   => $th->getMessage()
                    ]);
        }
    }
}
