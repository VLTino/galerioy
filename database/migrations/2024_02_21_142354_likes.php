<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->increments('idlike');
            $table->unsignedInteger('userid');
            $table->unsignedInteger('id_photo');
            $table->timestamps();
            $table->foreign('userid')->references('userid')->on('users')->onDelete('cascade');
            $table->foreign('id_photo')->references('id_photo')->on('galleries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
