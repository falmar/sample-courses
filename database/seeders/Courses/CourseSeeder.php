<?php

namespace Database\Seeders\Courses;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->getData() as $course) {
            $exists = Course::where('name', $course['name'])->exists();
            if ($exists) {
                continue;
            }

            Course::create([
                'id' => $course['id'],
                'name' => $course['name'],
                'created_at' => $course['created_at'],
                'updated_at' => $course['updated_at'],
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
                'name' => 'Course 1',
                'created_at' => '2021-01-01 00:00:00',
                'updated_at' => '2021-01-01 00:00:00',
            ],
            [
                'id' => 2,
                'name' => 'Course 2',
                'created_at' => '2021-01-01 00:00:00',
                'updated_at' => '2021-01-01 00:00:00',
            ]
        ];
    }
}
