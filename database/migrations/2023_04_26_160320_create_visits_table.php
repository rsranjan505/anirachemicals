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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_establishment',100);
            $table->integer('establishment_type')->nullable();//1:individual,2:llp,3:opc,4:propietorship,5:partnership,6:pvt. ltd., 7:ltd, 8:other
            $table->string('key_person');
            $table->string('email');
            $table->string('mobile');
            $table->string('address');
            $table->unsignedBigInteger('State_id');
            $table->unsignedBigInteger('city_id');
            $table->string('pincode');
            $table->enum('status',[1,2,3,4]); //comment('1: Open - Not Contacted, 2: Working - Contacted, 3: Closed - Converted, 4: Closed - Not Converted')
            $table->enum('source',['Website', 'Phone Inquiry', 'Partner Referal','Other'])->nullable();
            $table->unsignedBigInteger('product_interest')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('description')->nullable();
            $table->unsignedBigInteger('created_by');
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
        Schema::dropIfExists('visits');
    }
};
