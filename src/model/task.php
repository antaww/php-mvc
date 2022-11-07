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
		$statement->execute(compact('name', 'priority'));
	}

	public function deleteAllTasks(): void {
		$this->databaseConnection->query('DELETE FROM tasks');
	}

	public function deleteTask(string $name): void {
		$statement = $this->databaseConnection->prepare('DELETE FROM tasks WHERE name = :name');
		$statement->execute(compact('name'));
	}

	public function getTask(string $name): Task {
		$statement = $this->databaseConnection->prepare('SELECT * FROM tasks WHERE name = :name');
		$statement->execute(compact('name'));
		return $statement->fetchObject(Task::class);
	}

	public function getTasks(): array {
		return $this->databaseConnection->query('SELECT * FROM tasks ORDER BY priority DESC, name ASC')->fetchAll(PDO::FETCH_CLASS, Task::class);
	}

	public function updatePriority(string $name, int $priority): void {
		$statement = $this->databaseConnection->prepare('UPDATE tasks SET priority = :priority WHERE name = :name');
		$statement->execute(compact('name', 'priority'));
	}
}