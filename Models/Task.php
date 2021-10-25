<?php

namespace MvcToDo\Models;

use MvcToDo\Core\Model;

class Task extends Model
{
    protected $id;
    protected $title;
    protected $description;

    public function __set($name, $value)
    {
        $this->{$name} = $value;
    }

    public function __get($name)
    {
        return $this->{$name};
    }
}
