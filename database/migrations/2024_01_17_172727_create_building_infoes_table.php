<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingInfoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_infoes', function (Blueprint $table) {
            $table->id('building_id'); // This will create an auto-incrementing primary key 'id' column.
            $table->string('code');
            $table->string('district');
            $table->string('street');
            $table->string('building');
            $table->string('floor');
            $table->string('flat');
            $table->integer('no_room');
            $table->string('enter_password');
            $table->timestamp('building_created_at')->default(now());
            $table->string('block');
            $table->string('cargo_lift');
            $table->string('customer_lift');
            $table->string('tf_hr');
            $table->string('display_by');
            $table->string('individual')->nullable();
            $table->string('separate')->nullable();
            $table->string('year');
            $table->string('agent_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('building_infoes');
    }
}
