<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Renombra `label` a `area` y añade `floor` y `reference_point`.
     */
    public function up(): void
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->renameColumn('label', 'area');
        });

        Schema::table('locations', function (Blueprint $table) {
            $table->string('floor')->nullable()->after('area');
            $table->string('reference_point')->nullable()->after('floor');
            $table->unique('area');
        });
    }

    /**
     * Revierte el cambio: restaura `label` y elimina los campos nuevos.
     */
    public function down(): void
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->dropUnique('locations_area_unique');
            $table->dropColumn(['floor', 'reference_point']);
        });

        Schema::table('locations', function (Blueprint $table) {
            $table->renameColumn('area', 'label');
        });
    }
};
