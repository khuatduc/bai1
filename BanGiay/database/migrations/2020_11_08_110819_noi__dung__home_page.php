<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NoiDungHomePage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NoiDung', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Hinh1');
            $table->string('TieuDe1');
             $table->string('NoiDung1');
            $table->string('Hinh2');
            $table->string('TieuDe2');
              $table->string('NoiDung2');
            $table->string('TieuDe3');
              $table->string('NoiDung3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('NoiDung');
    }
}
