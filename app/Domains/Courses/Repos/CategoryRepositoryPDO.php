<?php

namespace App\Domains\Courses\Repos;

use App\Models\PDOProvider;

readonly class CategoryRepositoryPDO implements CategoryRepositoryInterface
{
    public function __construct(private readonly PDOProvider $pdoProvider)
    {
    }

    public function getCategoryNamesByIds(array $ids): array
    {
        // creates placeholders for each id (?, ?...)
        $params = implode(',', array_map(fn ($id) => '?', $ids));

        $statement = $this->pdoProvider->getPdo()
            ->prepare("SELECT id, name from categories WHERE id IN {$params}");

        $statement->execute($ids);

        /** @var array<int, string> $names */
        $names = [];
        while ($row = $statement->fetch()) {
            /** @var int $id */
            /** @var string $name */
            $id = (int)$row['id'];
            $name = (string)$row['name'];

            $names[$id] = $name;
        }

        return $names;
    }
}
