<?php

namespace Database\Seeders\Courses;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->getData() as $user) {
            $exists = User::where('email', $user['email'])->exists();
            if ($exists) {
                continue;
            }

            User::create([
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
            ]);
        }
    }

    /**
     * @return array<array<string, mixed>>
     */
    public static function getData(): array
    {
        $password = password_hash('p@ssw0rd', PASSWORD_ARGON2ID);

        return [
            [
                'id' => 1,
                'name' => 'User 1',
                'email' => 'user1@example.com',
                'password' => $password,
                'created_at' => '2021-01-01 00:00:00',
                'updated_at' => '2021-01-01 00:00:00',
            ],
            [
                'id' => 2,
                'name' => 'User 2',
                'email' => 'user2@example.com',
                'password' => $password,
                'created_at' => '2021-01-01 00:00:00',
                'updated_at' => '2021-01-01 00:00:00',
            ]
        ];
    }
}
