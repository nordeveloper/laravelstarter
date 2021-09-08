<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesPermisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('roles_permisions');
        
        Schema::create('roles_permisions', function (Blueprint $table) {

            $table->id();
            $table->bigInteger('role_id')->unsigned();
            $table->string('model');
            $table->boolean('read');
            $table->boolean('add');
            $table->boolean('edit');
            $table->boolean('delete');
            $table->timestamps();
            
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_permisions');
    }
}
