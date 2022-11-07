<?php

namespace App\Controllers\Homepage;

require_once('src/model/task.php');

use Application\Model\Todo\TaskRepository;

class Homepage {
	public function execute(): void {
        global $tasks;
        $tasks = (new TaskRepository())->getTasks();

		require('templates/homepage.php');
	}
}