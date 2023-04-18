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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('customer_name','100');
            $table->string('email','100');
            $table->string('mobile','100');
            $table->string('address','200');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('city_id');
            $table->string('pincode');
            $table->tinyInteger('is_freight')->default(0);
            $table->decimal('bill_amount',8,2)->nullable();
            $table->unsignedBigInteger('created_by');
            $table->tinyInteger('is_delivered')->default(0);
            $table->date('delivered_date')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
