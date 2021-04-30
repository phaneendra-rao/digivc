<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->enum('trans_type',[1,2,3,4,5,6,7,8,9])->default(1);
            $table->string('coupon')->nullable();
            $table->unsignedDecimal('credits',8,2);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE'); // cascade
        });
    }

// Trans Types
// 1 - Signup amount
// 2 - Referral amount
// 3 - Top-up Wallet
// 4 - Card Purchased
// 5 - SMS Purchased
// 6 - Renewed Card
// 7 - coupon applied
// 8 - First New card cashback
// 9 - Card Upgrade

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallets');
    }
}
