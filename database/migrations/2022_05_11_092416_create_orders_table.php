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
            $table->unsignedBigInteger('machine_id');
            $table->foreign('machine_id')
                ->references('id')
                ->on('machines')
                ->onDelete('restrict');
            $table->unsignedInteger('quantity_production');
            $table->unsignedInteger('quantity_produced')->default(0);
            $table->unsignedInteger('add_quantity')->default(0);
            $table->date('start_date')->nullable();
            $table->string('site_location');
            $table->text('production_instructions')->nullable();
            $table->boolean('type_order');
            $table->string('client_name')->nullable();
            $table->string('status');
            $table->string('truckDriver_status')->nullable();
            $table->dateTime('start_time')->default(null)->nullable();
            $table->date('end_time')->default(null)->nullable();
            // Temporary until sections for admin nav
            $table->boolean('selected')->default(0);
            $table->boolean('active_driver')->default(0);
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
