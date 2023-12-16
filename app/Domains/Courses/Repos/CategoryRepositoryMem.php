<?php

namespace App\Domains\Courses\Repos;

use App\Domains\Courses\Entities\Category;

class CategoryRepositoryMem implements CategoryRepositoryInterface
{
    /**
     * @param array<string, mixed> $data
     */
    public function __construct(array $data)
    {
        $this->entities = [];

        foreach ($data as $item) {
            $entity = Category::fromArray($item);

            $this->entities[$entity->id] = $entity;
        }
    }

    /** @var array<int, Category> */
    private array $entities = [];

    public function getCategoryNamesByIds(array $ids): array
    {
        /** @var string[] $names */
        $names = [];

        foreach ($ids as $id) {
            $cat = $this->entities[$id] ?? null;

            if (!$cat) {
                continue;
            }

            $names[] = $cat->name;
        }

        return $names;
    }
}
