<?php
namespace App\Controllers\Tasks\Add;

use Application\Model\Todo\Task;
use Application\Model\Todo\TaskRepository;

class AddTask
{
    function execute(array $input): void
    {
        if (isset($input['task']) && isset($input['priority'])) {
            $task = $input['task'];
            $priority = $input['priority'];
            (new TaskRepository())->addTask(new Task($task, $priority));
        }
    }
}
