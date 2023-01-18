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
        return Inertia::render('Subscribe');
    }
}
