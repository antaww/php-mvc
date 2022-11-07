<?php
namespace App\Controllers\Tasks\DeleteAllTasks;

use Application\Model\Todo\TaskRepository;

class DeleteAllTasks {
	public function execute(): void {
		(new TaskRepository())->deleteAllTasks();
	}
}