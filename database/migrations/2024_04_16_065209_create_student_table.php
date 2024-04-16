<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('nick_name');
            $table->string('registration_number')->nullable();
            $table->string('gender');
            $table->string('place_of_birth');
            $table->date('date_of_birth')->nullable();
            $table->text('address');
            $table->string('email')->nullable();
            $table->string('status')->nullable();
            $table->integer('child')->nullable();
            $table->integer('number_of_children')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_phone_number')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_phone_number')->nullable();
            $table->text('family_address')->nullable();
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_contact_occupation')->nullable();
            $table->string('emergency_contact_phone_number')->nullable();
            $table->text('emergency_contact_address')->nullable();
            $table->date('registration_date')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('class_id')->nullable();
            $table->string('login_id')->nullable();
            $table->boolean('enabled')->default(true);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
