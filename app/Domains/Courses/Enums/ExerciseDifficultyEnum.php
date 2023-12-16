<?php

namespace App\Domains\Courses\Enums;

enum ExerciseDifficultyEnum: string
{
    case VERY_EASY = 'very_easy';
    case EASY = 'easy';
    case MEDIUM = 'medium';
    case HARD = 'hard';
}
