<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNodesTable extends Migration
{
    public function up()
    {
        Schema::create('nodes', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('type');
            $table->json('data');
            $table->json('position');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nodes');
    }
}
