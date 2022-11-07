<?php
namespace App\Controllers\Tasks\Delete;

use Application\Model\Todo\TaskRepository;
use Application\Model\Todo\Task;

class DeleteTask
{
    function execute(array $input): void
    {
        if (isset($input['task'])) {
            $task = $input['task'];
            (new TaskRepository())->deleteTask($task);
        }
    }
}

