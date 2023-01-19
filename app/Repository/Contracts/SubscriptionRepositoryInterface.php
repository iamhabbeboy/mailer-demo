<?php

namespace App\Repository\Contracts;

interface SubscriptionRepositoryInterface extends BaseRepositoryInterface
{
    public function delete(int $id);
}
