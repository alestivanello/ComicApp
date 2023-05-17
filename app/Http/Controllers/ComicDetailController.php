<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MarvelService;
use App\Services\FavouriteComicsService;

class ComicDetailController extends Controller
{
    private $marvelService;
    private $favouriteService;

    public function __construct(MarvelService $marvelService, FavouriteComicsService $favouriteService)
    {
        $this->marvelService = $marvelService;
        $this->favouriteService = $favouriteService;
    }

    public function index(Request $request)
    {
        $id = $request->get('id');
        $response = $this->marvelService->getComicById($id);
        return view('comic.index', compact('response'));
    }

    public function markAsFavourite(Request $request) {
        $comicId = $request->input('id');
        $body = json_encode($request->all());

        $response = $this->favouriteService->addFavourite($comicId);
        return response()->json(['message' => 'Favourite added successfully']);
    }

    public function getFavourites() {
        $comics = $this->favouriteService->getFavourites();
        $response['title'] = 'Your favs';
        $response['comics'] = $comics;
        $response['hasPagination'] = false;
        return view('home.index', compact('response'));
    }
}
