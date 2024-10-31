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
        Schema::create('ticket_types', function (Blueprint $table) {
            $table->increments('id'); // auto-incrementing primary key
            $table->string('name'); // ticket type name (e.g., Adult, Kid, Discounted, Group)
            $table->text('description')->nullable(); // description for the ticket type
            $table->timestamps(); // created_at and updated_at
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_types');
    }
};
