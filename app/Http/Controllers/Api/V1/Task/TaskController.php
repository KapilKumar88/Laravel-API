<?php

namespace App\Http\Controllers\Api\V1\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\TaskApiRequest;
use App\Models\Task;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $tasks = Task::where('user_id', Auth::id())->get();
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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Api\V1\TaskApiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskApiRequest $request)
    {
        try {
            $validatedRequest = $request->validated();
            $task = Task::create([
                        'user_id' => Auth::id(),
                        'title' =>  $validatedRequest['title'],
                        'description' =>  $validatedRequest['description'],
                        'status'    => $validatedRequest['status'] ?? 'OPEN'
                    ]);

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $task = Task::where('id', $id)
                            ->where('user_id', Auth::id())
                            ->first();

            return $this->sendResponse('Task details fetched successfully', $task);
        } catch (ModelNotFoundException $th){
            return $this->sendError('Task does not exists');
        } catch (\Exception $th) {
            return $this->sendInternalError([
                        'class'     => __CLASS__,
                        'function'  => __FUNCTION__,
                        'message'   => $th->getMessage()
                    ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Api\V1\TaskApiRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskApiRequest $request, $id)
    {
        try {
            $validatedRequest = $request->validated();
            $task = Task::where('id', $id)->where('user_id', Auth::id())->first();
            
            if(isset($task)){   
                $task->title        = $validatedRequest['title'] ?? $task->title;
                $task->description  = $validatedRequest['description'] ?? $task->description;
                $task->status       = $validatedRequest['status'] ?? $task->status;
                $task->save();
                return $this->sendResponse('Task details updated successfully', $task);
            }else{
                return $this->sendError('Task not found');
            }


        } catch (ModelNotFoundException $th){
            return $this->sendError('Task does not exists');
        } catch (\Exception $th) {
            return $this->sendInternalError([
                        'class'     => __CLASS__,
                        'function'  => __FUNCTION__,
                        'message'   => $th->getMessage()
                    ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $task = Task::where('id', $id)->where('user_id', Auth::id())->exists();
            if($task){
                $response = Task::where('id', $id)->where('user_id', Auth::id())->delete();
                
                if($response){   
                    return $this->sendResponse('Task deleted successfully');
                }else{
                    return $this->sendError('Something went wrong please try again', HTTP_NOT_IMPLEMENTED);
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
