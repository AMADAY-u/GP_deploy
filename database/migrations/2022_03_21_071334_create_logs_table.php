<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');    //ここを追加

            // 画像ファイルパス
            $table->string('image');
            $table->string('pet_title');
            $table->string('pet_foodname');
            $table->Integer('comment_check');
            $table->Integer('pet_activity')->nullable();
            $table->Integer('pet_hungry')->nullable();
            $table->Integer('pet_water')->nullable();
            $table->Integer('pet_urine')->nullable();
            $table->Integer('pet_feces')->nullable();
            $table->Integer('pet_emit')->nullable();
            $table->text('pet_comment')->nullable();
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
        Schema::dropIfExists('logs');
    }
};
