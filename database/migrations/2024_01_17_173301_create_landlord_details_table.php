<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandlordDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landlord_details', function (Blueprint $table) {
            $table->id('landlord_id'); // This will create an auto-incrementing primary key 'id' column.
            $table->string('landlord_name');
            $table->string('bank');
            $table->string('bank_acc');
            $table->mediumText('remarks');
            $table->string('code');
            $table->timestamp('landlord_created_at')->default(now());
            $table->string('contact1')->nullable();
            $table->string('number1')->nullable();
            $table->string('contact2')->nullable();
            $table->string('number2')->nullable();
            $table->string('contact3')->nullable();
            $table->string('number3')->nullable();
        });

        // Add an index for the 'code' column
        Schema::table('landlord_details', function (Blueprint $table) {
            $table->index('code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('landlord_details');
    }
}
