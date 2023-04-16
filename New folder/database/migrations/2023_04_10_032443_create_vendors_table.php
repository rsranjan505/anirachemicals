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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_establishment');
            $table->integer('establishment_type')->nullable();//1:indivisual,2:llp,3:opc,4:propietorship,5:partnership,6:pvt. ltd., 7:ltd, 8:other
            $table->longText('partner_details')->nullable();
            $table->string('pan')->unique();
            $table->string('gst');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('pincode');
            $table->string('email');
            $table->string('mobile');
            $table->string('key_person');
            $table->string('dob')->nullable();
            $table->string('marriage_aniversory')->nullable();
            $table->longText('previous_product_details')->nullable();
            $table->string('suggestions')->nullable();

            $table->boolean('is_ative')->default(1);
            $table->unsignedBigInteger('created_by');
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
        Schema::dropIfExists('vendors');
    }
};
