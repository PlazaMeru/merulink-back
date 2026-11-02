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

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'area' => ['required', 'string', 'max:100'],
            'floor' => ['required', 'string', 'max:50'],
            'reference_point' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'area.required' => 'La Zona / Área es obligatoria.',
            'area.string'   => 'La Zona / Área debe ser un texto válido.',
            'area.max'      => 'La Zona / Área no debe superar los 100 caracteres.',
            'floor.required' => 'El Nivel / Planta es obligatorio.',
            'floor.string'   => 'El Nivel / Planta debe ser un texto válido.',
            'floor.max'      => 'El Nivel / Planta no debe superar los 50 caracteres.',
            'reference_point.string' => 'El Punto de referencia debe ser un texto válido.',
            'reference_point.max'    => 'El Punto de referencia no debe superar los 255 caracteres.',
        ];
    }
}
