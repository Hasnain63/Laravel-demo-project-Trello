<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreateTicketCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('create_ticket_cards', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description')->default('null');
            $table->time('due_date');
            $table->string('file')->default('null');
            $table->integer('workspaceProjects_id');
            $table->integer('ticketTransection_id');
            $table->integer('chuckList_id');
            $table->integer('user_id');
            $table->integer('workspace_id');
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
        Schema::dropIfExists('create_ticket_cards');
    }
}