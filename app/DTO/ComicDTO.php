<?php

namespace App\DTO;

class ComicDTO
{
    public $id;
    public $title;
    public $image;
    public $creatorNames = array();

    public function __construct($id, $title, $image, $creatorNames)
    {
        $this->id = $id;
        $this->title = $title;
        $this->image = $image;
        $this->creatorNames = $creatorNames;
    }
}