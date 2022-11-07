<?php
namespace App\Controllers\Tasks\DeleteAllTasks;

use Application\Model\Todo\TaskRepository;
use Application\Model\Todo\Task;

class DeleteAllTasks {
    function execute(): void {
        (new TaskRepository())->deleteAllTasks();
    }
}