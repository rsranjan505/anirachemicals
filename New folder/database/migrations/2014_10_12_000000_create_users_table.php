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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->unsignedBigInteger('role_id')->nullable();
            $table->enum('user_type',['admin','employee','vendor'])->default('employee');
            $table->integer('department_id')->nullable();
            $table->integer('designation_id')->nullable();
            $table->string('address')->nullable();
			$table->unsignedBigInteger('state_id')->nullable();
			$table->unsignedBigInteger('city_id')->nullable();
            $table->string('pincode',20)->nullable();
            $table->boolean('is_active')->default(1);
            $table->tinyInteger('is_admin')->default(0);
            $table->dateTime('last_login')->nullable();

			// $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
			// $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            // $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            // $table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade');
            // $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
