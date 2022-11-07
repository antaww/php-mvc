<?php
namespace App\Controllers\Tasks\Delete;

use Application\Model\Todo\TaskRepository;

class DeleteTask {
	public function execute(string $task, array $input): void {
		(new TaskRepository())->deleteTask($task);
	}
}

