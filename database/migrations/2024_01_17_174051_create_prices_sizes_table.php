<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices_sizes', function (Blueprint $table) {
            $table->id('price_size_id'); // This will create an auto-incrementing primary key 'id' column.
            $table->integer('gross_sf');
            $table->integer('net_sf');
            $table->float('selling_price', 16, 2)->default(0.00);
            $table->float('selling_g', 16, 2)->default(0.00);
            $table->float('selling_n', 16, 2)->default(0.00);
            $table->float('rental_price', 16, 2)->default(0.00);
            $table->float('rental_g', 16, 2)->default(0.00);
            $table->float('rental_n', 16, 2)->default(0.00);
            $table->text('mgmf');
            $table->text('rate');
            $table->text('land');
            $table->text('oths');
            $table->timestamps(); // This will add 'created_at' and 'updated_at' columns.
            $table->unsignedBigInteger('building_id');

        });

        // Add an index for the 'price_size_id' column
        Schema::table('prices_sizes', function (Blueprint $table) {
            $table->index('price_size_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices_sizes');
    }
}
