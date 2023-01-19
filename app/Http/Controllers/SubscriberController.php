<?php

namespace App\Http\Controllers;

use App\Events\UserSubscribed;
use App\Http\Requests\StoreUserSubscriptionRequest;
use App\Models\Subscriber;
use App\Repository\Contracts\FieldRepositoryInterface;
use App\Repository\Contracts\SubscriptionRepositoryInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SubscriberController extends Controller
{
    public function __construct(
        public SubscriptionRepositoryInterface $subscriptionRepository,
        public FieldRepositoryInterface        $fieldRepository)
    {
    }

    public function index(): Response
    {
        $data = $this->subscriptionRepository->findAll(['limit' => 10]);

        return Inertia::render('Home', [
            'subscribers' => $data,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Subscribe', [
            'inputFields' => $this->fieldRepository->findAll(),
        ]);
    }

    public function store(StoreUserSubscriptionRequest $request)
    {
        $data = $request->toArray();
        $data['state'] = 'unconfirmed';
        $subscription = $this->subscriptionRepository->save($data);

        $payload = $subscription->toArray();
        $payload['inputFields'] = $request->inputType;

        UserSubscribed::dispatch($payload);

        return redirect(route('home'));
    }

    public function destroy(int $id)
    {
        $this->subscriptionRepository->delete($id);

        return redirect(route('home'));
    }
}
