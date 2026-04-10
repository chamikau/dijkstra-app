<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('graph_edges', function (Blueprint $table) {
            $table->id();
            $table->string('from_node');
            $table->string('to_node');
            $table->integer('weight');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('graph_edges');
    }
};