<?php

namespace App\Controllers\Tasks\Update;

use Application\Model\Todo\TaskRepository;

class UpdatePriority {
	function execute(string $name, int $new_priority, array $input): void {
		if (isset($input['id'], $input['priority'])) {
			$task_repository = new TaskRepository();
			$task_repository->updatePriority($name, $new_priority);
		}
	}
}
