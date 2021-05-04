<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->text('file')->nullable();
            // $table->string('name',250);
            $table->string('employee_id');
            $table->integer('department_id');
            $table->integer('designation_id');
            // $table->string('email')->unique();
            $table->string('gender');
            $table->string('contact');
            $table->string('address');
            $table->string('total_casual_leave')->default(10);
            $table->string('total_annual_leave')->default(14);
            $table->string('total_sick_leave')->default(12);
            $table->decimal('salary');
            // $table->string('password');
            $table->string('status')->default('Active');
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
        Schema::dropIfExists('employees');
    }
}
