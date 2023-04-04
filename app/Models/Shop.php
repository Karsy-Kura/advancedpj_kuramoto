<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'area_id',
        'genre_id',
        'description',
    ];

    protected $guarded = [
        'id',
    ];

    public function reserves()
    {
        return $this->hasMany('App\Models\Reserve');
    }

    public function favorites()
    {
        return $this->hasMany('App\Models\Favorite');
    }

    public function getAreaAttribute()
    {
        $area = Area::find($this->area_id);
        if ($area === null) {
            return;
        }
        return $area->name;
    }

    public function getGenreAttribute()
    {
        $genre = Genre::find($this->genre_id);
        if ($genre === null) {
            return;
        }
        return $genre->name;
    }

    public function getUserFavoriteIdAttribute()
    {
        // ログインしてない場合は必要ない.
        if (!Auth::check())
        {
            return null;
        }

        $shopFavorites = Favorite::with('shops')->where('shop_id', $this->id)->get();
        if (($shopFavorites->isEmpty())) {
            return null;
        }

        $userFavorite = $shopFavorites->where('user_id', Auth::id())->first();
        if ($userFavorite === null) {
            return null;
        }

        return $userFavorite->id;
    }
}
