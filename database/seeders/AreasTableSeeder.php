<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area;

class AreasTableSeeder extends Seeder
{
    use \App\Traits\CsvTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // load data from csv.
        $filePath = public_path() . '/csv/AreaList.csv';
        $file = $this->getCsvFileFromFilePath($filePath);

        $counter = 0;
        foreach ($file as $line) {
            // skip header line.
            $counter++;
            if ($counter == 1) {
                continue;
            }

            // create record.
            Area::firstOrCreate(['name' => $line[0]]);
        }
    }
}
