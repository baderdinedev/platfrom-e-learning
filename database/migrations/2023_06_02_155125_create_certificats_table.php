<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            // Add other columns if needed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('certificats');
    }
};
