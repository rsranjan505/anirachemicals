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
            $table->string('name','100');
            $table->string('code','100');
            $table->string('brand','100');
            $table->string('form','100');
            $table->string('type','100');
            $table->string('packaging_size','100');
            $table->string('dosage','200')->nullable();
            $table->longText('description');
            $table->longText('advantages')->nullable();
            $table->longText('other_details')->nullable();
            $table->string('manufactured_by','100')->nullable();
            $table->date('manufactured_date')->nullable();
            $table->decimal('quantity',6,2)->nullable();//always show in gram/ml
            $table->decimal('mrp',8,2)->nullable();
            $table->unsignedBigInteger('created_by');
            $table->tinyInteger('is_active')->default(1);
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
        Schema::dropIfExists('products');
    }
};
