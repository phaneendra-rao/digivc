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
            $table->string('full_name');
            $table->string('email')->nullable();
            $table->string('phone_no',20)->index()->unique();
            $table->char('gender',1)->default('m');
            $table->date('dob');
            $table->string('dail_code',6)->index();
            $table->string('country_code',20)->index();
            $table->string('country_name',50);
            $table->string('time_zone',20);
            $table->boolean('account_status')->default(0)->index();
            $table->enum('account_type',['master','channel_partner','customer'])->default('customer')->index();
            $table->string('referral_code')->nullable()->index();
            $table->string('referred_by')->nullable()->index();
            $table->unsignedBigInteger('sms_credits')->default(0);
            $table->string('password');
            $table->string('verification_code')->nullable();
            $table->dateTime('verification_code_date_time')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
