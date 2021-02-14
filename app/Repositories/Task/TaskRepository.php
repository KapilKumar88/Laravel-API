<?php

namespace App\Repositories\Task;

use App\Models\Task;
use App\Repositories\BaseRepository;
use App\Repositories\Task\TaskRepositoryInterface;


class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
   
    public function __construct(Task $task)
    {
        parent::__construct($task);
    }
  
}



?>