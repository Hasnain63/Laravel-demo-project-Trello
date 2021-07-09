<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketLable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_ticket_card_create_ticket_lable', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('create_ticket_card_id');
            $table->unsignedBigInteger('create_ticket_lable_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('create_ticket_card_create_ticket_lable');
    }
}