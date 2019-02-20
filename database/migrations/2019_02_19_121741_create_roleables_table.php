<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roleables', function (Blueprint $table) {
            $table->integer('role_id');
            $table->integer('roleable_id');
            $table->string('roleable_type');
            
            $table->primary(['role_id', 'roleable_id', 'roleable_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roleables');
    }
}
