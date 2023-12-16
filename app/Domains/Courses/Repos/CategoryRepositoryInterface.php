<?php

namespace App\Domains\Courses\Repos;

interface CategoryRepositoryInterface
{
    /**
     * @param array<int> $ids
     * @return array<int, string>
     */
    public function getCategoryNamesByIds(array $ids): array;
}
