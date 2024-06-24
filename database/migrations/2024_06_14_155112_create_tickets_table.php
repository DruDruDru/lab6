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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('description', 2000);
            $table->string('problem', 100);
            $table->foreign("problem")
                ->references("problem")
                ->on("problems")
                ->nullOnDelete();
            $table->string('importance', 100);
            $table->foreign("importance")
                ->references("importance")
                ->on("importancies")
                ->nullOnDelete();
            $table->string('photo')->nullable();
            $table->integer('user');
            $table->foreign('user')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
