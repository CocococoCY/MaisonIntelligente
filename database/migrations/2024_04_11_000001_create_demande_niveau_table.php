<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('demande_niveau', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('niveau_demande');
            $table->string('statut')->default('en_attente'); // en_attente, accepte, refuse
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('demande_niveau');
    }
};
