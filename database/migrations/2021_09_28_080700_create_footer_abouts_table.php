<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('description', 500);
            $table->string('instagram', 200);
            $table->string('facebook', 200);
            $table->string('twitter', 200);
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
        Schema::dropIfExists('footer_abouts');
    }
}
