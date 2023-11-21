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
        Schema::create('postsmodule', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('contents');
            $table->unsignedBigInteger('user_id'); //User ID that has created the Post
            $table->timestamps(); //Date of the post created
            $table->foreign('user_id')->references('id')->on('users'); //Foreign Key for Creating Post to know WHO made it
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postsmodule');
    }
};
