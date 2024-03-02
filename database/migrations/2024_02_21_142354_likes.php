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
        Schema::create('likes', function (Blueprint $table) {
            $table->increments('idlike');
            $table->unsignedInteger('userid');
            $table->unsignedInteger('id_photo');
            $table->timestamps();
            $table->foreign('userid')->references('userid')->on('users')->onDelete('cascade');
            $table->foreign('id_photo')->references('id_photo')->on('galleries')->onDelete('cascade');
        });
        // Menambahkan trigger setelah tabel 'likes' dibuat
        DB::unprepared('
       CREATE TRIGGER after_insert_likes
       AFTER INSERT
       ON likes FOR EACH ROW
       UPDATE galleries
       SET like_post = like_post + 1
       WHERE id_photo = NEW.id_photo;
   ');

        // Menambahkan trigger setelah tabel 'likes' dihapus
        DB::unprepared('
       CREATE TRIGGER after_delete_likes
       AFTER DELETE
       ON likes FOR EACH ROW
       UPDATE galleries
       SET like_post = like_post - 1
       WHERE id_photo = OLD.id_photo;
   ');
    }

    public function down(): void
    {
        Schema::dropIfExists('likes');

        // Menghapus trigger saat rollback
        DB::unprepared('DROP TRIGGER IF EXISTS after_insert_likes');
        DB::unprepared('DROP TRIGGER IF EXISTS after_delete_likes');
    }
};
