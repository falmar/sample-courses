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
                'name' => $course['name']
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
                'name' => 'Course 1'
            ],
            [
                'id' => 2,
                'name' => 'Course 2'
            ]
        ];
    }
}
