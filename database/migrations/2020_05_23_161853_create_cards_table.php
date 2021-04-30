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
            $table->string('slug',180)->index()->nullable();
            $table->string('custom_slug',180)->index()->nullable();
            $table->unsignedBigInteger('user_id')->index();
            $table->enum('card_type',['basic','premium'])->default('basic')->index();
            $table->enum('logo_shape',['round','square'])->default('round')->index();
            $table->enum('sms',['enable','disable'])->default('enable')->index();
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
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE'); // cascade
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
