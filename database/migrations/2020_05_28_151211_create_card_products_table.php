<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('card_id')->index();
            $table->string('name');
            $table->text('image');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('price')->nullable();
            $table->text('payment_link')->nullable();
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
        Schema::dropIfExists('card_products');
    }
}
