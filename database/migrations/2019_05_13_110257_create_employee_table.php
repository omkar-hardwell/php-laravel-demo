<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->tinyInteger('employee_id')->unsigned()->autoIncrement();
            // $table->primary('employee_id');
            $table->tinyInteger('department_id')->unsigned();
            $table->string('name');
            $table->date('date_of_joining');
            $table->enum('gender', array('male', 'female'));
            $table->text('address');
            $table->float('salary');
            $table->foreign('department_id')
                ->references('department_id')->on('departments')
                ->onDelete('cascade');
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
        Schema::dropIfExists('employee');
    }
}
