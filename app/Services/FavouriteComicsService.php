<?php

namespace App\Services;

use App\DTO\ComicDTO;
use App\Models\Favourite;
use App\Services\MarvelService;

/* The FavouriteComicsService class manages adding and retrieving favourite comics using the
MarvelService API. */
class FavouriteComicsService
{
    private $marvelService;

    public function __construct(MarvelService $marvelService)
    {
        $this->marvelService = $marvelService;
    }

    public function addFavourite($id) {
        $favourite = new Favourite();
        $favourite->comic_id = $id;
        $favourite->save();
        return 'Favourite added successfully';
    }

    public function getFavourites() {
        $favs = Favourite::all();
        $response = [];

        foreach ($favs as $favourite) {
            $comicId = $favourite->comic_id;
            //TODO: review if we can make only 1 api call
            $comicResponse = $this->marvelService->getComicById($comicId);
            $response[] = $comicResponse['comics'][0];
        }
        
        return $response;
    }
}