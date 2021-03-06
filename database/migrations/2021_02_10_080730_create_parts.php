<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('part_no');
            $table->string('name');
            $table->bigInteger('vehicle_id')->unsigned();
            $table->foreign('vehicle_id')
                    ->references('id')
                    ->on('vehicles')
                    ->onDelete('cascade');
            $table->bigInteger('part_type_id')->unsigned();
            $table->foreign('part_type_id')
                     ->references('id')
                     ->on('part_type')
                     ->onDelete('cascade');
            $table->bigInteger('qty')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('parts');
    }
}
