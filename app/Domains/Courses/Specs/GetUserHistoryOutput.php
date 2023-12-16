<?php

namespace App\Domains\Courses\Specs;

use App\Domains\Courses\ValueObjects\SessionHistory;

class GetUserHistoryOutput
{
    /** @var SessionHistory[]  */
    public array $history;

    /**
     * recent categories
     * @var array<string>
     */
    public array $categories = [];
}
