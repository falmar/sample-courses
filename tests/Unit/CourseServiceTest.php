<?php

namespace Tests\Unit;

use App\Domains\Courses\Repos\CategoryRepositoryMem;
use App\Domains\Courses\Repos\SessionRepositoryMem;
use App\Domains\Courses\SessionService;
use App\Domains\Courses\Specs\GetUserHistoryInput;
use Database\Seeders\Courses\CategorySeeder;
use Database\Seeders\Courses\SessionSeeder;
use Tests\TestCase;

class CourseServiceTest extends TestCase
{
    public function testGetSessionsByUserId_should_return_no_items_non_existing_user(): void
    {
        // given
        $service = $this->getService();
        $spec = new GetUserHistoryInput();
        $spec->userId = 5;

        // when
        $output = $service->getUserHistory($spec);

        // then
        $this->assertCount(0, $output->history);
    }

    public function testGetSessionsByUserId_should_return_items_max_12(): void
    {
        // given
        $service = $this->getService();
        $spec = new GetUserHistoryInput();
        $spec->userId = 1;

        // when
        $output = $service->getUserHistory($spec);

        // then
        $this->assertGreaterThanOrEqual(12, $output->history);
    }

    public function testGetSessionsByUserId_should_return_items_available(): void
    {
        // given
        $service = $this->getService();
        $spec = new GetUserHistoryInput();
        $spec->userId = 2;

        // when
        $output = $service->getUserHistory($spec);

        // then
        $this->assertCount(5, $output->history);
    }

    public function testGetSessionsByUserId_should_return_items_no_categories(): void
    {
        // given
        $service = $this->getService();
        $spec = new GetUserHistoryInput();
        $spec->userId = 2;

        // when
        $output = $service->getUserHistory($spec);

        // then
        $this->assertCount(0, $output->categories);
    }

    public function testGetSessionsByUserId_should_return_items_with_categories(): void
    {
        // given
        $service = $this->getService();
        $spec = new GetUserHistoryInput();
        $spec->userId = 1;
        $spec->withCategories = true;

        // when
        $output = $service->getUserHistory($spec);

        // then
        $this->assertCount(3, $output->categories);

        $this->assertTrue(in_array('Memory', $output->categories));
        $this->assertTrue(in_array('Speed', $output->categories));
        $this->assertTrue(in_array('Logic', $output->categories));
    }

    private function getService(): SessionService
    {
        return new SessionService(
            sessionRepository: $this->GetSessionRepo(),
            categoryRepository: $this->GetCategoryRepo(),
        );
    }

    private function GetSessionRepo(): SessionRepositoryMem
    {
        return new SessionRepositoryMem(
            SessionSeeder::getData()
        );
    }

    private function GetCategoryRepo(): CategoryRepositoryMem
    {
        return new CategoryRepositoryMem(
            CategorySeeder::getData()
        );
    }
}
