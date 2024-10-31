<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('events', function (Blueprint $table) {
//            $table->increments('id'); // auto-incrementing primary key
//            $table->string('name'); // event name
//            $table->text('description'); // event description
//            $table->dateTime('schedule'); // event date and time
//            $table->integer('price_adult'); // adult ticket price
//            $table->integer('price_kid'); // child ticket price
//            $table->timestamps(); // created_at and updated_at
//        });
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id'); // auto-incrementing primary key
            $table->string('name'); // Event name
            $table->text('description'); // Event description
            $table->dateTime('schedule'); // Event date and time
            $table->timestamps(); // Created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
