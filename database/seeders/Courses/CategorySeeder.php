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
                'created_at' => $category['created_at'],
                'updated_at' => $category['updated_at'],
            ]);
        }
    }

    /**
     * @return array<array<string, mixed>>
     */
    public static function getData(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Memory',
                'created_at' => '2021-01-01 00:00:00',
                'updated_at' => '2021-01-01 00:00:00',
            ],
            [
                'id' => 2,
                'name' => 'Concentration',
                'created_at' => '2021-01-01 00:00:00',
                'updated_at' => '2021-01-01 00:00:00',
            ],
            [
                'id' => 3,
                'name' => 'Speed',
                'created_at' => '2021-01-01 00:00:00',
                'updated_at' => '2021-01-01 00:00:00',
            ],
            [
                'id' => 4,
                'name' => 'Logic',
                'created_at' => '2021-01-01 00:00:00',
                'updated_at' => '2021-01-01 00:00:00',
            ]
        ];
    }
}
