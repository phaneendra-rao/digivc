<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('card_id')->index();
            $table->text('link')->nullable();
            $table->timestamps();

            $table->foreign('card_id')->references('id')->on('cards')->onUpdate('CASCADE')->onDelete('CASCADE'); // cascade
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_videos');
    }
}
