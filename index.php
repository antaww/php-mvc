<?php

require_once('src/controllers/add_task.php');
require_once('src/controllers/delete_task.php');
require_once('src/controllers/delete_all_tasks.php');
require_once('src/controllers/update_priority.php');
require_once('src/controllers/homepage.php');

use App\Controllers\Homepage\Homepage;
use App\Controllers\Tasks\Add\AddTask;
use App\Controllers\Tasks\Delete\DeleteTask;
use App\Controllers\Tasks\DeleteAllTasks\DeleteAllTasks;
use App\Controllers\Tasks\Update\UpdatePriority;
use Application\Model\Todo\TaskRepository;

try {
	/**
	 * @type string $action
	 */
	$action = $_SERVER['QUERY_STRING'] ?? '';

	switch ($action) {
		case 'add':
			if (!isset($_POST['task'], $_POST['priority'])) throw new RuntimeException('Invalid input');
			$name = $_POST['task'];
			if ((new TaskRepository())->getTask($name)) throw new RuntimeException('Task already exists');
			(new AddTask())->execute($name, $_POST['priority']);
			break;

		case 'delete':
			if (!isset($_POST['task'])) throw new RuntimeException('Invalid input');

			(new DeleteTask())->execute($_POST['task'], $_POST);
			break;

		case 'update':
			if (!isset($_POST['task'], $_POST['priority'])) throw new RuntimeException('Invalid input');

			(new UpdatePriority())->execute($_POST['task'], $_POST['priority'], $_POST);
			break;

		case 'delete_all':
			(new DeleteAllTasks())->execute();
			break;

		default:
			(new Homepage())->execute();
			break;
	}

	if (in_array($action, ['add', 'delete', 'update', 'delete_all'])) header('Location: index.php');
} catch (Exception $e) {
	global $error;
	$error = $e->getMessage();

	(new Homepage())->execute();
}