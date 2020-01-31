<?php

/** Модели */
abstract class Model implements JsonSerializable
{
    var $model;

    public function jsonSerialize()
    {
        return $this->model;
    }
}

class User extends Model
{
    var $model = [
        'login' => ['type' => 'text'],
        'pass' => ['type' => 'password'],
        'group' => ['type' => 'select_assoc'],
        'status' => ['type' => 'select_assoc', 'data' => [
            1 => 'ON',
            0 => 'OFF'
        ]]
    ];

    private function add_date()
    {
        $data = array(0 => 'group1', 1 => 'group2');
        $this->model['group']['data'] = $data;
    }

    public function jsonSerialize(): array
    {
        $this->add_date();
        return $this->model;
    }
}

class Car extends Model
{
    var $model = [
        'name' => ['type' => 'text']
    ];


    var $ooo = [
        't' => ['1' => 0]
    ];
}

class Comp extends Model
{
    var $model = [
        'test' => ['type' => 'test']
    ];

    var $ooo = [
        't' => ['1' => 0]
    ];
}

echo json_encode(new User(), JSON_PRETTY_PRINT);

echo '<br>';

echo json_encode(new Car(), JSON_PRETTY_PRINT);

echo '<br>';

echo json_encode(new Comp(), JSON_PRETTY_PRINT);
