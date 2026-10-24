<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Cek dan hapus kolom kategori jika masih ada
        if (Schema::hasColumn('beritas', 'kategori')) {
            Schema::table('beritas', function (Blueprint $table) {
                $table->dropColumn('kategori');
            });
        }

        // Cek dan tambah foreign key kategori_id jika belum ada
        if (!Schema::hasColumn('beritas', 'kategori_id')) {
            Schema::table('beritas', function (Blueprint $table) {
                $table->foreignId('kategori_id')
                      ->after('judul')
                      ->nullable()
                      ->constrained('kategoris')
                      ->nullOnDelete();
            });
        }
    }

    public function down(): void
    {
        Schema::table('beritas', function (Blueprint $table) {
            if (Schema::hasColumn('beritas', 'kategori_id')) {
                $table->dropForeign(['kategori_id']);
                $table->dropColumn('kategori_id');
            }

            if (!Schema::hasColumn('beritas', 'kategori')) {
                $table->string('kategori')->nullable()->after('judul');
            }
        });
    }
};