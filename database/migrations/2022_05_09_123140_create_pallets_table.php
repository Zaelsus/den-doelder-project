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
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->boolean('valid')->default(1);
            $table->string('name');
            $table->integer('pallet_number')->unsigned();
            $table->string('measurement');
            $table->string('classification');
            $table->string('treatments');
            $table->text('specifications')->nullable();
            $table->text('extra_instructions')->nullable();
            $table->binary('general_images');
            $table->binary('detailed_images');
            $table->text('details_components_bovendek')->default('Stijl, Type, Nummer: 7, Dikte: 22, Breedte: 95, Lengte: 1200');
            $table->text('details_components_onderdek')->default('Stijl, Type, Nummer: 7, Dikte: 22, Breedte: 95, Lengte: 1200');
            $table->text('details_components_boventussendek')->default('Stijl, Type, Nummer: 7, Dikte: 22, Breedte: 95, Lengte: 1200');
            $table->text('details_components_klossen')->default('Stijl, Type, Nummer: 7, Dikte: 22, Breedte: 95, Lengte: 1200');
            $table->text('details_materialen')->default('nagels, lengte, draad, ...');
            $table->text('details_nieuw_hout')->default('merk, ...');
            $table->text('details_specifieke_bladnotities')->default('Rechterblok: .., Middenblok: .., Linkerblok: ..');

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
