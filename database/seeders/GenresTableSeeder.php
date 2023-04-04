<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
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
        $filePath = public_path() . '/csv/GenreList.csv';
        $file = $this->getCsvFileFromFilePath($filePath);

        $counter = 0;
        foreach ($file as $line) {
            // skip header line.
            $counter++;
            if ($counter == 1) {
                continue;
            }

            // create record.
            Genre::firstOrCreate(['name' => $line[0]]);
        }
    }
}
