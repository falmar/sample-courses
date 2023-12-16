<?php

namespace App\Domains\Courses;

use App\Domains\Courses\Specs\GetUserHistoryInput;
use App\Domains\Courses\Specs\GetUserHistoryOutput;

interface SessionServiceInterface
{
    /**
     * Get user history
     * @param GetUserHistoryInput $input
     * @return GetUserHistoryOutput
     */
    public function getUserHistory(GetUserHistoryInput $input): GetUserHistoryOutput;
}
