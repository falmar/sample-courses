<?php

namespace Database\Seeders\Courses;

use Illuminate\Database\Seeder;

class DomainSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            CourseSeeder::class,
            UserSeeder::class,
            SessionSeeder::class,
        ]);
    }
}
