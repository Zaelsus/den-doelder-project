<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePalletMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pallet_materials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pallet_id');
            $table->foreign('pallet_id')
                ->references('product_id')
                ->on('pallets')
                ->onDelete('cascade');
            $table->unsignedBigInteger('material_id');
            $table->foreign('material_id')
                ->references('product_id')
                ->on('materials')
                ->onDelete('cascade');
            $table->unsignedInteger(('total_quantity'));
            $table->string('test')->nullable();
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
        Schema::dropIfExists('pallet_materials');
    }
}
