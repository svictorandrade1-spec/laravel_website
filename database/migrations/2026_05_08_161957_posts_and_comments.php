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
        Schema::create('posts', function (Blueprint $table) {
            $table->string('postUUID')->primary();
            $table->foreignId('user_id');
            $table->text('text');
            $table->string('user_name');
            $table->string('image_path')->nullable();
            $table->string('UserProfilePicture')->nullable();
            $table->timestamps();
        });//if everything is all right, comments should be made in a new table with the name of the postUUID of the post they are commenting on, and the postUUID should be stored in the users table so that we can easily retrieve the comments for a post
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
