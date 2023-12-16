<?php

namespace App\Domains\Courses\Repos;

use App\Domains\Courses\Entities\Session;

interface SessionRepositoryInterface
{
    /**
     * @param int $userId
     * @param array<string, mixed> $options
     * @return Session[]
     */
    public function getSessionsByUserId(int $userId, array $options = []): array;
}
