<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('produk', function (Blueprint $table) {
            $columns = [];

            if (Schema::hasColumn('produk', 'created_at')) {
                $columns[] = 'created_at';
            }

            if (Schema::hasColumn('produk', 'updated_at')) {
                $columns[] = 'updated_at';
            }

            if (! empty($columns)) {
                $table->dropColumn($columns);
            }
        });
    }

    public function down(): void
    {
        Schema::table('produk', function (Blueprint $table) {
            if (! Schema::hasColumn('produk', 'created_at')) {
                $table->timestamp('created_at')->nullable();
            }

            if (! Schema::hasColumn('produk', 'updated_at')) {
                $table->timestamp('updated_at')->nullable();
            }
        });
    }
};
