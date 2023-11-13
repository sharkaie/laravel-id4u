<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDataEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_data_entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->binary('photo')->nullable();
            $table->string('photo_no',200)->nullable();
            $table->string('photo_type')->nullable();
            $table->string('status')->default('dummy');
            $table->integer('customer_id');
            $table->integer('lot_no')->default(0);
            $table->boolean('lot_submit')->default(0);
            $table->string('track_no',100);
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
        Schema::dropIfExists('user_data_entries');
    }
}
