<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameCategoriesToGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('categories', 'genres');

        // 合わせて, shopsのカラム名も変更.
        Schema::table('shops', function (Blueprint $table) {
            $table->renameColumn('category_id', 'genre_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('genres', 'categories');

        Schema::table('shops', function (Blueprint $table) {
            $table->renameColumn('genre_id', 'category_id');
        });
    }
}
