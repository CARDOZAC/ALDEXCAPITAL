<?php
/**
 * ALDEX CAPITAL - Modelo de Servicios
 * Copy B2B orientado a resultados (ROI, eficiencia, mitigación de riesgo).
 */

declare(strict_types=1);

class ServicesModel
{
    /**
     * Catálogo completo de servicios de ALDEX CAPITAL.
     *
     * @return array<int, array<string, mixed>>
     */
    public static function getAll(): array
    {
        return [
            [
                'id'          => 'diligencias',
                'number'      => '01',
                'title'       => 'Diligencias Corporativas',
                'subtitle'    => 'Trámites y logística institucional ejecutada',
                'icon'        => 'briefcase',
                'description' => 'Radicaciones, gestión bancaria y diligencias presenciales ejecutadas con trazabilidad estricta. Su equipo directivo deja de perder horas productivas en desplazamientos y trámites.',
                'items'       => [
                    ['name' => 'Mensajería de Alta Seguridad',      'price' => '$25.000 - $45.000 COP'],
                    ['name' => 'Gestión Bancaria Especializada',    'price' => '$35.000 COP'],
                    ['name' => 'Trámites Institucionales / Notaría', 'price' => '$50.000 - $120.000 COP'],
                    ['name' => 'Radicación e Intermediación Legal',  'price' => '$80.000 COP'],
                ],
            ],
            [
                'id'          => 'inteligencia',
                'number'      => '02',
                'title'       => 'Inteligencia Operativa',
                'subtitle'    => 'Datos que se convierten en decisiones',
                'icon'        => 'bar-chart-2',
                'description' => 'Dashboards e indicadores (KPIs) que transforman la operación diaria en evidencia. Sus decisiones dejan de basarse en supuestos y pasan a fundamentarse en datos en tiempo real.',
                'items'       => [
                    ['name' => 'Diseño de KPIs y Cuadros de Mando',       'price' => '$450.000 - $900.000 COP'],
                    ['name' => 'Business Dashboards (Power BI / Excel)',   'price' => '$600.000 - $1.800.000 COP'],
                    ['name' => 'Análisis de Eficiencia Operativa',         'price' => '$400.000 COP/mes'],
                ],
                'large'       => true,
            ],
            [
                'id'          => 'soporte',
                'number'      => '03',
                'title'       => 'Soporte Administrativo por Demanda',
                'subtitle'    => 'Capacidad ejecutiva sin nómina fija',
                'icon'        => 'users',
                'description' => 'Asistencia operativa por horas o requerimiento específico. Absorbe cargas variables sin ampliar su estructura ni incrementar sus costos fijos.',
                'items'       => [
                    ['name' => 'Soporte Presencial (4h)',         'price' => '$220.000 COP'],
                    ['name' => 'Jornada Completa (8h)',           'price' => '$380.000 COP'],
                    ['name' => 'Retainer Mensual (16h)',          'price' => '$750.000 COP/mes'],
                    ['name' => 'Gestión Documental / Backoffice', 'price' => '$200.000 / 100 docs'],
                ],
            ],
            [
                'id'          => 'activos',
                'number'      => '04',
                'title'       => 'Gestión Técnica de Activos',
                'subtitle'    => 'Control patrimonial sin fugas',
                'icon'        => 'database',
                'description' => 'Levantamiento, codificación y conciliación de inventarios físicos. Mitiga pérdidas, desviaciones y sanciones derivadas de la falta de control patrimonial.',
                'items'       => [
                    ['name' => 'Levantamiento Físico de Inventario', 'price' => '$950.000 - $2.000.000 COP'],
                    ['name' => 'Codificación y Plaqueteado',         'price' => '$500.000 - $1.200.000 COP'],
                    ['name' => 'Conciliación Contable de Activos',   'price' => '$900.000 - $2.500.000 COP'],
                ],
            ],
            [
                'id'          => 'tecnologia',
                'number'      => '05',
                'title'       => 'Soluciones Tecnológicas',
                'subtitle'    => 'Automatización que elimina lo manual',
                'icon'        => 'cpu',
                'description' => 'Automatización de procesos y digitalización de flujos de trabajo. Elimina las tareas repetitivas y los cuellos de botella que consumen tiempo productivo.',
                'items'       => [
                    ['name' => 'Automatización (Make / n8n / Power Automate)', 'price' => '$800.000 - $2.500.000 COP'],
                    ['name' => 'Desarrollo de Software Interno / Micro-SaaS',  'price' => 'Desde $2.000.000 COP'],
                    ['name' => 'Consultoría / Diagnóstico Tecnológico',        'price' => '$450.000 COP'],
                ],
                'large'       => true,
            ],
            [
                'id'          => 'branding',
                'number'      => '06',
                'title'       => 'B2B Branding y Comunidad',
                'subtitle'    => 'Autoridad comercial en el entorno digital',
                'icon'        => 'globe',
                'description' => 'Identidad corporativa y estrategia de contenido para el mercado empresarial. Proyecta la seriedad y solidez que atraen mejores oportunidades de negocio.',
                'items'       => [
                    ['name' => 'Identidad Corporativa B2B / Branding', 'price' => 'Desde $800.000 COP'],
                    ['name' => 'Estrategia LinkedIn y Canales B2B',    'price' => 'Desde $1.000.000 COP/mes'],
                    ['name' => 'Generación de Contenido de Autoridad', 'price' => 'Desde $700.000 COP/mes'],
                ],
                'premium'     => true,
            ],
        ];
    }

