<?php
/**
 * ALDEX CAPITAL — Landing Page Principal
 *
 * Arquitectura:
 *   index.php         → Punto de entrada, orquestador principal
 *   config/           → Configuración global
 *   src/models/       → Datos de negocio
 *   src/controllers/  → Lógica de formularios
 *   src/helpers/      → Funciones de utilidad
 *   src/views/        → Vistas y parciales HTML
 *   public/css/       → Estilos
 *   public/js/        → Scripts
 *   public/images/    → Imágenes y assets
 */

declare(strict_types=1);

// ── Autoload de clases ─────────────────────────────────────────
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/src/helpers/SecurityHelper.php';
require_once __DIR__ . '/src/helpers/ViewHelper.php';
require_once __DIR__ . '/src/models/ServicesModel.php';
require_once __DIR__ . '/src/controllers/ContactController.php';

// ── Headers de seguridad ───────────────────────────────────────
SecurityHelper::setSecurityHeaders();
header('Content-Type: text/html; charset=UTF-8');

// ── Iniciar sesión de forma segura ─────────────────────────────
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 0,
        'path'     => '/',
        'secure'   => (APP_ENV === 'production'),
        'httponly' => true,
        'samesite' => 'Strict',
    ]);
    session_start();
}

// ── Manejar formulario de contacto ─────────────────────────────
$contactController = new ContactController();
$contactController->handle();

// ── Meta variables para la vista ──────────────────────────────
$pageTitle       = APP_NAME . ' | Capacidad operativa por demanda para empresas pequeñas';
$pageDescription = 'ALDEX CAPITAL es la capa operativa externa para equipos de 5 a 20 personas: ejecuta procesos, diligencias, activos e inteligencia con trazabilidad y confidencialidad. Villavicencio, Meta.';
$pageUrl         = APP_URL;

// ── Render ─────────────────────────────────────────────────────
?>
<!DOCTYPE html>
<html lang="es">

<?php require_once __DIR__ . '/src/views/partials/head.php'; ?>

<body>

  <?php require_once __DIR__ . '/src/views/partials/navbar.php'; ?>

  <a href="#main-content" class="skip-link">Saltar al contenido</a>

  <main id="main-content">
    <?php require_once __DIR__ . '/src/views/partials/hero.php'; ?>
    <?php require_once __DIR__ . '/src/views/partials/signals.php'; ?>
    <?php require_once __DIR__ . '/src/views/partials/problem.php'; ?>
    <?php require_once __DIR__ . '/src/views/partials/operating-layer.php'; ?>
    <?php require_once __DIR__ . '/src/views/partials/services.php'; ?>
    <?php require_once __DIR__ . '/src/views/partials/sectors.php'; ?>
    <?php require_once __DIR__ . '/src/views/partials/how-it-works.php'; ?>
    <?php require_once __DIR__ . '/src/views/partials/calculator.php'; ?>
    <?php require_once __DIR__ . '/src/views/partials/protocol.php'; ?>
    <?php require_once __DIR__ . '/src/views/partials/comparison.php'; ?>
    <?php require_once __DIR__ . '/src/views/partials/contact.php'; ?>
  </main>

  <?php require_once __DIR__ . '/src/views/partials/footer.php'; ?>

  <!-- JavaScript -->
  <script type="module" src="<?= JS_PATH ?>/main.js?v=<?= APP_VERSION ?>" defer></script>

</body>
</html>
