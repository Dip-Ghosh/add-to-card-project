<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
                'name' => 'Mobile',
                'status' => 'active'
            ],
            [   'name' => 'Laptop',
                'status' => 'active'
            ],
            [
                'name' => 'Television',
                'status' => 'Inactive'
            ],
            [
                'name' => 'Grocery',
                'status' => 'active'
            ]
        ];

        foreach ($category as $key => $value) {
            Category::create($value);
        }
    }
}
