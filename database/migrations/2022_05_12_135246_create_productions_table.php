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
//            Bovendek
            $table->boolean('afmetingTickB');
            $table->string('afmetingAangB')->nullable();
            $table->string('afmetingCorrectB')->nullable();

            $table->boolean('aantalTick');
            $table->string('aantalAang')->nullable();
            $table->string('aantalCorrect')->nullable();

            $table->boolean('spatiesTick');
            $table->string('spatiesAang')->nullable();
            $table->string('spatiesCorrect')->nullable();

            $table->boolean('klampenTick');
            $table->string('klampenAang')->nullable();
            $table->string('klampenCorrect')->nullable();

            $table->boolean('overstekTickB');
            $table->string('overstekAangB')->nullable();
            $table->string('overstekCorrectB')->nullable();

//            Klossen
            $table->boolean('soortTick');
            $table->string('soortAang')->nullable();
            $table->string('soortCorrect')->nullable();

            $table->boolean('balkTick');
            $table->string('balkAang')->nullable();
            $table->string('balkCorrect')->nullable();

            $table->boolean('afmeting1Tick');
            $table->string('afmeting1Aang')->nullable();
            $table->string('afmeting1Correct')->nullable();

            $table->boolean('afmeting2Tick');
            $table->string('afmeting2Aang')->nullable();
            $table->string('afmeting2Correct')->nullable();

//            Onderdek
            $table->boolean('brugTick');
            $table->string('brugAang')->nullable();
            $table->string('brugCorrect')->nullable();

            $table->boolean('rondTick');
            $table->string('rondAang')->nullable();
            $table->string('rondCorrect')->nullable();

            $table->boolean('kruisTick');
            $table->string('kruisAang')->nullable();
            $table->string('kruisCorrect')->nullable();

            $table->boolean('afmetingTickO');
            $table->string('afmetingAangO')->nullable();
            $table->string('afmetingCorrectO')->nullable();

            $table->boolean('overstekTickO');
            $table->string('overstekAangO')->nullable();
            $table->string('overstekCorrectO')->nullable();

//            Overig
            $table->boolean('hoekenTick');
            $table->string('hoekenAang')->nullable();
            $table->string('hoekenCorrect')->nullable();

            $table->boolean('stempelsTick');
            $table->string('stempelsAang')->nullable();
            $table->string('stempelsCorrect')->nullable();

            $table->boolean('stapelTick');
            $table->string('stapelAang')->nullable();
            $table->string('stapelCorrect')->nullable();

            $table->boolean('strappenTick');
            $table->string('strappenAang')->nullable();
            $table->string('strappenCorrect')->nullable();

            $table->boolean('spijkerTick');
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
