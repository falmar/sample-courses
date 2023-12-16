<?php

namespace App\Domains\Courses\ValueObjects;

class SessionHistory implements \JsonSerializable
{
    /** @var int total points achieved in the session */
    public int $score;
    /** @var int unix timestamp of the session. */
    public int $date;

    public function __construct(
        int $score,
        int $date,
    ) {
        $this->score = $score;
        $this->date = $date;
    }

    /**
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return [
            'score' => $this->score,
            'date' => $this->date,
        ];
    }
}
