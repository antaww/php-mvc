<?php
namespace App\Controllers\Tasks\Add;


use Application\Model\Todo\Task;
use Application\Model\Todo\TaskRepository;

class AddTask
{
    function execute(array $input)
    {
        ini_set('display_errors', 1);

        global $database;
        require('src/lib/database.php');

        if (isset($input['task']) && isset($input['priority'])) {
            $task = $input['task'];
            $priority = $input['priority'];
            $task_repository = new TaskRepository();
            $task_repository->addTask(new Task($task, $priority));
        }
        return $database;
    }
}
