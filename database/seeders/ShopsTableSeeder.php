<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Category;
use App\Models\Shop;
use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
  use \App\Traits\CsvTrait;

  private const SHOP_TABLE_COLUMNS = [
    'name',
    'area_id',
    'category_id',
    'description'
  ];
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // load data from csv.
    $filePath = public_path() . '/csv/ShopList.csv';
    $file = $this->getCsvFileFromFilePath($filePath);

    // make array data.
    $counter = 0;
    foreach ($file as $line)
    {
      // skip header line.
      $counter++;
      if ($counter == 1) {
        continue;
      }

      $areaId = self::getAreaId($line[1], $counter);
      $categoryId = self::getCategoryId($line[2], $counter);
      if (($areaId == -1) || ($categoryId == -1)) {
        continue;
      }

      $elem = [
        self::SHOP_TABLE_COLUMNS[0] => $line[0],    // name.
        self::SHOP_TABLE_COLUMNS[1] => $areaId,     // area_id.
        self::SHOP_TABLE_COLUMNS[2] => $categoryId, // category_id.
        self::SHOP_TABLE_COLUMNS[3] => $line[3],    // description.
      ];

      // create record.
      Shop::firstOrCreate($elem);
    }
  }

  private function getAreaId($areaName, $lineNum)
  {
    $areaId = Area::getIdFromAreaName($areaName);

    if ($areaId == -1) {
      $this->command->line('Load Error: area = ' . $areaName . ' ( line = ' . $lineNum . ')');
    }

    return $areaId;
  }

  private function getCategoryId($categoryName, $lineNum)
  {
    $categoryId = Category::getIdFromCategoryName($categoryName);

    if ($categoryId == -1) {
      $this->command->line('Load Error: category = ' . $categoryName . ' ( line = ' . $lineNum . ')');
    }

    return $categoryId;
  }
}
