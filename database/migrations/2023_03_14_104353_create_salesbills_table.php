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
        Schema::create('salesbills', function (Blueprint $table) {
            $table->id();
            $table->foreignId("created_by")->constrained("users")->onDelete('cascade');;
            $table->double("total",15, 2)->default(0);
            $table->double("sincere",15, 2)->default(0);
            $table->double("Residual",15, 2)->default(0);
            $table->boolean("status")->default(1);
            $table->integer("client")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salesbills');
    }
};
