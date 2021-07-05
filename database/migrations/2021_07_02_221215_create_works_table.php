<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('work_name')->nullable();
            $table->string('work_position')->nullable();
            $table->string('work_from')->nullable();
            $table->string('work_to')->nullable();
            $table->string('work_desc')->nullable();
            $table->string('work_status')->default('0');
            $table->string('work_privacy')->default('public');
            $table->string('work_city')->nullable();
            $table->string('work_state')->nullable();
            $table->string('work_country')->nullable();
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
        Schema::dropIfExists('works');
    }
}
