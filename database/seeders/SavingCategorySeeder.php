<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SavingCategory;

class SavingCategorySeeder extends Seeder {
    public function run(): void {
        $categories = [
            [
                'name' => 'Food',
            ],
            [
                'name' => 'Transportation',
            ],
            [
                'name' => 'Shopping',
            ],
            [
                'name' => 'Education',
            ],
            [
                'name' => 'Entertainment',
            ],
            [
                'name' => 'Health',
            ],
            [
                'name' => 'Travel',
            ],
            [
                'name' => 'Investment',
            ],
            [
                'name' => 'Emergency Fund',
            ],
            [
                'name' => 'Others',
            ],
        ];

        foreach ($categories as $category) {
            SavingCategory::create($category);
        }
    }
}