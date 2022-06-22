<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pallets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->boolean('valid')->default(1);
            $table->string('name');
            $table->string('measurements');
            $table->string('classification');
            $table->string('treatments');
            $table->text('specifications')->nullable();
            $table->text('extra_instructions')->nullable();
            $table->binary('general_images');
            $table->binary('detailed_images');
            $table->text('details_components_bovendek');
            $table->text('details_components_onderdek');
            $table->text('details_components_boventussendek');
            $table->text('details_components_klossen');
            $table->text('details_materialen');
            $table->text('details_nieuw_hout');
            $table->text('details_specifieke_bladnotities');

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
        Schema::dropIfExists('pallets');
    }
}
