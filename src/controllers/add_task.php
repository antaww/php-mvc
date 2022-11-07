<?php
namespace App\Controllers\Tasks\Add;

require_once('src/model/task.php');

use Application\Model\Todo\TaskRepository;

class AddTask {
	public function execute(string $task, string $priority): void {
		(new TaskRepository())->addTask($task, $priority);
	}
}
