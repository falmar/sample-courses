<?php

namespace App\Domains\Courses;

use App\Domains\Courses\Entities\Session;
use App\Domains\Courses\Repos\CategoryRepositoryInterface;
use App\Domains\Courses\Repos\SessionRepositoryInterface;
use App\Domains\Courses\Specs\GetUserHistoryInput;
use App\Domains\Courses\Specs\GetUserHistoryOutput;
use App\Domains\Courses\ValueObjects\SessionHistory;

readonly class SessionService implements SessionServiceInterface
{
    public function __construct(
        private SessionRepositoryInterface $sessionRepository,
        private CategoryRepositoryInterface $categoryRepository,
    ) {
    }

    public function getUserHistory(GetUserHistoryInput $input): GetUserHistoryOutput
    {
        /** @var SessionHistory[] $history */
        $history = [];
        /** @var array<string> $categories */
        $categories = [];

        // get sessions by user id
        $options = [
            'limit' => 12,
            'offset' => 0
        ];
        $sessions = $this->sessionRepository->getSessionsByUserId($input->userId, $options);

        // map sessions to history
        foreach ($sessions as $session) {
            $history[] = new SessionHistory(
                score: $session->score,
                date: $session->timestamp,
            );
        }

        // get categories
        if ($input->withCategories) {
            // extract category ids from sessions
            $categoryIds = array_map(
                fn (Session $session) => $session->categoryId,
                array_slice($sessions, 0, 3),
            );

            // get category names by ids
            $categories = array_map(
                fn (string $item) => $item,
                $this->categoryRepository->getCategoryNamesByIds($categoryIds)
            );
        }

        // set output
        $output = new GetUserHistoryOutput();
        $output->history = $history;
        $output->categories = $categories;

        return $output;
    }


}
