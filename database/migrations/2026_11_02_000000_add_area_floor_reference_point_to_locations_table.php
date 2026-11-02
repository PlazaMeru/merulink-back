<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Renombra `label` a `area` y añade `floor` y `reference_point`.
     */
    public function up(): void
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->string('area')->nullable()->after('key');
            $table->string('floor')->nullable()->after('area');
            $table->string('reference_point')->nullable()->after('floor');
        });

        DB::statement('UPDATE locations SET area = label');

        Schema::table('locations', function (Blueprint $table) {
            $table->dropColumn('label');
        });
    }

    /**
     * Revierte el cambio: restaura `label` y elimina los campos nuevos.
     */
    public function down(): void
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->string('label')->nullable()->after('key');
        });

        DB::statement('UPDATE locations SET label = area');

        Schema::table('locations', function (Blueprint $table) {
            $table->dropColumn(['area', 'floor', 'reference_point']);
        });
    }
};
