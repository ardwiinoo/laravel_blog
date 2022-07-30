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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->string('title'); // judul
            $table->string('slug')->unique(); // slug harus berbeda dari yang lain
            $table->string('image')->nullable(); // boleh kosong
            $table->text('excerpt'); // untuk menyimpan sebagian kecil karakter.
            $table->text('body'); // isi blog
            $table->timestamp('published_at')->nullable(); // waktu post di publish
            $table->timestamps(); // default untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
