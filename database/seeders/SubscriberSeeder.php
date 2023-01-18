<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Subscriber::factory(10)->create();
//        factory(\App\Models\Subscriber::class, 10)->create()->each(function ($subscriber) {
//            $subscriber->contacts()->save(factory(App\Contact::class)->make());
//        });
    }
}
