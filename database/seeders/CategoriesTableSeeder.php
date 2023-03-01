<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
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
        $filePath = public_path() . '/csv/CategoryList.csv';
        $file = $this->getCsvFileFromFilePath($filePath);

        $counter = 0;
        foreach ($file as $line) {
            // skip header line.
            $counter++;
            if ($counter == 1) {
                continue;
            }

            // create record.
            Category::firstOrCreate(['name' => $line[0]]);
        }
    }
}
