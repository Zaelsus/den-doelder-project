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
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');
//            Bovendek
            $table->boolean('afmetingTickB');
            $table->string('afmetingAangB')->nullable();
            $table->string('afmetingHtKdB')->nullable();

            $table->boolean('aantalTick');
            $table->string('aantalAang')->nullable();
            $table->string('aantalHtKd')->nullable();

            $table->boolean('klampenTick');
            $table->string('klampenAang')->nullable();
            $table->string('klampenHtKd')->nullable();
//change
            $table->boolean('schimmelTick');
            $table->string('schimmelAang')->nullable();
            $table->string('schimmelHtKd')->nullable();

            $table->boolean('waanTick');
            $table->string('waanAang')->nullable();
            $table->string('waanHtKd')->nullable();

//            Klossen
            $table->boolean('soortTick');
            $table->string('soortAang')->nullable();
            $table->string('soortHtKd')->nullable();

            $table->boolean('balkTick');
            $table->string('balkAang')->nullable();
            $table->string('balkHtKd')->nullable();

            $table->boolean('afmeting1Tick');
            $table->string('afmeting1Aang')->nullable();
            $table->string('afmeting1HtKd')->nullable();

            $table->boolean('afmeting2Tick');
            $table->string('afmeting2Aang')->nullable();
            $table->string('afmeting2HtKd')->nullable();

//            Onderdek
            $table->boolean('brugTick');
            $table->string('brugAang')->nullable();
            $table->string('brugHtKd')->nullable();

            $table->boolean('rond2xTick');
            $table->string('rond2xAang')->nullable();
            $table->string('rond2xHtKd')->nullable();

            $table->boolean('rond3xTick');
            $table->string('rond3xAang')->nullable();
            $table->string('rond3xHtKd')->nullable();

            $table->boolean('kruisTick');
            $table->string('kruisAang')->nullable();
            $table->string('kruisHtKd')->nullable();

            $table->boolean('elementenTick');
            $table->string('elementenAang')->nullable();
            $table->string('elementenHtKd')->nullable();

            $table->boolean('dubbelTick');
            $table->string('dubbelAang')->nullable();
            $table->string('dubbelHtKd')->nullable();

//            Overig
            $table->boolean('hoekenTick');
            $table->string('hoekenAang')->nullable();
            $table->string('hoekenHtKd')->nullable();

            $table->boolean('stempelsTick');
            $table->string('stempelsAang')->nullable();
            $table->string('stempelsHtKd')->nullable();

            $table->boolean('stapelTick');
            $table->string('stapelAang')->nullable();
            $table->string('stapelHtKd')->nullable();

            $table->boolean('strappenTick');
            $table->string('strappenAang')->nullable();
            $table->string('strappenHtKd')->nullable();

            $table->boolean('kamerTick');
            $table->string('kamerAang')->nullable();
            $table->string('kamerHtKd')->nullable();

            $table->boolean('specialeTick');
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
