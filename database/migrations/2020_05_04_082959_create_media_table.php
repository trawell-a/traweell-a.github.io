<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable()->comment="Название файла";
            $table->string('extension')->nullable()->comment="Расширение файла";
            $table->string('path')->nullable()->comment="Путь к файлу и сам файл: path/to/file.ext";
            $table->integer('size')->nullable()->comment="Размер файла";
            $table->timestamps();
            $table->index(['path']);
            $table->index(['id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
