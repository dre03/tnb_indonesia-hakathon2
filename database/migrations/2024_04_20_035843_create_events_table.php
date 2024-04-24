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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('is_published');
            $table->string('location');
            $table->date('date');
            $table->time('time');
            $table->double('price')->nullable();
            $table->string('thumbnail')->nullable();
            $table->foreignId('speaker_id')->constrained('speakers');
            $table->foreignId('moderator_id')->constrained('moderators');
            $table->foreignId('event_category_id')->constrained('event_categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
