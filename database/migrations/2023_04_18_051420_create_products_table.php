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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name','150');
            $table->string('slug','150');
            $table->string('code','100')->nullable();
            $table->string('brand','100')->nullable();
            $table->enum('form',['liquid','powder','other'])->default('liquid');
            $table->string('type','100')->nullable();
            // $table->string('packaging_size','100');
            $table->longText('dosage','200')->nullable();
            $table->longText('description');
            $table->longText('advantages')->nullable();
            $table->longText('uses')->nullable();
            $table->longText('other_details')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->tinyInteger('is_active')->default(1);
            $table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();

            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
