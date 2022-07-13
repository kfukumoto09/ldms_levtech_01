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
        Schema::create('lab_notes', function (Blueprint $table) {
            $table->id();
            $table->integer('subject_id');
            $table->string('preparation')->nullable;
            $table->string('method');
            $table->date('performed_at');
            $table->timestampsTz();
            $table->softDeletesTz($column = 'deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lab_notes');
    }
};
