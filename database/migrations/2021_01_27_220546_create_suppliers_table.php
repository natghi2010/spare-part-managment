<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country_of_origin');
            $table->string('tin_number')->max(10)->unique();
            $table->string('phone')->max(10)->unique();
            $table->string('email')->unique();
            $table->string('status')->default('Active');
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
        Schema::table('suppliers', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::dropIfExists('suppliers');
    }
}
