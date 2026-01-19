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
        Schema::create('exercises', function (Blueprint $table) {
            $table->id(); // unsignedBigInt by default

            $table->integer('order_by')->nullable();
            $table->string('title');
            $table->string('cloudflare_video')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('youtube_video')->nullable();
            $table->boolean('going_up')->default(false);
            $table->boolean('going_down')->default(false);
            $table->time('time_tense')->nullable();

            // Foreign keys (must reference unsignedBigInt IDs)
            $table->foreignId('body_id')
                ->nullable()
                ->constrained('body_levels')
                ->cascadeOnDelete();

            $table->foreignId('part_id')
                ->nullable()
                ->constrained('body_parts')
                ->cascadeOnDelete();

            $table->foreignId('level_id')
                ->nullable()
                ->constrained('levels')
                ->cascadeOnDelete();

            $table->foreignId('muscle_id') // renamed from muscles_id
            ->nullable()
                ->constrained('muscles')
                ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercises');
    }
};
