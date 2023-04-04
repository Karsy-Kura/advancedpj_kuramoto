<?php

namespace App\Models;

use Illuminate\Auth\Events\Failed;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
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

    public static function getIdFromAreaName(String $areaName)
    {
        $faildId = -1;
        if (is_null($areaName)) {
            return $faildId;
        }

        $area = self::where('name', $areaName)->first();
        if (is_null($area)) {
            return $faildId;
        }

        return $area->id;
    }
}
