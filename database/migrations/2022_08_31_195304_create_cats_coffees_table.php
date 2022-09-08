<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_coffee', function (Blueprint $table) {
            $table->bigInteger('cat_id')->unsigned()->index();
            $table->foreign('cat_id')->references('id')->on('cats')->onUpdate('cascade');
            $table->bigInteger('coffee_id')->unsigned()->index();
            $table->foreign('coffee_id')->references('id')->on('coffees')->onUpdate('cascade');
            $table->integer('count_cup')->default(0)->comment('количество кружек');
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
        Schema::dropIfExists('cat_coffee');
    }
};
