<?php

namespace App\Http\Controllers\Api\V1\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\TaskApiRequest;
use App\Models\Task;
use App\Repositories\Task\TaskRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
     * @responseFile status=200 scenario="On Success" responses/task/get-tasks.json
     * @responseFile status=401 scenario="Unauthorized" responses/common/unauthenticated.json
     * @responseFile status=404 scenario="Not found" responses/common/error.json
     * @responseFile status=500 scenario="Internal server error" responses/common/internal-server-error.json
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
     * @bodyParam files array Files array to be upload
     * @responseFile status=200 scenario="On Success" responses/task/create-task.json
     * @responseFile status=401 scenario="Unauthorized" responses/common/unauthenticated.json
     * @responseFile status=422 scenario="Validation errors" responses/task/validation-error.json
     * @responseFile status=500 scenario="Internal server error" responses/common/internal-server-error.json
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

            if(!empty($validatedRequest['files'])){
                $this->uploadTaskFiles($task, $validatedRequest['files']);
            }            

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
     * @responseFile status=200 scenario="On Success" responses/task/get-task.json
     * @responseFile status=401 scenario="Unauthorized" responses/common/unauthenticated.json
     * @responseFile status=404 scenario="Not found" responses/common/error.json { "message" : "Task does not exists"}
     * @responseFile status=500 scenario="Internal server error" responses/common/internal-server-error.json
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
     * @bodyParam files array Files array to be upload
     * @responseFile status=200 scenario="On Success" responses/common/success.json { "message" : "Task details updated successfully"}
     * @responseFile status=401 scenario="Unauthorized" responses/common/unauthenticated.json
     * @responseFile status=404 scenario="Not found" responses/common/error.json { "message" : "Task not found"}
     * @responseFile status=422 scenario="Validation errors" responses/task/validation-error.json
     * @responseFile status=500 scenario="Internal server error" responses/common/internal-server-error.json
     * @param  App\Http\Requests\Api\V1\TaskApiRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskApiRequest $request, $id)
    {
        try {
            $validatedRequest = $request->validated();
            $task = $this->taskRespository->first([
                                                'id' => $id,
                                                'user_id' => Auth::id()
                                            ]);
            if(!empty($task)){   
                $this->taskRespository->update($validatedRequest, $id);
                if(!empty($validatedRequest['files'])){
                    $this->uploadTaskFiles($task, $validatedRequest['files']);
                }
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
     * @responseFile status=200 scenario="On Success" responses/common/success.json { "message" : "Task deleted successfully"}
     * @responseFile status=401 scenario="Unauthorized" responses/common/unauthenticated.json
     * @responseFile status=404 scenario="Not found" responses/common/error.json { "message" : "Task not found"}
     * @responseFile status=500 scenario="Internal server error" responses/common/internal-server-error.json
     * @responseFile status=503 scenario="Service unavailable" responses/common/error.json { "message" : "Something went wrong please try again"}
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


    /**
     * store the files to db
     * @param App\Models\Task $task
     * @param array $files
     * 
     * @return void
     */
    private function uploadTaskFiles(Task $task, $files){
        foreach ($files as $key => $value) {

            $path = Storage::disk(UPLOAD_DISK)->putFile("task-{$task->id}", $value);

            $task->media()->create([
                'file_name' => explode('/', $path)[1],
                'original_file_name' => $value->getClientOriginalName(),
                'mime_type' => $value->getMimeType(),
                'size' => $value->getSize(),
                'extension' => $value->getClientOriginalExtension(),
                'path' => $path
            ]);
        }

        return;
    }
}
