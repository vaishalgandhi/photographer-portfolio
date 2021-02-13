<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('photographer_id');
            $table->string('title', 60);
            $table->string('description', 200);
            $table->string('img');
            $table->date('date');
            $table->boolean('featured');
            $table->timestamps();
            $table->softDeletes();

            // Foreign Key
            $table->foreign('photographer_id')
                ->references('id')
                ->on('photographers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('albums');
    }
}
