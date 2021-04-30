<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyShareableLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_shareable_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id',150)->index();
            $table->string('card_id',150)->index();
            $table->enum('type',['social','business'])->index();
            $table->string('name');
            $table->text('link');
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
        Schema::dropIfExists('company_shareable_links');
    }
}
