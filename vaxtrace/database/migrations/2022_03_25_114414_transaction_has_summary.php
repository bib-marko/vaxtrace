<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TransactionHasSummary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_has_summary', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_has_sub_category_id');
            $table->foreign('category_has_sub_category_id')->references('id')->on('category_has_sub_category')->onDelete('cascade');
            $table->unsignedBigInteger('vaccinees_transaction_id');
            $table->foreign('vaccinees_transaction_id')->references('id')->on('vaccinees_has_transactions')->onDelete('cascade');
            $table->string('trans_details');
            $table->string('trans_status');
            $table->string('assist_by');
            $table->integer('status');
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
        //
    }
}
