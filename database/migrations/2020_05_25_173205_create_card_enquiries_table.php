<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_enquiries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('card_id')->index();
            $table->string('name');
            $table->unsignedBigInteger('phone');
            $table->string('email')->nullable();
            $table->text('message');
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
        Schema::dropIfExists('card_enquiries');
    }
}
