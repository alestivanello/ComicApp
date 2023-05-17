<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use App\DTO\ComicDTO;

/* The MarvelService class retrieves comic book data from the Marvel API and returns it in a formatted
way. */
class MarvelService
{
    private $ts;
    private $apiKey;
    private $hash;

    public function __construct()
    {
        $this->ts = env('MARVEL_TS');
        $this->apiKey = env('MARVEL_APIKEY');
        $this->hash = env('MARVEL_HASH');
    }

    public function getComics($page) {
        $url = 'http://gateway.marvel.com/v1/public/comics';
        return $this->makeRequest($url, null, $page);
    }

    public function getComicById ($id) {
        $url = 'http://gateway.marvel.com/v1/public/comics';
        return $this->makeRequest($url, $id);
    }

    private function makeRequest ($url, $id = null, $page = null) {
        $client = new Client();
        error_log($page);
        $queryParams = [
            'ts' => $this->ts,
            'apikey' => $this->apiKey,
            'hash' => $this->hash,
            'limit' => 10,
        ];

        if ($id !== null) {
            $queryParams['id'] = $id;
        }

        if ($page !== null) {
            $queryParams['offset'] = $page;
        }

        $response = $client->get($url, [
            'query' => $queryParams
        ]);

        $comicsJson = $response->getBody();

        $comics = json_decode($comicsJson, true);
        
        $comicsDto = []; 

        foreach ($comics['data']['results'] as $item) {
            $path = '';

            if (isset($item['images']) && is_array($item['images']) && count($item['images']) > 0) {
                $firstImage = $item['images'][0];
                $firstImagePath = $firstImage['path'];
                $extension = $firstImage['extension'];
                $path = $firstImagePath .'.'. $extension;
            } else {
                $path = 'https://t4.ftcdn.net/jpg/03/03/40/19/360_F_303401956_ufTeSp9EX62zQnJnbed9Q0kEgqaKKL44.jpg';
            }

            $creatorNames = array();
            foreach ($item['creators']['items'] as $creator) {
                $creatorNames[] = $creator['name'];
            }

            $comic = new ComicDTO($item['id'], $item['title'], $path, $creatorNames);
            $comicsDto[] = $comic;
        }

        $pagination['current'] = $comics['data']['offset'];
        $pagination['pages_quantity'] = ceil($comics['data']['total'] / $comics['data']['limit']);

        $data['comics'] = $comicsDto;
        $data['pagination'] = $pagination;

        return $data;
    }
}