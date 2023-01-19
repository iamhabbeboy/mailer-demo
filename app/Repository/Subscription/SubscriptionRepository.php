<?php

namespace App\Repository\Subscription;

use App\Models\Subscriber;
use App\Repository\Contracts\SubscriptionRepositoryInterface;

class SubscriptionRepository implements SubscriptionRepositoryInterface
{
    public function __construct(public Subscriber $subscriber)
    {
    }

    public function save(array $data)
    {
        return $this->subscriber->query()->create($data);
    }

    public function findById(int $id)
    {
        // TODO: Implement findById() method.
    }

    public function findAll(array $params)
    {
        return $this->subscriber->query()->orderByDesc('id')
            ->with('fields')
            ->paginate($params['limit'] ?? 10);
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
        return $this->subscriber->query()->find($id)->delete();
    }
}
