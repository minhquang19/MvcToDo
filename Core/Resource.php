<?php


namespace MvcToDo\Core;


use MvcToDo\Config\Database;
use PDO;

class Resource implements ResourceInterface
{
    private $table;
    private $id;
    private $model;

    public function _init($table, $id, $model)
    {
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }

    public function save($model)
    {
        $placeNames = [];
        $properties = $model->getProperties();

        if ($model->id === null) {
            unset($properties['id']);
        }
        foreach ($properties as $key => $value) {
            array_push($placeNames, ':' . $key);
        }
        $columns = [];
        foreach (array_keys($properties) as $k => $v) {
            if ($v !== 'id') {
                array_push($columns, $v . ' = :' . $v);
            }
        }
        $columns = implode(',', $columns);
        $columnsString = implode(',', array_keys($properties));
        $placeNamesString = implode(',', $placeNames);

        if ($model->id === null) {
            $query = "INSERT INTO {$this->table} ({$columnsString}, created_at, updated_at) VALUES ({$placeNamesString}, :created_at, :updated_at)";
            $request  = Database::getBdd()->prepare($query);
            $date = array("created_at" => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'));
            return $request->execute(array_merge($properties, $date));
        } else {
            $query = "UPDATE {$this->table} SET " . $columns . ', updated_at = :updated_at WHERE id = :id';
            $request = Database::getBdd()->prepare($query);
            $date = array("id" => $model->id, 'updated_at' => date('Y-m-d H:i:s'));
            return $request->execute(array_merge($properties, $date));
        }
    }

    public function find($id)
    {
        $class = get_class($this->model);
        $query = "SELECT * FROM {$this->table} where id = :id";
        $request = Database::getBdd()->prepare($query);
        $request->setFetchMode(PDO::FETCH_INTO, new $class);
        $request->execute(['id' => $id]);

        return $request->fetch();
    }

    public function all($model)
    {
        $properties = implode(',', array_keys($model->getProperties()));
        $query = "SELECT {$properties} FROM {$this->table}";
        $request = Database::getBdd()->prepare($query);
        $request->execute();

        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function delete($model)
    {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $request = Database::getBdd()->prepare($query);
        return $request->execute([':id' => $model->id]);
    }
}
