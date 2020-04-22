<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('client_id')->unsigned();
            $table->string('title');
            $table->string('category');
            $table->string('subcategory');
            $table->text('description');
            $table->integer('jobbers_number');
            $table->string('photos');
            $table->string('date');
            $table->string('hour');
            $table->string('address');
            $table->string('phone');
            $table->integer('duration');
            $table->integer('hour_wage');
            $table->integer('amount');
            $table->string('state')->default('published');
            $table->foreign('client_id')->references('id')->on('users')->where('role','client');
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
        Schema::dropIfExists('ads');
    }
}
