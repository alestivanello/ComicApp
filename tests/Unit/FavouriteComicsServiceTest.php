<?php

namespace Tests\Unit\Services;

use App\Models\Favourite;
use App\Services\FavouriteComicsService;
use App\Services\MarvelService;
use Mockery;
use Tests\TestCase;
use App\DTO\ComicDTO;

class FavouriteComicsServiceTest extends TestCase
{
    public function testAddFavourite() //TODO create a in memory database for testing purposes
    {
        $marvelServiceMock = Mockery::mock(MarvelService::class);

        $favouriteComicsService = new FavouriteComicsService($marvelServiceMock);

        $id = '15522'; /// will it work once lol

        $result = $favouriteComicsService->addFavourite($id);

        $this->assertEquals('Favourite added successfully', $result);
    }
    
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

}
