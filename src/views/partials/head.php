<?php
/**
 * ALDEX CAPITAL — Partial: Head
 */
declare(strict_types=1);

$pageTitle       = $pageTitle       ?? APP_NAME . ' | Precisión Operativa, Máxima Confidencialidad';
$pageDescription = $pageDescription ?? 'Firma de inteligencia corporativa y soporte operativo. Precisión operativa, máxima confidencialidad.';
$pageUrl         = $pageUrl         ?? APP_URL;
?>
<head>
  <script>document.documentElement.classList.add('js')</script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title><?= SecurityHelper::escape($pageTitle) ?></title>
  <meta name="description" content="<?= SecurityHelper::escape($pageDescription) ?>">
  <meta name="author"      content="ALDEX CAPITAL">
  <meta name="robots"      content="index, follow">
  <link rel="canonical"    href="<?= SecurityHelper::escape($pageUrl) ?>">
  <meta name="theme-color" content="#081120">

  <meta property="og:type"        content="website">
  <meta property="og:url"         content="<?= SecurityHelper::escape($pageUrl) ?>">
  <meta property="og:title"       content="<?= SecurityHelper::escape($pageTitle) ?>">
  <meta property="og:description" content="<?= SecurityHelper::escape($pageDescription) ?>">
  <meta property="og:image"       content="<?= SecurityHelper::escape(APP_URL . IMAGES_PATH . '/aldex_logo_3d_transparent.png') ?>">
  <meta name="twitter:card"        content="summary_large_image">
  <meta name="twitter:title"       content="<?= SecurityHelper::escape($pageTitle) ?>">
  <meta name="twitter:description" content="<?= SecurityHelper::escape($pageDescription) ?>">

  <!-- Preconnect -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <!-- Tipografía: system-first (SF Pro en Apple) + Inter como fallback consistente -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="<?= ASSETS_PATH ?>/css/styles.css?v=<?= APP_VERSION ?>">

  <!-- Favicon: isotipo cobre sobre navy -->
  <link rel="icon" type="image/png" href="<?= IMAGES_PATH ?>/aldex_icon_gold.png">

  <!-- Fallback si JS no carga: mostrar todo el contenido -->
  <noscript>
    <style>
      [data-reveal] { opacity: 1 !important; transform: none !important; }
    </style>
  </noscript>
</head>
