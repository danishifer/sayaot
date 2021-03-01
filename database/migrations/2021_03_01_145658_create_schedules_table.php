<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->json('external_data')->nullable();
        });

        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('homeroom_id')->constrained()->onDelete('cascade');
            $table->date('start');
            $table->date('end')->nullable();
            $table->timestamps();
        });

        Schema::create('schedule_days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id')->constrained()->onDelete('cascade');
            $table->integer('weekday');
        });

        Schema::create('schedule_hours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_id')->constrained()->onDelete('cascade');
            $table->integer('number');
            $table->time('start');
            $table->time('end');
        });

        Schema::create('schedule_lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_day_id')->constrained()->onDelete('cascade');
            $table->foreignId('schedule_hour_id')->constrained()->onDelete('cascade');
            $table->foreignId('lesson_group_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
