<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('orders', function (Blueprint $table) {
//                 $table->increments('id'); // INT(10) unsigned, AUTO_INCREMENT
//                 $table->unsignedInteger('event_id'); // INT(11) unsigned
//                 $table->dateTime('event_date'); // VARCHAR(10)
//                 $table->unsignedInteger('ticket_adult_price'); // INT(11) unsigned
//                 $table->unsignedInteger('ticket_adult_quantity'); // INT(11) unsigned
//                 $table->unsignedInteger('ticket_kid_price'); // INT(11) unsigned
//                 $table->unsignedInteger('ticket_kid_quantity'); // INT(11) unsigned
//                 $table->string('barcode', 120)->unique(); // VARCHAR(120)
//                 $table->unsignedInteger('equal_price'); // INT(11) unsigned
//                 $table->dateTime('created')->default(DB::raw('CURRENT_TIMESTAMP')); // DATETIME
//
//                 $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
//        });
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id'); // auto-incrementing primary key
            $table->unsignedInteger('event_id'); // Foreign key for events
            $table->dateTime('created')->default(DB::raw('CURRENT_TIMESTAMP')); // Creation date

            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
