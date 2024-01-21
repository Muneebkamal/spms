<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFtodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ftods', function (Blueprint $table) {
            $table->id('ftod_id'); // This will create an auto-incrementing primary key 'id' column.
            $table->string('facilities');
            $table->string('types');
            $table->string('decorations')->nullable();
            $table->string('others');
            $table->string('other_date');
            $table->longText('other_free_formate')->nullable();
            $table->unsignedBigInteger('building_id');
        });

        // Add an index for the 'ftod_id' column
        Schema::table('ftods', function (Blueprint $table) {
            $table->index('ftod_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ftods');
    }
}
