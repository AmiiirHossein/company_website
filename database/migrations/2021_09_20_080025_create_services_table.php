<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('image', 100);
            $table->string('alt', 100);
            $table->string('service_title_one', 100);
            $table->string('service_desc_one', 300);
            $table->string('link_one', 200);
            $table->string('service_title_two', 100);
            $table->string('service_desc_two', 300);
            $table->string('link_two', 200);
            $table->string('service_title_three', 100);
            $table->string('service_desc_three', 300);
            $table->string('link_three', 200);

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
        Schema::dropIfExists('services');
    }
}
