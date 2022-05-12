<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->string('order_number');
            $table->unsignedBigInteger('pallet_id');
            $table->foreign('pallet_id')
                ->references('product_id')
                ->on('pallets')
                ->onDelete('restrict');
            $table->string('machine')->default('undefined');
            $table->unsignedInteger('quantity_production');
            $table->date('start_date')->nullable();
            $table->string('site_location')->default('Axel');
            $table->text('production_instructions')->nullable();
            $table->string('client_name');
            $table->string('client_address');
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('orders');
    }
}
