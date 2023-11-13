<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDigitalFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('digital_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id')->unique();
            $table->integer('agent_id');
            $table->string('username',15);
            $table->string('password',255);
            $table->string('pass_id',20);
            $table->string('lot_meter',11)->default(1);
            $table->string('expiry_date',10);
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('digital_forms');
    }
}
