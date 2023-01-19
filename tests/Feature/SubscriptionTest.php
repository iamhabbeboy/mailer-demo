<?php

namespace Tests\Feature;

use App\Models\Subscriber;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SubscriptionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_home_is_displayed()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_subscription_page_is_displayed()
    {
        $response = $this->get('/subscribe');

        $response->assertStatus(200);
    }

    public function test_add_new_subscription_via_endpoint()
    {
        $response = $this->post(route('store-subscriber'), [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'inputType' => [],
        ]);

        $response->assertRedirect("/");
    }

    public function test_add_new_subscription_via_endpoint_validation()
    {
        $this->post(route('store-subscriber'), [
            'name' => '',
            'email' => '',
            'inputType' => [],
        ])
        ->assertSessionHasErrors(["name", "email"])
        ->assertStatus(302);
    }
}
