<?php

namespace Tests\Unit;

use App\Domains\Courses\Repos\CategoryRepositoryMem;
use Database\Seeders\Courses\CategorySeeder;
use Tests\TestCase;

class CategoryRepoMemTest extends TestCase
{
    public function testGetCategoryNamesByIds_should_return_no_items_empty_data(): void
    {
        // given
        $repo = $this->GetEmptyRepo();

        // when
        $names = $repo->getCategoryNamesByIds([]);

        // then
        $this->assertCount(0, $names);
    }

    public function testGetCategoryNamesByIds_should_return_no_items_empty_data_with_id(): void
    {
        // given
        $repo = $this->GetEmptyRepo();

        // when
        $names = $repo->getCategoryNamesByIds([1, 2]);

        // then
        $this->assertCount(0, $names);
    }

    public function testGetCategoryNamesByIds_should_return_no_items_non_existent_category(): void
    {
        // given
        $repo = $this->GetFilledRepo();

        // when
        $names = $repo->getCategoryNamesByIds([50, 100]);

        // then
        $this->assertCount(0, $names);
    }

    public function testGetCategoryNamesByIds_should_return_items(): void
    {
        // given
        $repo = $this->GetFilledRepo();

        // when
        $names = $repo->getCategoryNamesByIds([1, 2]);

        // then
        $this->assertCount(2, $names);
        $this->assertEquals(['Memory', 'Concentration'], $names);
    }


    private function GetFilledRepo(): CategoryRepositoryMem
    {
        return new CategoryRepositoryMem(
            CategorySeeder::getData()
        );
    }

    private function GetEmptyRepo(): CategoryRepositoryMem
    {
        return new CategoryRepositoryMem([]);
    }
}
