<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');
//Bovendek
            $table->boolean('afmetingTickB')->default(0);
            $table->string('afmetingAangB')->nullable();
            $table->string('afmetingCorrectB')->nullable();

            $table->boolean('aantalTick')->default(0);
            $table->string('aantalAang')->nullable();
            $table->string('aantalCorrect')->nullable();

            $table->boolean('spatiesTick')->default(0);
            $table->string('spatiesAang')->nullable();
            $table->string('spatiesCorrect')->nullable();

            $table->boolean('klampenTick')->default(0);
            $table->string('klampenAang')->nullable();
            $table->string('klampenCorrect')->nullable();

            $table->boolean('overstekTickB')->default(0);
            $table->string('overstekAangB')->nullable();
            $table->string('overstekCorrectB')->nullable();

//            Klossen
            $table->boolean('soortTick')->default(0);
            $table->string('soortAang')->nullable();
            $table->string('soortCorrect')->nullable();

            $table->boolean('balkTick')->default(0);
            $table->string('balkAang')->nullable();
            $table->string('balkCorrect')->nullable();

            $table->boolean('afmeting1Tick')->default(0);
            $table->string('afmeting1Aang')->nullable();
            $table->string('afmeting1Correct')->nullable();

            $table->boolean('afmeting2Tick')->default(0);
            $table->string('afmeting2Aang')->nullable();
            $table->string('afmeting2Correct')->nullable();

//            Onderdek
            $table->boolean('brugTick')->default(0);
            $table->string('brugAang')->nullable();
            $table->string('brugCorrect')->nullable();

            $table->boolean('rondTick')->default(0);
            $table->string('rondAang')->nullable();
            $table->string('rondCorrect')->nullable();

            $table->boolean('kruisTick')->default(0);
            $table->string('kruisAang')->nullable();
            $table->string('kruisCorrect')->nullable();

            $table->boolean('afmetingTickO')->default(0);
            $table->string('afmetingAangO')->nullable();
            $table->string('afmetingCorrectO')->nullable();

            $table->boolean('overstekTickO')->default(0);
            $table->string('overstekAangO')->nullable();
            $table->string('overstekCorrectO')->nullable();

//            Overig
            $table->boolean('hoekenTick')->default(0);
            $table->string('hoekenAang')->nullable();
            $table->string('hoekenCorrect')->nullable();

            $table->boolean('stempelsTick')->default(0);
            $table->string('stempelsAang')->nullable();
            $table->string('stempelsCorrect')->nullable();

            $table->boolean('stapelTick')->default(0);
            $table->string('stapelAang')->nullable();
            $table->string('stapelCorrect')->nullable();

            $table->boolean('strappenTick')->default(0);
            $table->string('strappenAang')->nullable();
            $table->string('strappenCorrect')->nullable();

            $table->boolean('spijkerTick')->default(0);
            $table->string('spijkerAang')->nullable();
            $table->string('spijkerCorrect')->nullable();

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
        Schema::dropIfExists('productions');
    }
}
