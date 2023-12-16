<?php

namespace App\Domains\Courses\Repos;

use App\Domains\Courses\Entities\Session;
use App\Models\PDOProvider;

readonly class SessionRepositoryPDO implements SessionRepositoryInterface
{
    public function __construct(private readonly PDOProvider $pdoProvider)
    {
    }

    public function getSessionsByUserId(int $userId, array $options = []): array
    {
        $limit = $options['limit'] ?? 15;
        $offset = $options['offset'] ?? 0;

        $stmt = $this->pdoProvider
            ->getPdo()
            ->prepare('SELECT * FROM sessions WHERE user_id = ? ORDER BY timestamp LIMIT ? OFFSET ?');

        $stmt->execute([
            $userId,
            $limit,
            $offset
        ]);

        /** @var Session[] $sessions */
        $sessions = [];
        while ($row = $stmt->fetch()) {
            $sessions[] = Session::fromArray($row);
        }

        return $sessions;
    }
}
