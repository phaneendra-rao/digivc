<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyBrochuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_brochures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id',150)->index();
            $table->string('card_id',150)->index();
            $table->enum('type',['brochure','catalog'])->nullable();
            $table->string('title')->nullable();
            $table->text('brochure');
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
        Schema::dropIfExists('company_brochures');
    }
}
