<?php

namespace Application\Model\Todo;

class Todo
{
    private $id;
    private $todo;
    private $status;

    public function __construct($id, $todo, $status)
    {
        $this->id = $id;
        $this->todo = $todo;
        $this->status = $status;
    }
}
