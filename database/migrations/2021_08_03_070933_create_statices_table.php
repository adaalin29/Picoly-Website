<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
          
            $table->text('key');
            $table->text('name');
            $table->longText('description')->nullable();
            $table->longText('image')->nullable();
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statices');
    }
}
