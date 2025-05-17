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
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();  // Create an auto-incrementing primary key `id`
            $table->morphs('tokenable');  // Create polymorphic relation for the `tokenable` (user or any other model)
            $table->string('name');  // Name of the token (e.g., api-token)
            $table->string('token', 64)->unique();  // Token value (must be unique)
            $table->text('abilities')->nullable();  // Abilities assigned to the token, stored as JSON or text
            $table->timestamp('last_used_at')->nullable();  // Track the last time the token was used
            $table->timestamp('expires_at')->nullable();  // Expiry date of the token
            $table->timestamps();  // Created and updated timestamps for when the token was created and last updated
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');  // Drop the table if rolling back the migration
    }
};
