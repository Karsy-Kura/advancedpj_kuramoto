<?php

namespace App\Models;

use DateTime;
use DateTimeImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id',
        'datetime',
        'num_of_people',
        'deleted_at',
    ];

    public function users() {
        return $this->belongsTo('App\Models\User');
    }

    public function shops() {
        return $this->belongsTo('App\Models\Shop');
    }

    static public function getReserveInfo($array, $user_id)
    {
        $datetime = $array['date'] . ' ' . $array['time'];
        $info = [
            'user_id' => $user_id,
            'shop_id' => $array['shop_id'],
            'datetime' => $datetime,
            'num_of_people' => $array['num_of_people'],
        ];

        return $info;
    }
}
