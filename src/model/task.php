<?php

namespace Application\Model\Todo;

use Application\Lib\Database\DatabaseConnection;
use PDO;

class Task
{
    public int $priority;
    public string $name;
}

class TaskRepository
{
    public function getTasks(): array
    {
        $database = (new DatabaseConnection())->getConnection();
        $statement = $database->prepare('SELECT * FROM tasks');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS, Task::class);
    }

    public function getTask(string $name): Task
    {
        $database = (new DatabaseConnection())->getConnection();
        $statement = $database->prepare('SELECT * FROM tasks WHERE name = :name');
        $statement->execute(['name' => $name]);
        return $statement->fetchObject(Task::class);
    }


    public function addTask(Task $task): void
    {
        $database = (new DatabaseConnection())->getConnection();
        $statement = $database->prepare('INSERT INTO tasks (name, priority) VALUES (:name, :priority)');
        $statement->execute([
            'name' => $task->name,
            'priority' => $task->priority
        ]);
    }

    public function deleteTask(string $name): void
    {
        $database = (new DatabaseConnection())->getConnection();
        $statement = $database->prepare('DELETE FROM tasks WHERE name = :name');
        $statement->execute(['name' => $name]);
    }

    public function deleteAllTasks(): void
    {
        $database = (new DatabaseConnection())->getConnection();
        $statement = $database->prepare('DELETE FROM tasks');
        $statement->execute();
    }

    public function updatePriority(string $name, int $priority): void
    {
        $database = (new DatabaseConnection())->getConnection();
        $statement = $database->prepare('UPDATE tasks SET priority = :priority WHERE name = :name');
        $statement->execute([
            'name' => $name,
            'priority' => $priority
        ]);
    }
}