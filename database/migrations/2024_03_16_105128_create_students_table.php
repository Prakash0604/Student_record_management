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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('stu_name');
            $table->string('stu_email');
            $table->string('stud_address');
            $table->string('stu_contact');
            $table->enum('gender',['Male','Female','Others']);
            $table->string('stu_dob');
            $table->string('stu_profile')->nullable();
            $table->unsignedBigInteger('stu_class')->nullable();
            $table->foreign('stu_class')->references('id')->on('classrooms')->onUpdate('cascade')->onDelete('cascade');
            $table->text('stu_desc')->nullable();
            $table->enum('status',['Active','Inactive'])->default('Active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
