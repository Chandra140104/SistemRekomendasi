<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        foreach (['users', 'sub_kategori', 'lokasi_penggunaan', 'kebutuhan', 'input_rekomendasi'] as $tableName) {
            Schema::table($tableName, function (Blueprint $table) use ($tableName) {
                if ($tableName === 'input_rekomendasi') {
                    if (Schema::hasColumn($tableName, 'created_at')) {
                        $table->dropColumn('created_at');
                    }
                    return;
                }

                $columns = [];
                if (Schema::hasColumn($tableName, 'created_at')) {
                    $columns[] = 'created_at';
                }
                if (Schema::hasColumn($tableName, 'updated_at')) {
                    $columns[] = 'updated_at';
                }

                if ($columns) {
                    $table->dropColumn($columns);
                }
            });
        }
    }

    public function down(): void
    {
        foreach (['users', 'sub_kategori', 'lokasi_penggunaan', 'kebutuhan'] as $tableName) {
            Schema::table($tableName, function (Blueprint $table) use ($tableName) {
                if (! Schema::hasColumn($tableName, 'created_at') && ! Schema::hasColumn($tableName, 'updated_at')) {
                    $table->timestamps();
                }
            });
        }

        Schema::table('input_rekomendasi', function (Blueprint $table) {
            if (! Schema::hasColumn('input_rekomendasi', 'created_at')) {
                $table->timestamp('created_at')->nullable();
            }
        });
    }
};
