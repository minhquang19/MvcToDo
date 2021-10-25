<?php

namespace MvcToDo\Models;

use MvcToDo\Core\Resource;
use MvcToDo\Models\Task;

class TaskResource extends Resource
{
    public function __construct($table, $id, Task $task)
    {
        parent::_init($table, $id, $task);
    }
}
