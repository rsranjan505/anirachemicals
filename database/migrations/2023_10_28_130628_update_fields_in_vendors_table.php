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
        Schema::table('vendors', function (Blueprint $table) {
            $table->dropColumn('state')->change();
            $table->dropColumn('city')->change();
        });

        Schema::table('vendors', function (Blueprint $table) {
            $table->unsignedBigInteger('state_id')->after('address')->nullable();
            $table->unsignedBigInteger('city_id')->after('state_id')->nullable();

            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->dropForeign('state_id');
            $table->dropForeign('city_id');
            $table->renameColumn('state_id','state')->change();
            $table->renameColumn('city_id','city')->change();
        });
    }
};
