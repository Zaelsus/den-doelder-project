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
            $table->unsignedBigInteger('order_id');
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
            $table->boolean('soortTick')->default(0);
            $table->string('soortAang')->nullable();
            $table->string('soortHtKd')->nullable();

            $table->boolean('balkTick')->default(0);
            $table->string('balkAang')->nullable();
            $table->string('balkHtKd')->nullable();

            $table->boolean('afmeting1Tick')->default(0);
            $table->string('afmeting1Aang')->nullable();
            $table->string('afmeting1HtKd')->nullable();

            $table->boolean('afmeting2Tick')->default(0);
            $table->string('afmeting2Aang')->nullable();
            $table->string('afmeting2HtKd')->nullable();

//            Onderdek
            $table->boolean('brugTick')->default(0);
            $table->string('brugAang')->nullable();
            $table->string('brugHtKd')->nullable();

            $table->boolean('rond2xTick')->default(0);
            $table->string('rond2xAang')->nullable();
            $table->string('rond2xHtKd')->nullable();

            $table->boolean('rond3xTick')->default(0);
            $table->string('rond3xAang')->nullable();
            $table->string('rond3xHtKd')->nullable();

            $table->boolean('kruisTick')->default(0);
            $table->string('kruisAang')->nullable();
            $table->string('kruisHtKd')->nullable();

            $table->boolean('elementenTick')->default(0);
            $table->string('elementenAang')->nullable();
            $table->string('elementenHtKd')->nullable();

            $table->boolean('dubbelTick')->default(0);
            $table->string('dubbelAang')->nullable();
            $table->string('dubbelHtKd')->nullable();

//            Overig
            $table->boolean('hoekenTick')->default(0);
            $table->string('hoekenAang')->nullable();
            $table->string('hoekenHtKd')->nullable();

            $table->boolean('stempelsTick')->default(0);
            $table->string('stempelsAang')->nullable();
            $table->string('stempelsHtKd')->nullable();

            $table->boolean('stapelTick')->default(0);
            $table->string('stapelAang')->nullable();
            $table->string('stapelHtKd')->nullable();

            $table->boolean('strappenTick')->default(0);
            $table->string('strappenAang')->nullable();
            $table->string('strappenHtKd')->nullable();

            $table->boolean('kamerTick')->default(0);
            $table->string('kamerAang')->nullable();
            $table->string('kamerHtKd')->nullable();

            $table->boolean('specialeTick')->default(0);
            $table->string('specialeAang')->nullable();
            $table->string('specialeHtKd')->nullable();

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
