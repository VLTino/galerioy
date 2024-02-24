<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->Increments('userid');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->timestamps();
            $table->string('level');
        });

        DB::unprepared('
        CREATE TRIGGER after_insert_users
        AFTER INSERT
        ON users FOR EACH ROW
        INSERT INTO profiles (userid, describe_profile, link_acc, photo_profile)
        VALUES (NEW.userid, NULL, NULL, NULL);
        ');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');

        DB::unprepared('DROP TRIGGER IF EXISTS after_insert_users');
    }
};
