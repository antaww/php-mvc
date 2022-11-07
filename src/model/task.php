<?php

namespace Application\Model\Todo;

use Application\Lib\Database\DatabaseConnection;
use PDO;

class Task
{
    public int $priority;
    public string $name;

    /**
     * @param int $priority
     * @param string $name
     */
    public function __construct(int $priority, string $name)
    {
        $this->priority = $priority;
        $this->name = $name;
    }
}

class TaskRepository
{
    public PDO $databaseConnection;

    /**
     * @param DatabaseConnection $databaseConnection
     */
    public function __construct(DatabaseConnection $databaseConnection)
    {
        $this->databaseConnection = $databaseConnection->getConnection();
    }

    public function getTasks(): array
    {
        $statement = $this->databaseConnection->prepare('SELECT * FROM tasks');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, Task::class);
    }

    public function getTask(string $name): Task
    {
        $statement = $this->databaseConnection->prepare('SELECT * FROM tasks WHERE name = :name');
        $statement->execute(['name' => $name]);
        return $statement->fetchObject(Task::class);
    }


    public function addTask(Task $task): void
    {
        $statement = $this->databaseConnection->prepare('INSERT INTO tasks (name, priority) VALUES (:name, :priority)');
        $statement->execute([
            'name' => $task->name,
            'priority' => $task->priority
        ]);
    }

    public function deleteTask(string $name): void
    {
        $statement = $this->databaseConnection->prepare('DELETE FROM tasks WHERE name = :name');
        $statement->execute(['name' => $name]);
    }

    public function deleteAllTasks(): void
    {
        $statement = $this->databaseConnection->prepare('DELETE FROM tasks');
        $statement->execute();
    }

    public function updatePriority(string $name, int $priority): void
    {
        $statement = $this->databaseConnection->prepare('UPDATE tasks SET priority = :priority WHERE name = :name');
        $statement->execute([
            'name' => $name,
            'priority' => $priority
        ]);
    }
}