<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SporkTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spork_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        DB::table('spork_types')->insert(
            array('id'=>1, 'name' => 'Spoon')
        );
        DB::table('spork_types')->insert(
            array('id'=>2, 'name' => 'Fork')
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('spork_types');
    }
}
