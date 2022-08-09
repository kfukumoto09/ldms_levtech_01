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
        Schema::create('experiment_category_lab_note', function (Blueprint $table) {
            $table->integer('experiment_category_id');
            $table->integer('lab_note_id');
            // $table->foreignId('experiment_category_id')->constrained('experiment_categories');
            // $table->foreignId('lab_note_id')->constrained('lab_notes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiment_category_lab_note');
    }
};
