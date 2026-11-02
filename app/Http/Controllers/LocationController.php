<?php

/**
 * ---------------------------------------------------------------------------
 * MeruLink — Sistema de gestión hotelera
 * ---------------------------------------------------------------------------
 * Copyright (c) 2026 Hotel Plaza Meru. Todos los derechos reservados.
 *
 * Este software es propiedad exclusiva de Hotel Plaza Meru. Queda prohibida
 * su reproducción, distribución, comunicación pública, modificación o uso
 * total o parcial sin la autorización previa y por escrito del titular.
 * ---------------------------------------------------------------------------
 */

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLocationRequest;
use Illuminate\Support\Str;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::withCount('events')->orderBy('key')->get();
        return response()->json([ 'data' => $locations ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationRequest $request)
    {
        $data = $request->validated();
        $data['key'] = $this->uniqueKey($data['area']);

        $location = Location::create($data);

        return response()->json(['data' => $location], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreLocationRequest $request, Location $location)
    {
        $data = $request->validated();

        // Si cambia el área, se regenera la clave (slug) para mantenerla coherente.
        if (Str::slug($data['area']) !== Str::slug($location->area)) {
            $data['key'] = $this->uniqueKey($data['area'], $location->id);
        }

        $location->update($data);

        return response()->json(['data' => $location]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        if ($location->events()->exists()) {
            return response()->json([
                'message' => 'No se puede eliminar: esta ubicación tiene eventos asociados.'
            ], 422);
        }

        $location->delete();

        return response()->json([
            'message' => "La ubicación {$location->area} ha sido eliminada correctamente."
        ], 200);
    }

    /**
     * Genera una clave única (slug) a partir del área.
     */
    private function uniqueKey(string $area, ?int $ignoreId = null): string
    {
        $base = Str::slug($area);
        if ($base === '') {
            $base = 'ubicacion';
        }

        $key = $base;
        $counter = 2;

        while (Location::where('key', $key)
            ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $key = $base . '-' . $counter++;
        }

        return $key;
    }
}
