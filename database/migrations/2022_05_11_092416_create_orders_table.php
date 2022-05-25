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
            $table->string('machine');
            $table->unsignedInteger('quantity_production');
            $table->unsignedInteger('quantity_produced')->default(0);
            $table->unsignedInteger('add_quantity')->default(0);
            $table->date('start_date')->nullable();
            $table->string('site_location');
            $table->text('production_instructions')->nullable();
            $table->string('client_name');
            $table->string('client_address');
            $table->string('status');
            $table->dateTime('start_time')->default(null)->nullable();
            $table->date('end_time')->default(null)->nullable();
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
