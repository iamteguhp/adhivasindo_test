<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roles_id')->unsigned();
            $table->string('name', 50);
            $table->string('username', 50);
            $table->string('email', 50)->nullable();
            $table->boolean('email_verification_status')->nullable()->default(0);
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('roles_id')
            ->references('id')
            ->on('user_roles')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
