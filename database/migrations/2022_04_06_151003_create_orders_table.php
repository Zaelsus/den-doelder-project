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
            $table->integer('order_id')->unsigned;
            $table->string('customer_name');
            $table->integer('order_production_line')->unsigned;
            $table->date('scheduled_production_date');
            $table->string('status')->default('pending');
            $table->string('pallet_type');
            $table->unsignedInteger('quantity');
            $table->string('location')->default('Axel');
            $table->text('instructions')->nullable;
            //this column will be replaced by relationship with materials table
            $table->string('material')->default('HT/KD 1000x100x22 BC (1000x100x22)');
            $table->unsignedInteger('material_quantity');
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
