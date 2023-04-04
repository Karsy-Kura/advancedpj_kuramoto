<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favorite extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'shop_id',
        'deleted_id',
    ];

    public function users() {
        return $this->belongsTo('App\Models\User');
    }

    public function shops() {
        return $this->belongsTo('App\Models\Shop');
    }

    public function getShopAttribute()
    {
        $shop = Shop::find($this->shop_id);
        if ($shop == null)
        {
            return;
        }
        return $shop;
    }
}
