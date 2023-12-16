<?php

namespace App\Domains\Courses\Entities;

use App\Domains\Courses\Enums\ExerciseDifficultyEnum;

class Session
{
    public int $id;
    public int $courseId;
    public int $categoryId;
    public int $userId;

    public int $score;
    public int $scoreNormalized;
    public ExerciseDifficultyEnum $startDifficulty;
    public ExerciseDifficultyEnum $endDifficulty;
    public int $timestamp;

    public \DateTimeImmutable $createdAt;
    public \DateTimeImmutable $updatedAt;

    /**
     * @param array<string, mixed> $data
     * @return self
     * @throws \Exception
     */
    public static function fromArray(array $data): self
    {
        $self = new self();

        $self->id = $data['id'];
        $self->courseId = $data['course_id'];
        $self->categoryId = $data['category_id'];
        $self->userId = $data['user_id'];

        $self->score = $data['score'];
        $self->scoreNormalized = $data['score_normalized'];

        // maybe assume its ease if not set?
        $self->startDifficulty = ExerciseDifficultyEnum::tryFrom($data['start_difficulty'])
            ?? ExerciseDifficultyEnum::EASY;
        $self->endDifficulty = ExerciseDifficultyEnum::tryFrom($data['end_difficulty'])
            ?? ExerciseDifficultyEnum::EASY;

        $self->timestamp = $data['timestamp'];

        $self->createdAt = new \DateTimeImmutable($data['created_at']);
        $self->updatedAt = new \DateTimeImmutable($data['updated_at']);

        return $self;
    }
}
