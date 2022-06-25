<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('initials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');
//            Bovendek
            $table->boolean('afmetingTickB')->default(0);
            $table->string('afmetingAangB')->nullable();
            $table->string('afmetingHtKdB')->nullable();

            $table->boolean('aantalTick')->default(0);
            $table->string('aantalAang')->nullable();
            $table->string('aantalHtKd')->nullable();

            $table->boolean('klampenTick')->default(0);
            $table->string('klampenAang')->nullable();
            $table->string('klampenHtKd')->nullable();
//change
            $table->boolean('schimmelTick')->default(0);
            $table->string('schimmelAang')->nullable();
            $table->string('schimmelHtKd')->nullable();

            $table->boolean('waanTick')->default(0);
            $table->string('waanAang')->nullable();
            $table->string('waanHtKd')->nullable();

//            Klossen
            $table->string('soort')->nullable();
            $table->string('soortAang')->nullable();
            $table->string('soortHtKd')->nullable();

            $table->string('balk')->nullable();
            $table->string('balkAang')->nullable();
            $table->string('balkHtKd')->nullable();


//            Onderdek
            $table->string('onderdek');
            $table->string('onderdekAang')->nullable();
            $table->string('onderdekHtKd')->nullable();


//            Overig
            $table->boolean('hoekenTick')->default(0);
            $table->string('hoekenAang')->nullable();

            $table->boolean('stempelsTick')->default(0);
            $table->string('stempelsAang')->nullable();

            $table->boolean('stapelTick')->default(0);
            $table->string('stapelAang')->nullable();

            $table->string('strappenTick')->nullable();
            $table->string('strappenAang')->nullable();

            $table->string('kamerTick');
            $table->string('kamerAang')->nullable();;

            $table->text('additionalNotes')->nullable();
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
        Schema::dropIfExists('initials');
    }
}
