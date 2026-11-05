<?php

/*
|--------------------------------------------------------------------------
| Definición del menú de la aplicación
|--------------------------------------------------------------------------
|
| Este archivo es LA ÚNICA fuente de verdad de la estructura del menú.
| El frontend NO filtra: el endpoint GET /me/menu devuelve solo los items
| visibles para el usuario, calculados con MenuService a partir de aquí.
|
| Estructura de cada item:
|   - id          (string)  Identificador único (se usa para resaltar item activo)
|   - label       (string)  Texto visible en el menú
|   - path        (string)  Ruta a la que navega (usa "#" si es solo contenedor)
|   - permission  (string)  Permiso requerido (omitir si no exige permiso)
|   - hidden      (bool)    true = módulo no desarrollado, nunca se muestra
|   - hideFromTop (bool)    true = se mantiene en estructura/sidebar pero NO sale en el top menú
|   - highlight   (bool)    true = se muestra con el estilo de botón destacado
|   - icon        (string)  SVG opcional que acompaña al texto del item
|   - children    (array)   Sub-items del sidebar
|
*/

return [

    // ─────────────────────────────────────────────────────────────
    // Módulos desarrollados
    // ─────────────────────────────────────────────────────────────

    [
        'id'     => 'IA',
        'label'  => 'IA',
        'path'   => '/ia',
        'hidden' => true,
    ],

    [
        'id'         => 'RRHH',
        'label'      => 'RRHH',
        'path'       => '/empleados',
        'permission' => 'view-employees',
        'children'   => [
            ['id' => 'Empleados', 'label' => 'Empleados', 'path' => '/empleados', 'permission' => 'view-employees'],
            ['id' => 'Departamentos', 'label' => 'Departamentos', 'path' => '/empleados/departamentos', 'permission' => 'view-departments'],
            ['id' => 'Sub-Departamentos', 'label' => 'Sub-Departamentos', 'path' => '/empleados/sub-departamentos', 'permission' => 'view-subdepartments'],
            ['id' => 'Cargos', 'label' => 'Cargos', 'path' => '/empleados/cargos', 'permission' => 'view-positions'],
            [
                'id'       => 'Control-Asistencia-Top',
                'label'    => 'Control Asistencia',
                'path'     => '#',
                'children' => [
                    ['id' => 'En Casa', 'label' => 'En Casa', 'path' => '/empleados/asistencia/en-casa', 'permission' => 'view-at-home-attendances'],
                    ['id' => 'Consultar', 'label' => 'Consultar', 'path' => '/empleados/asistencia/ver', 'permission' => 'view-attendances'],
                    ['id' => 'Prenomina', 'label' => 'Prenomina', 'path' => '/empleados/asistencia/prenomina', 'permission' => 'prepayroll-attendances'],
                    ['id' => 'Modificar', 'label' => 'Modificar', 'path' => '/empleados/asistencia/editar', 'permission' => 'edit-attendances'],
                    ['id' => 'Lista de transporte', 'label' => 'Lista de transporte', 'path' => '/empleados/asistencia/lista-transporte', 'permission' => 'view-transport-lists-attendances'],
                ],
            ],
            [
                'id'       => 'Roles',
                'label'    => 'Roles',
                'path'     => '#',
                'children' => [
                    ['id' => 'Asignaciones', 'label' => 'Asignaciones', 'path' => '/empleados/roles/asignaciones', 'permission' => 'view-assigns'],
                    ['id' => 'Roles y Permisos', 'label' => 'Roles y Permisos', 'path' => '/empleados/roles', 'permission' => 'view-roles'],
                ],
            ],
            [
                'id'       => 'Planificación',
                'label'    => 'Planificación',
                'path'     => '#',
                'children' => [
                    ['id' => 'Turnos', 'label' => 'Turnos', 'path' => '/empleados/turnos', 'permission' => 'view-shifts'],
                    ['id' => 'Horarios', 'label' => 'Horarios', 'path' => '/empleados/horarios', 'permission' => 'view-schedules'],
                ],
            ],
            [
                'id'       => 'Vestuarios',
                'label'    => 'Vestuarios',
                'path'     => '#',
                'children' => [
                    ['id' => 'Lockers', 'label' => 'Lockers', 'path' => '/empleados/vestuarios/lockers', 'permission' => 'view-lockers'],
                    ['id' => 'Candados', 'label' => 'Candados', 'path' => '/empleados/vestuarios/candados', 'permission' => 'view-padlocks'],
                    ['id' => 'Patrones Candados', 'label' => 'Patrones', 'path' => '/empleados/vestuarios/candados/patrones', 'permission' => 'view-padlocks'],
                    ['id' => 'Casilleros', 'label' => 'Asignaciones', 'path' => '/empleados/vestuarios/casilleros', 'permission' => 'view-assigns'],
                ],
            ],
        ],
    ],

    [
        'id'         => 'Eventos',
        'label'      => 'Eventos',
        // Aterrizaje del módulo (no hay ruta índice en /eventos)
        'path'       => '/eventos/eventos-meru',
        'permission' => 'view-events',
        // No se muestra en el top menú.
        'hideFromTop' => true,
        'children'   => [
            ['id' => 'Events', 'label' => 'Eventos Merú', 'path' => '/eventos/eventos-meru'],
            ['id' => 'EventWeddingAndDinnerHeights', 'label' => 'Noches Bodas / Cena en Alturas', 'path' => '/eventos/noche-bodas-cena-alturas'],
            ['id' => 'VeHolidaysGoogleCalendar', 'label' => 'Festivos VE / Calendario Google', 'path' => '/eventos/festivos-venezolanos-calendario-google'],
            ['id' => 'MeruBirthDays', 'label' => 'Cumpleaños Merú', 'path' => '/eventos/cumpleanos-meru'],
            ['id' => 'ExecutiveMod', 'label' => 'Ejecutivos MOD', 'path' => '/eventos/ejecutivo-mod'],
            ['id' => 'BankingMondays', 'label' => 'Lunes Bancarios', 'path' => '/eventos/lunes-bancarios'],
            [  
                'id'          => 'Ubicaciones',
                'label'       => 'Ubicaciones',
                'path'        => '/eventos/ubicaciones',
                'permission'  => 'view-locations',
                'hideFromTop' => true,
                'highlight' => true,
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin-house preview-icon"><path d="M15 22a1 1 0 0 1-1-1v-4a1 1 0 0 1 .445-.832l3-2a1 1 0 0 1 1.11 0l3 2A1 1 0 0 1 22 17v4a1 1 0 0 1-1 1z"/><path d="M18 10a8 8 0 0 0-16 0c0 4.993 5.539 10.193 7.399 11.799a1 1 0 0 0 .601.2"/><path d="M18 22v-3"/><circle cx="10" cy="10" r="3"/></svg>'
            ],
        ],
    ],

    // ─────────────────────────────────────────────────────────────
    // Módulos futuros (hidden: true = no desarrollados, nunca se muestran)
    // ─────────────────────────────────────────────────────────────

    [
        'id'       => 'Sistemas',
        'label'    => 'Sistemas',
        'path'     => '/sistemas',
        'hidden'   => true,
        'children' => [
            ['id' => 'APs Internet', 'label' => 'APs Internet', 'path' => '/sistemas/aps-internet'],
            ['id' => 'Domotica', 'label' => 'Domotica', 'path' => '/sistemas/domotica'],
            ['id' => 'Mantenimiento', 'label' => 'Mantenimiento', 'path' => '/sistemas/mantenimiento'],
        ],
    ],

    [
        'id'       => 'Inventario',
        'label'    => 'Inventario',
        'path'     => '/inventario',
        'hidden'   => true,
        'children' => [
            ['id' => 'Stock', 'label' => 'Stock', 'path' => '/inventario/stock'],
            ['id' => 'Entradas', 'label' => 'Entradas', 'path' => '/inventario/entradas'],
            ['id' => 'Salidas', 'label' => 'Salidas', 'path' => '/inventario/salidas'],
        ],
    ],

    [
        'id'       => 'Recepcion',
        'label'    => 'Whatsapp',
        'path'     => '/whatsapp',
        'hidden'   => true,
        'children' => [
            ['id' => 'Ventas', 'label' => 'Ventas', 'path' => '/whatsapp/ventas'],
            ['id' => 'AyB', 'label' => 'AyB', 'path' => '/whatsapp/ayb'],
        ],
    ],

    [
        'id'       => 'Ventas-Top',
        'label'    => 'Ventas',
        'path'     => '/ventas',
        'hidden'   => true,
        'children' => [
            ['id' => 'Productos', 'label' => 'Productos', 'path' => '/ventas/productos'],
        ],
    ],

    [
        'id'       => 'Alimentos y Bebidas',
        'label'    => 'Alimentos y Bebidas',
        'path'     => '/ayb',
        'hidden'   => true,
        'children' => [
            ['id' => 'Menu', 'label' => 'Menú', 'path' => '/ayb/menu'],
        ],
    ],

    [
        'id'     => 'Mantenimiento-Top',
        'label'  => 'Mantenimiento',
        'path'   => '/mantenimiento',
        'hidden' => true,
    ],

    [
        'id'       => 'Configuración',
        'label'    => 'Configuración',
        'path'     => '/configuracion',
        'hidden'   => true,
        'children' => [
            ['id' => 'Sistema', 'label' => 'Sistema', 'path' => '/configuracion/sistema'],
            ['id' => 'Seguridad', 'label' => 'Seguridad', 'path' => '/configuracion/seguridad'],
            ['id' => 'Notificaciones', 'label' => 'Notificaciones', 'path' => '/configuracion/notificaciones'],
        ],
    ],

    [
        'id'       => 'Documentos',
        'label'    => 'Documentos',
        'path'     => '/documentos',
        'hidden'   => true,
        'children' => [
            ['id' => 'Memos', 'label' => 'Memos', 'path' => '/documentos/memos'],
            ['id' => 'Reglamento', 'label' => 'Reglamento', 'path' => '/documentos/reglamento'],
        ],
    ],
];
