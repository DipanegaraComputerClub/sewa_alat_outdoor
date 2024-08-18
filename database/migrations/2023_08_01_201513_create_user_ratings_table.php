<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('user_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('alat_id');
            $table->float('rating'); // Tambahkan kolom rating
            $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('alat_id')->references('id')->on('alats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_ratings');
    }
}
