<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'area_id',
        'category_id',
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
        $genre = Category::find($this->category_id);
        if ($genre === null) {
            return;
        }
        return $genre->name;
    }
}
