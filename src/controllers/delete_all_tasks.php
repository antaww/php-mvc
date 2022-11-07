<?php
namespace App\Controllers\Tasks\DeleteAllTasks;

use Application\Model\Todo\TaskRepository;
use Application\Model\Todo\Task;

class DeleteAllTasks {
    function execute(): void {
        $task_repository = new TaskRepository();
        $task_repository->deleteAllTasks();
    }
}