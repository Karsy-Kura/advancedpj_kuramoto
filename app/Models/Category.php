<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
  ];

  protected $guarded = [
    'id',
  ];

  public static function getIdFromCategoryName(String $categoryName)
  {
    $faildId = -1;
    if (is_null($categoryName)) {
      return $faildId;
    }

    $category = self::where('name', $categoryName)->first();
    if (is_null($category)) {
      return $faildId;
    }

    return $category->id;
  }
}
