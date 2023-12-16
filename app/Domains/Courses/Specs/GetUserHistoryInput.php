<?php

namespace App\Domains\Courses\Specs;

class GetUserHistoryInput
{
    public int $userId;

    // optional
    public bool $withCategories = false;
}
