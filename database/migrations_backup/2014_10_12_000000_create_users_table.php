<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('profile_pic')->nullable();
            $table->string('name');
            $table->string('phone',20)->index();
            $table->string('email');
            $table->boolean('gender')->nullable();
            $table->string('referred_by')->nullable();
            $table->date('dob');
            // $table->integer('basic_card_limit')->default(0);
            // $table->integer('premium_card_limit')->default(0);
            $table->boolean('status')->default(0);
            $table->string('password')->nullable();
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
        Schema::dropIfExists('users');
    }
}
