<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextbookUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('textbook_units', function (Blueprint $table) {
            $table->id();
            $table->integer('textbook_id');
            $table->string('title');
            $table->json('elements')->default('{ id: 1 }');
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
        Schema::dropIfExists('textbook_units');
    }
}
