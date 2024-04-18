<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Spatie\Class\ClassRegistrar;

class CreateClassGroupTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('class_group', function (Blueprint $table) {
            $table->increments('id'); // class id
            $table->string('class_name');       // For MySQL 8.0 use string('name', 125);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('semester')->nullable();
            $table->string('year_of_study')->nullable();
            $table->unsignedInteger('teacher_id');
            $table->foreign('teacher_id')
                ->references('id') // class id
                ->on('teacher');
            $table->timestamps();
        });

        Schema::create('subject', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject_name');
            $table->timestamps();
        });

        Schema::create('class_has_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('class_group_id');
            $table->foreign('class_group_id')
                ->references('id') // class id
                ->on('class_group')
                ->onDelete('cascade');
            
            $table->unsignedInteger('subject_id');
            $table->foreign('subject_id')
                ->references('id') // subject id
                ->on('subject')
                ->onDelete('cascade');
            
            $table->string('day')->nullable();;
        });

        Schema::create('student_has_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->foreign('student_id')
                ->references('id') // subject id
                ->on('student')
                ->onDelete('cascade');

            $table->unsignedInteger('class_group_id');
            $table->foreign('class_group_id')
                ->references('id') // class id
                ->on('class_group')
                ->onDelete('cascade');
        });

        Schema::create('raport', function (Blueprint $table) {
            $table->increments('id'); // raport id
            $table->unsignedInteger('student_id');
            $table->foreign('student_id')
                ->references('id') // subject id
                ->on('student')
                ->onDelete('cascade');

            $table->unsignedInteger('class_group_id');
            $table->foreign('class_group_id')
                ->references('id') // class id
                ->on('class_group')
                ->onDelete('cascade');

            $table->string('given_in')->nullable();       // For MySQL 8.0 use string('name', 125);
            $table->date('signed_at')->nullable();
            $table->boolean('published')->default(false);
            $table->text('moral_religious')->nullable();
            $table->text('social_emotion')->nullable();
            $table->text('speaking')->nullable(); 
            $table->text('cognitive')->nullable();
            $table->text('physical')->nullable();
            $table->text('art')->nullable();
            $table->integer('sick')->default(0);
            $table->integer('permission')->default(0);
            $table->integer('absence')->default(0);
            $table->text('note')->nullable(); // For MySQL 8.0 use string('guard_name', 125);
            $table->timestamps();
        });

        Schema::create('raport_has_marks', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('raport_id');
            $table->foreign('raport_id')
                ->references('id') // subject id
                ->on('raport')
                ->onDelete('cascade');

            $table->unsignedInteger('subject_id');
            $table->foreign('subject_id')
                ->references('id') // class id
                ->on('subject')
                ->onDelete('cascade');
            
            $table->string('mark');
            $table->text('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject');
        Schema::dropIfExists('class_group');
        Schema::dropIfExists('class_has_subjects');
        Schema::dropIfExists('student_has_classes');
        Schema::dropIfExists('raport');
        Schema::dropIfExists('raport_has_marks');
    }
}
