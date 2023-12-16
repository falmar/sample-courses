<?php

namespace Tests\Unit;

use App\Domains\Courses\Repos\SessionRepositoryMem;
use Database\Seeders\Courses\SessionSeeder;
use Tests\TestCase;

class SessionRepoMemTest extends TestCase
{
    public function testGetSessionsByUserId_should_return_no_items_empty_data(): void
    {
        // given
        $repo = $this->GetEmptyRepo();

        // when
        $sessions = $repo->getSessionsByUserId(1);

        // then
        $this->assertCount(0, $sessions);
    }

    public function testGetSessionsByUserId_should_return_no_items_non_existent_user(): void
    {
        // given
        $repo = $this->GetFilledRepo();

        // when
        $sessions = $repo->getSessionsByUserId(3);

        // then
        $this->assertCount(0, $sessions);
    }

    public function testGetSessionsByUserId_should_return_items(): void
    {
        // given
        $repo = $this->GetFilledRepo();

        // when
        $sessions = $repo->getSessionsByUserId(1);

        //
        $this->assertGreaterThanOrEqual(15, $sessions);
    }

    public function testGetSessionsByUserId_should_return_items_limited(): void
    {
        // given
        $options = [
            'offset' => 0,
            'limit' => 3,
        ];

        $repo = $this->GetFilledRepo();

        // when
        $sessions = $repo->getSessionsByUserId(1, $options);


        // then
        $this->assertCount(3, $sessions);
    }

    public function testGetSessionsByUserId_should_return_items_limited_offset(): void
    {
        // given
        $options = [
            'offset' => 5,
            'limit' => 15,
        ];

        $repo = $this->GetFilledRepo();

        // when
        $sessions = $repo->getSessionsByUserId(1, $options);

        // then
        $this->assertCount(10, $sessions);
    }

    public function testGetSessionsByUserId_should_sort_timestamp_desc(): void
    {
        $repo = $this->GetFilledRepo();

        // when
        $sessions = $repo->getSessionsByUserId(1);

        // then
        $previous = null;
        foreach ($sessions as $key => $session) {
            if ($key === 0) {
                $previous = $session->timestamp;
                continue;
            }

            $this->assertLessThanOrEqual($previous, $session->timestamp);

            $previous = $session->timestamp;
        }
    }

    private function GetFilledRepo(): SessionRepositoryMem
    {
        return new SessionRepositoryMem(
            SessionSeeder::getData()
        );
    }

    private function GetEmptyRepo(): SessionRepositoryMem
    {
        return new SessionRepositoryMem([]);
    }
}
