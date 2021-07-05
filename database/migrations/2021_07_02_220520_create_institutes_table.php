<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutes', function (Blueprint $table) {
            $table->id();
            $table->string('institute_name')->nullable();
            $table->string('institute_study_from')->nullable();
            $table->string('institute_study_to')->nullable();
            $table->string('institute_desc')->nullable();
            $table->string('institute_graduated')->default('0');
            $table->string('institute_privacy')->default('public');
            $table->string('institute_city')->nullable();
            $table->string('institute_state')->nullable();
            $table->string('institute_country')->nullable();
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
        Schema::dropIfExists('institutes');
    }
}
