<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'director', 'image_url', 'duration', 'release_date', 'genre'];

    public static function search($term, $skip, $take)
    {
        return self::where('title', 'LIKE', '%' . $term . '%')
            ->skip($skip)
            ->take($take)
            ->get();
    }
}
