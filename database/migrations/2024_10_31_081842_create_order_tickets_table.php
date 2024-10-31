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
        Schema::create('order_tickets', function (Blueprint $table) {
            $table->increments('id'); // auto-incrementing primary key
            $table->unsignedInteger('order_id'); // Foreign key for orders
            $table->unsignedInteger('ticket_type_id'); // Foreign key for ticket types
            $table->unsignedInteger('price'); // Ticket price at the time of order
            $table->unsignedInteger('quantity'); // Quantity of this ticket type in the order
            $table->string('barcode')->unique(); // Barkod alanı
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('ticket_type_id')->references('id')->on('ticket_types')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_tickets');
    }
};
