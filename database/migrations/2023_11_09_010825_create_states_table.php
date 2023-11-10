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
        Schema::create('states', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();

            $table->unsignedBigInteger('pob')->nullable();
            $table->unsignedBigInteger('viv')->nullable();
            $table->unsignedBigInteger('pob_fem')->nullable();
            $table->unsignedBigInteger('pob_mas')->nullable();
            $table->string('cvegeo', 100)->collation('utf8mb4_general_ci')->nullable();
            $table->string('cve_agee', 100)->collation('utf8mb4_general_ci')->nullable();
            $table->string('nom_agee', 100)->collation('utf8mb4_general_ci')->nullable();
            $table->string('nom_abrev', 100)->collation('utf8mb4_general_ci')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('states');
    }
};
