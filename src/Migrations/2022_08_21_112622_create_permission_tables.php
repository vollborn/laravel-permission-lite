<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();

            $table->string('name', 100);

            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();

            $table->string('name', 100);

            $table->timestamps();
        });

        Schema::create('permission_role', function (Blueprint $table) {
            $table->foreignId('permission_id')
                ->references('id')
                ->on('permissions')
                ->cascadeOnDelete();

            $table->foreignId('role_id')
                ->references('id')
                ->on('roles')
                ->cascadeOnDelete();

            $table->unique(['permission_id', 'role_id']);
        });

        Schema::create('permission_user', function (Blueprint $table) {
            $table->foreignId('permission_id')
                ->references('id')
                ->on('permissions')
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->unique(['permission_id', 'user_id']);
        });

        Schema::create('role_user', function (Blueprint $table) {
            $table->foreignId('role_id')
                ->references('id')
                ->on('roles')
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->unique(['role_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('permission_user');
        Schema::dropIfExists('permission_role');

        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions');
    }
};
