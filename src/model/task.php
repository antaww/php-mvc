<?php

namespace Application\Model\Todo;

require_once('src/lib/DatabaseConnection.php');

use Application\Lib\Database\DatabaseConnection;
use PDO;

class Task {
	public string $name;
	public int $priority;
}

class TaskRepository {
	public PDO $databaseConnection;

	public function __construct() {
		$this->databaseConnection = (new DatabaseConnection())->getConnection();
	}

	public function addTask(string $name, int $priority): void {
		$statement = $this->databaseConnection->prepare('INSERT INTO tasks (name, priority) VALUES (:name, :priority)');
		$statement->execute([
			'name' => $name,
			'priority' => $priority,
		]);
	}

	public function deleteAllTasks(): void {
		$statement = $this->databaseConnection->prepare('DELETE FROM tasks');
		$statement->execute();
	}

	public function deleteTask(string $name): void {
		$statement = $this->databaseConnection->prepare('DELETE FROM tasks WHERE name = :name');
		$statement->execute(['name' => $name]);
	}

	public function getTask(string $name): Task {
		$statement = $this->databaseConnection->prepare('SELECT * FROM tasks WHERE name = :name');
		$statement->execute(['name' => $name]);
		return $statement->fetchObject(Task::class);
	}

	public function getTasks(): array {
		$statement = $this->databaseConnection->prepare('SELECT * FROM tasks');
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_CLASS, Task::class);
	}

	public function updatePriority(string $name, int $priority): void {
		$statement = $this->databaseConnection->prepare('UPDATE tasks SET priority = :priority WHERE name = :name');
		$statement->execute([
			'name' => $name,
			'priority' => $priority,
		]);
	}
}