<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstaMojoTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insta_mojo_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wallet_id');
            $table->string('payment_request_id')->index();
            $table->enum('payment_status',[1,2,3])->index();
            $table->string('payment_id')->index();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('wallet_id')->references('id')->on('wallets')->onUpdate('CASCADE')->onDelete('CASCADE'); // cascade
        });
    }

    // payment status
    // 1 - success
    // 2 - failed
    // 3 - unknown

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insta_mojo_transactions');
    }
}
