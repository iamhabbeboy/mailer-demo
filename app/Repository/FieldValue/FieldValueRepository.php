<?php

namespace App\Repository\FieldValue;

use App\Models\Field;
use App\Models\FieldValue;
use App\Repository\Contracts\FieldRepositoryInterface;
use App\Repository\Contracts\FieldValueRepositoryInterface;

class FieldValueRepository implements FieldValueRepositoryInterface
{
    public function __construct(public FieldValue $fieldValue)
    {
    }

    public function save(array $data)
    {
        return $this->fieldValue->query()->create($data);
    }

    public function findById(int $id)
    {
        // TODO: Implement findById() method.
    }

    public function findAll(array $params = [])
    {
        // TODO: Implement findAll() method.
    }
}
