<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug',150)->index()->nullable();
            $table->string('custom_slug',150)->index()->nullable();
            $table->string('user_id',20)->index();
            $table->enum('card_type',['basic','premium'])->index();
            $table->enum('logo_shape',['round','square'])->index();
            $table->integer('template')->nullable();
            $table->string('company_name')->nullable();
            $table->string('tag_line')->nullable();
            $table->text('company_logo')->nullable();
            $table->string('primary_color')->nullable();
            $table->text('company_cover')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('company_whatsapp_no')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_website')->nullable();
            $table->text('company_about')->nullable();
            $table->string('company_offer')->nullable();
            $table->text('contact_profile_pic')->nullable();
            $table->string('contact_person_name')->nullable();
            $table->string('contact_person_designation')->nullable();
            $table->string('contact_person_phone')->nullable();
            $table->string('contact_person_whatsapp_no')->nullable();
            $table->date('expiry_on')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('cards');
    }
}
