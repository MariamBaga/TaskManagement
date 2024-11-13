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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();  // Clé primaire
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Relation avec l'utilisateur
            $table->string('type');  // Type de notification (ex: 'Project Created')
            $table->string('user_name')->nullable();  // Nom de l'utilisateur
            $table->text('message');  // Message de notification
            $table->json('data')->nullable();  // Données supplémentaires pour la notification
            $table->timestamp('read_at')->nullable();  // Date de lecture
            $table->timestamps();  // Pour les dates de création et de mise à jour

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
