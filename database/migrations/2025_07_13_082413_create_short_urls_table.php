<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('short_urls', function (Blueprint $table) {
      $table->id();
      $table->string('url');
      $table->string('short_url')->unique();
      $table->string('password')->nullable();
      $table->unsignedBigInteger('visit_count')->default(0);
      $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
      $table->dateTime('expired_at')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('short_urls');
  }
};
