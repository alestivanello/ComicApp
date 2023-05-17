<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    public $timestamps = false;
    protected $table = 'favourites';

    // Define the fillable columns if needed
    protected $fillable = ['comic_id'];
}
