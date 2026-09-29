<?php
/**
 * ALDEX CAPITAL - Configuración Global
 * Archivo de configuración centralizado para la aplicación
 */

declare(strict_types=1);

// Entorno de la aplicación: 'development' | 'production'
define('APP_ENV', 'development');
define('APP_NAME', 'ALDEX CAPITAL');
define('APP_URL', 'https://aldexcapital.com');
define('APP_VERSION', '3.1.0');

// Configuración de contacto
define('CONTACT_EMAIL', 'contactooperacionalac@ALDEXCAPITAL.onmicrosoft.com');
define('CONTACT_PHONE', '+57 317 278 9641');
define('CONTACT_WHATSAPP', '573172789641');
define('CONTACT_CITY', 'Villavicencio, Meta, Colombia');


// Rutas de assets
define('ASSETS_PATH', '/public');
define('IMAGES_PATH', ASSETS_PATH . '/images');
define('CSS_PATH', ASSETS_PATH . '/css');
define('JS_PATH', ASSETS_PATH . '/js');

// Seguridad
define('CSRF_TOKEN_LENGTH', 32);
define('RATE_LIMIT_REQUESTS', 10);
define('RATE_LIMIT_WINDOW', 60); // segundos

// Colores de la marca (para uso en PHP si se necesita)
define('BRAND_PRIMARY', '#C68D5E');   // Cobre/Bronce del isotipo
define('BRAND_ACCENT', '#E9C9A0');    // Champán claro
define('BRAND_DARK', '#081120');      // Navy profundo
define('BRAND_SURFACE', '#0E1A2E');   // Navy pizarra

// Configuración de errores según entorno
if (APP_ENV === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    error_reporting(0);
    ini_set('display_errors', '0');
}
