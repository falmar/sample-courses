<?php

namespace Database\Seeders\Courses;

use App\Models\Session;
use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->getData() as $session) {
            $exists = Session::where('id', $session['id'])->exists();
            if ($exists) {
                continue;
            }

            Session::create([
                'id' => $session['id'],
                'course_id' => $session['course_id'],
                'category_id' => $session['category_id'],
                'user_id' => $session['user_id'],
                'score' => $session['score'],
                'score_normalized' => $session['score_normalized'],
                'start_difficulty' => $session['start_difficulty'],
                'end_difficulty' => $session['end_difficulty'],
                'timestamp' => $session['timestamp']
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
                'course_id' => 1,
                'category_id' => 1,
                'user_id' => 1,
                'score' => 12,
                'score_normalized' => 12,
                'start_difficulty' => 'easy',
                'end_difficulty' => 'medium',
                'timestamp' => 1609459200,
            ],
            [
                'id' => 2,
                'course_id' => 2,
                'category_id' => 4,
                'user_id' => 1,
                'score' => 49,
                'score_normalized' => 49,
                'start_difficulty' => 'hard',
                'end_difficulty' => 'easy',
                'timestamp' => 1609462800,
            ],
            [
                'id' => 3,
                'course_id' => 2,
                'category_id' => 1,
                'user_id' => 1,
                'score' => 17,
                'score_normalized' => 17,
                'start_difficulty' => 'hard',
                'end_difficulty' => 'medium',
                'timestamp' => 1609466400,
            ],
            [
                'id' => 4,
                'course_id' => 1,
                'category_id' => 4,
                'user_id' => 1,
                'score' => 17,
                'score_normalized' => 17,
                'start_difficulty' => 'medium',
                'end_difficulty' => 'medium',
                'timestamp' => 1609470000,
            ],
            [
                'id' => 5,
                'course_id' => 2,
                'category_id' => 2,
                'user_id' => 1,
                'score' => 81,
                'score_normalized' => 81,
                'start_difficulty' => 'easy',
                'end_difficulty' => 'easy',
                'timestamp' => 1609473600,
            ],
            [
                'id' => 6,
                'course_id' => 2,
                'category_id' => 4,
                'user_id' => 1,
                'score' => 19,
                'score_normalized' => 19,
                'start_difficulty' => 'easy',
                'end_difficulty' => 'medium',
                'timestamp' => 1609477200,
            ],
            [
                'id' => 7,
                'course_id' => 1,
                'category_id' => 3,
                'user_id' => 1,
                'score' => 62,
                'score_normalized' => 62,
                'start_difficulty' => 'medium',
                'end_difficulty' => 'very_easy',
                'timestamp' => 1609480800,
            ],
            [
                'id' => 8,
                'course_id' => 2,
                'category_id' => 1,
                'user_id' => 1,
                'score' => 15,
                'score_normalized' => 15,
                'start_difficulty' => 'medium',
                'end_difficulty' => 'medium',
                'timestamp' => 1609484400,
            ],
            [
                'id' => 9,
                'course_id' => 1,
                'category_id' => 2,
                'user_id' => 1,
                'score' => 75,
                'score_normalized' => 75,
                'start_difficulty' => 'medium',
                'end_difficulty' => 'medium',
                'timestamp' => 1609488000,
            ],
            [
                'id' => 10,
                'course_id' => 2,
                'category_id' => 1,
                'user_id' => 1,
                'score' => 18,
                'score_normalized' => 18,
                'start_difficulty' => 'very_easy',
                'end_difficulty' => 'hard',
                'timestamp' => 1609491600,
            ],
            [
                'id' => 11,
                'course_id' => 2,
                'category_id' => 3,
                'user_id' => 1,
                'score' => 11,
                'score_normalized' => 11,
                'start_difficulty' => 'very_easy',
                'end_difficulty' => 'hard',
                'timestamp' => 1609495200,
            ],
            [
                'id' => 12,
                'course_id' => 1,
                'category_id' => 1,
                'user_id' => 1,
                'score' => 100,
                'score_normalized' => 100,
                'start_difficulty' => 'medium',
                'end_difficulty' => 'medium',
                'timestamp' => 1609498800,
            ],
            [
                'id' => 13,
                'course_id' => 1,
                'category_id' => 3,
                'user_id' => 1,
                'score' => 95,
                'score_normalized' => 95,
                'start_difficulty' => 'medium',
                'end_difficulty' => 'very_easy',
                'timestamp' => 1609502400,
            ],
            [
                'id' => 14,
                'course_id' => 1,
                'category_id' => 4,
                'user_id' => 1,
                'score' => 42,
                'score_normalized' => 42,
                'start_difficulty' => 'hard',
                'end_difficulty' => 'hard',
                'timestamp' => 1609506000,
            ],
            [
                'id' => 15,
                'course_id' => 2,
                'category_id' => 3,
                'user_id' => 1,
                'score' => 24,
                'score_normalized' => 24,
                'start_difficulty' => 'hard',
                'end_difficulty' => 'easy',
                'timestamp' => 1609509600,
            ],
        ];
    }
}
