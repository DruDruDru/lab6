<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('problems', function (Blueprint $table) {
            $table->string('problem')->primary();
        });
        DB::table('problems')->insert([
            ['problem' => 'product'],
            ['problem' => 'recovery'],
            ['problem' => 'complaint'],
            ['problem' => 'more_info'],
            ['problem' => 'tech_support']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('problems');
    }
};
