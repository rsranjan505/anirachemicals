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
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('packing_type');
            $table->dropColumn('type');
            $table->dropColumn('advantages');
            $table->dropColumn('quantity');
            $table->dropColumn('unit');
            $table->dropColumn('mrp');
            $table->dropColumn('packaging_size');
            $table->dropColumn('description');
            $table->dropColumn('form');

        });
        Schema::table('products', function (Blueprint $table) {

            $table->string('description')->nullable()->after('usages');
            $table->enum('form',['liquid','powder','other'])->default('liquid')->after('brand');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
