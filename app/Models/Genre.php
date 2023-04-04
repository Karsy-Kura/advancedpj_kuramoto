<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $guarded = [
        'id',
    ];

    public function shops() {
        return $this->hasMany('App\Models\Shop');
    }

    public static function getIdFromGenreName(String $genreName)
    {
        $faildId = -1;
        if (is_null($genreName)) {
            return $faildId;
        }

        $genre = self::where('name', $genreName)->first();
        if (is_null($genre)) {
            return $faildId;
        }

        return $genre->id;
    }
}
