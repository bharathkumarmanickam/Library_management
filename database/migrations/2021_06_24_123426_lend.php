<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lend extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lendbook', function (Blueprint $table) {
            $table->id();
            $table->string('bookno');
            $table->string('name');
            $table->string('address');
            $table->string('connum');
            $table->string('fromdate');
            $table->string('todate');
            $table->string('token');
            $table->string('veri');                 
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
        
    }
}
