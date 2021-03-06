<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homerooms', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->integer('grade_number');
            $table->string('code', 5)->unique();
            $table->string('name');
            $table->string('nickname')->nullable();
            $table->timestamps();

            $table->unique(['number', 'grade_number']);
        });

        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('initials', 4);
            $table->string('code')->unique();
            $table->foreignId('homeroom_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['initials', 'homeroom_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
