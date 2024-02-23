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
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('username',100)->unique();
            $table->string('password',512);
            $table->timestamps();
            $table->datetime('deleted_at')->nullable();
        });

        DB::connection('pgsql')->select("insert into \"user\"(username, password, created_at, updated_at) values('gen','\$2y\$12\$qtekF5r5BbJ5ChNfnNFrRu0ArRwWvw3HoFOl1crZZFbKpfvWg9Tye',NOW(),NOW())");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
