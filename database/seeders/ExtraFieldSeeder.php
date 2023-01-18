<?php

namespace Database\Seeders;

use App\Models\ExtraField;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExtraFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExtraField::query()->create([
           'subscriber_id' => 1,
           'field_id' => 1,
           'field_value' => 'Nigeria',
        ]);
    }
}
