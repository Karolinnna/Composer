<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    /** @use HasFactory<\Database\Factories\SongFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'artist',
        'album',
        'genre',
        'duration',
        'release_date',
        'lyrics',
        'cover_image',
    ];

    protected $casts = [
        'release_date' => 'date',
        'duration' => 'integer',
    ];
}
