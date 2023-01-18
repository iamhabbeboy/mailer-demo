<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            [
                'title' => 'country',
                'type' => 'string',
            ],
            [
                'title' => 'birthday',
                'type' => 'date',
            ],
            [
                'title' => 'company',
                'type' => 'string',
            ]
        ];

        foreach ($seeds as $value) {
            Field::query()->create($value);
        }
    }
}
