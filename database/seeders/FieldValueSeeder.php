<?php

namespace Database\Seeders;

use App\Models\FieldValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FieldValue::query()->create([
           'subscriber_id' => 1,
           'field_id' => 1,
           'value' => 'Nigeria',
        ]);
    }
}
