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
             // Ajouter une colonne 'id' de type UUID si vous utilisez UUID
             $table->uuid('id')->primary();  // Définir la clé primaire
             $table->string('notifiable_type');
             $table->unsignedBigInteger('notifiable_id');
             $table->string('type');
             $table->string('user_name')->nullable();
             $table->text('message')->nullable();
             $table->json('data');
             $table->string('url')->nullable()->change();
             $table->timestamp('read_at')->nullable();
             $table->timestamps();

             // Ajouter une contrainte pour la relation polymorphique
             $table->index(['notifiable_type', 'notifiable_id']);
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
