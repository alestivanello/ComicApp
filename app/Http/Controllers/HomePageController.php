<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MarvelService;

class HomePageController extends Controller
{
    private $marvelService;

    public function __construct(MarvelService $marvelService)
    {
        $this->marvelService = $marvelService;
    }

    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $response = $this->marvelService->getComics($page);
        $response['title'] = 'Marvel API Explorer';
        $response['hasPagination'] = true;
        return view('home.index', compact('response'));
    }
}
