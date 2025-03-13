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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');  // Add user_id column
            $table->string('site_name')->default('default_name'); // Or any value you want
            $table->string('site_logo')->nullable();
            $table->boolean('dark_mode')->nullable()->default(0);

            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_image')->nullable();

            $table->string('light_color')->nullable(); 
            $table->string('dark_color')->nullable();  

            $table->string('selected_font')->nullable(); 
            $table->string('custom_font')->nullable();  

            $table->json('colors')->nullable(); 
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('settings');
    }
};
