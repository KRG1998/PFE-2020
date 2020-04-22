<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ad_id')->unsigned();
            $table->bigInteger('client_id')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->string('duration');
            $table->string('amount');
            $table->text('cover_letter');
            $table->string('state')->default('pending');
            $table->foreign('client_id')->references('id')->on('users')->where('role','jobber');
            $table->foreign('ad_id')->references('id')->on('ads')->onDelete('cascade');
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
        Schema::dropIfExists('offers');
    }
}
