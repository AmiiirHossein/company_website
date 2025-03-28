<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_headers', function (Blueprint $table) {
            $table->id();
            $table->string('email', 200);
            $table->string('phone', 200);
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
        Schema::dropIfExists('top_headers');
    }
}
