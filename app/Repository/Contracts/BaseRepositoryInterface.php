<?php

namespace App\Repository\Contracts;

interface BaseRepositoryInterface
{
    public function save(array $data);

    public function findById(int $id);

    public function findAll(array $params);
}
