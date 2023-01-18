<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SubscriberController extends Controller
{
    public function index(): Response
    {
        $data = \App\Models\Subscriber::query()->with('fields')->paginate(5);

        return Inertia::render('Home', [
            'subscribers' => $data,
        ]);
    }

    public function create(): Response
    {
        $fields = \App\Models\Field::query()->get();
        return Inertia::render('Subscribe', [
            'inputFields' => $fields,
        ]);
    }
}
