<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('firstname',30);
          $table->string('lastname',30);
          $table->string('company_name',60)->nullable();
          $table->string('email',150);
          $table->string('contact',10);
          $table->string('area_at',200)->nullable();
          $table->string('landmark',60)->nullable();
          $table->string('taluka',200)->nullable();
          $table->string('post',100)->nullable();
          $table->string('username',30);
          $table->string('password',255);
          $table->string('gst_in')->nullable();
          $table->string('pan_no')->nullable();
          $table->string('website')->nullable();
          $table->binary('profile_img')->nullable();
          $table->string('img_type')->nullable();
          $table->string('city')->nullable();
          $table->string('district')->nullable();
          $table->string('state')->nullable();
          $table->string('postal_code')->nullable();
          $table->string('role',60);
          $table->integer('agent_refered')->nullable();
          $table->rememberToken();
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
        Schema::dropIfExists('admin_users');
    }
}
