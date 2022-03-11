<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccineeHasTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccinee_has_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vaccinees_id');
            $table->foreign('vaccinees_id')->references('id')->on('vaccinees')->onDelete('cascade');
            $table->unsignedBigInteger('category_has_sub_category_id');
            $table->foreign('category_has_sub_category_id')->references('id')->on('category_has_sub_category')->onDelete('cascade');
            $table->string('trans_details');
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
        Schema::dropIfExists('vaccinee_has_transactions');
    }
}
