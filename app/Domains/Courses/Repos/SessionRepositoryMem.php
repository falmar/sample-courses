<?php

namespace App\Domains\Courses\Repos;

use App\Domains\Courses\Entities\Session;

class SessionRepositoryMem implements SessionRepositoryInterface
{
    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data)
    {
        $this->entities = [];

        foreach ($data as $item) {
            $entity = Session::fromArray($item);

            $this->entities[$entity->id] = $entity;
        }
    }

    /** @var array<int, Session> */
    private array $entities = [];

    public function getSessionsByUserId(int $userId, array $options = []): array
    {
        $sessions = [];

        foreach ($this->entities as $session) {
            if ($session->userId !== $userId) {
                continue;
            }

            $sessions[] = $session;
        }

        // sort timestamp DESC
        usort($sessions, fn (Session $a, Session $b) => $b->timestamp <=> $a->timestamp);

        return array_slice(
            $sessions,
            $options['offset'] ?? 0,
            $options['limit'] ?? 15
        );
    }
}
