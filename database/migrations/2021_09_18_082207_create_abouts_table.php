<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 200);
            $table->string('subtitle', 200);
            $table->string('description', 1000);
            $table->string('helper', 100);
            $table->string('service_title_one',100);
            $table->string('service_desc_one',200);
            $table->string('service_title_two',100);
            $table->string('service_desc_two',200);
            $table->string('service_title_three',100);
            $table->string('service_desc_three',200);
            $table->string('service_title_four',100);
            $table->string('service_desc_four',200);
            $table->string('experience_title', 100);
            $table->string('experience_desc', 100);
            $table->string('image', 100);
            $table->string('alt', 100);
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
        Schema::dropIfExists('abouts');
    }
}
