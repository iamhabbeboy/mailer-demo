<?php

namespace App\Repository\Field;

use App\Models\Field;
use App\Repository\Contracts\FieldRepositoryInterface;

class FieldRepository implements FieldRepositoryInterface
{
    public function __construct(public Field $field)
    {
    }

    public function save(array $data)
    {
        return $this->field->query()->firstOrCreate(['title' => $data['title']], $data);
    }

    public function findById(int $id)
    {
        // TODO: Implement findById() method.
    }

    public function findAll(array $params = [])
    {
        // TODO: Implement findAll() method.
        return $this->field->query()->get()->unique('title');
    }
}
