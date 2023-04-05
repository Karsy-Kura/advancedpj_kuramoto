<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Genre;
use App\Models\Shop;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ShopsTableSeeder extends Seeder
{
    use \App\Traits\CsvTrait;

    private const SHOP_TABLE_COLUMNS = [
        'name',
        'area_id',
        'genre_id',
        'description',
        'img_url'
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
        foreach ($file as $line) {
            // skip header line.
            $counter++;
            if ($counter == 1) {
                continue;
            }

            $areaId = self::getAreaId($line[1], $counter);
            $genreId = self::getGenreId($line[2], $counter);
            if (($areaId == -1) || ($genreId == -1)) {
                continue;
            }

            $res = self::saveImgToStrageFromURL($line[4]);

            $elem = [
                self::SHOP_TABLE_COLUMNS[0] => $line[0],    // name.
                self::SHOP_TABLE_COLUMNS[1] => $areaId,     // area_id.
                self::SHOP_TABLE_COLUMNS[2] => $genreId,    // genre_id.
                self::SHOP_TABLE_COLUMNS[3] => $line[3],    // description.
                self::SHOP_TABLE_COLUMNS[4] => $res,    // img_url.
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

    private function getGenreId($genreName, $lineNum)
    {
        $genreId = Genre::getIdFromGenreName($genreName);

        if ($genreId == -1) {
            $this->command->line('Load Error: genre = ' . $genreName . ' ( line = ' . $lineNum . ')');
        }

        return $genreId;
    }

    private function saveImgToStrageFromURL(String $url)
    {
        $splits = explode("/", $url);
        $filename = $splits[count($splits) - 1];

        $res = null;
        if (app()->isLocal()) {
            $res = Storage::disk('local')->putFileAs('public/img', $url, $filename);
        }
        else if (app()->isProduction()) {
            $res = Storage::disk('s3')->putFileAs('img', $url, $filename);
        }
        else {
            return;
        }

        return $res;
    }
}
