<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable = [
        'datetime',
        'num_of_people',
        'deleted_at',
    ];

    protected $guarded = [
        'user_id',
        'shop_id',
    ];
}