    /**
     * Métricas clave (franja de datos).
     *
     * @return array<int, array<string, string>>
     */
    public static function getMetrics(): array
    {
        return [
            ['value' => '100%',  'label' => 'Trazabilidad documentada'],
            ['value' => '6',     'label' => 'Líneas operativas integradas'],
            ['value' => '4',     'label' => 'Sectores estratégicos'],
            ['value' => '24/7',  'label' => 'Disponibilidad operativa'],
        ];
    }

    /**
     * Sectores objetivo (industry gateway).
     * Cada sector comparte el mismo sistema de componentes; el color es
     * un micro-acento, no una paleta distinta.
     *
     * @return array<int, array<string, mixed>>
     */
    public static function getSectors(): array
    {
        return [
            [
                'id'     => 'salud',
                'icon'   => 'heart',
                'accent' => 'cyan',
                'name'   => 'Salud',
                'desc'   => 'Clínicas, IPS, consultorios y laboratorios donde el control documental y la trazabilidad no son opcionales.',
                'needs'  => ['Control documental', 'Gestión de activos', 'Backoffice administrativo', 'Dashboards operativos', 'Soporte por demanda'],
            ],
            [
                'id'     => 'agro',
                'icon'   => 'leaf',
                'accent' => 'green',
                'name'   => 'Agroindustria',
                'desc'   => 'Productores, comercializadores y plantas del Llano que necesitan orden en inventarios, datos y operación.',
                'needs'  => ['Inventarios y activos', 'Logística administrativa', 'Digitalización de procesos', 'Control e indicadores', 'Operación por demanda'],
            ],
            [
                'id'     => 'industria',
                'icon'   => 'factory',
                'accent' => 'amber',
                'name'   => 'Industria',
                'desc'   => 'Talleres, manufactura y empresas con activos que exigen control patrimonial, soporte y digitalización.',
                'needs'  => ['Registro de activos', 'Levantamiento de inventario', 'Soporte administrativo', 'Automatización de procesos', 'Indicadores de control'],
            ],
            [
                'id'     => 'b2b',
                'icon'   => 'layers',
                'accent' => 'blue',
                'name'   => 'Servicios B2B',
                'desc'   => 'Firmas, consultorías y equipos que externalizan su operación sin ceder trazabilidad ni control.',
                'needs'  => ['Administración por demanda', 'Automatización y dashboards', 'Gestión documental', 'Branding y canales B2B', 'Ejecución de diligencias'],
            ],
        ];
    }
}
