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
            $table->unsignedBigInteger('order_id')->nullable();
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

            $table->boolean('overstekTickB')->default(0)->nullable();
            $table->string('overstekAangB')->nullable();
            $table->string('overstekCorrectB')->nullable();

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
            $table->string('hoekenCorrect')->nullable();

            $table->boolean('stempelsTick')->default(0);
            $table->string('stempelsAang')->nullable();
            $table->string('stempelsCorrect')->nullable();

            $table->boolean('stapelTick')->default(0);
            $table->string('stapelAang')->nullable();
            $table->string('stapelCorrect')->nullable();

            $table->string('strappenTick')->nullable();
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
