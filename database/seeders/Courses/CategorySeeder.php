<?php

namespace Database\Seeders\Courses;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->getData() as $category) {
            $exists = Category::where('name', $category['name'])->exists();
            if ($exists) {
                continue;
            }

            Category::create([
                    'id' => $category['id'],
                'name' => $category['name'],
            ]);
        }
    }

    /**
     * @return array<array<string, mixed>>
     */
    public function getData(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Memory',
            ],
            [
                'id' => 2,
                'name' => 'Concentration',
            ],
            [
                'id' => 3,
                'name' => 'Speed',
            ],
            [
                'id' => 4,
                'name' => 'Logic',
            ]
        ];
    }
}
