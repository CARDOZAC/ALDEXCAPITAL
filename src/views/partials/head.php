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
  <meta property="og:locale"      content="es_CO">
  <meta property="og:site_name"   content="ALDEX CAPITAL">
  <meta property="og:url"         content="<?= SecurityHelper::escape($pageUrl) ?>">
  <meta property="og:title"       content="<?= SecurityHelper::escape($pageTitle) ?>">
  <meta property="og:description" content="<?= SecurityHelper::escape($pageDescription) ?>">
  <meta property="og:image"       content="<?= SecurityHelper::escape(rtrim($pageUrl, '/') . IMAGES_PATH . '/aldex_logo_3d_transparent.png') ?>">
  <meta name="twitter:card"        content="summary_large_image">
  <meta name="twitter:title"       content="<?= SecurityHelper::escape($pageTitle) ?>">
  <meta name="twitter:description" content="<?= SecurityHelper::escape($pageDescription) ?>">

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ProfessionalService",
    "name": "ALDEX CAPITAL",
    "url": <?= json_encode($pageUrl, JSON_UNESCAPED_SLASHES) ?>,
    "logo": <?= json_encode(rtrim($pageUrl, '/') . IMAGES_PATH . '/aldex_icon_gold.png', JSON_UNESCAPED_SLASHES) ?>,
    "telephone": "+57 317 278 9641",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Villavicencio",
      "addressRegion": "Meta",
      "addressCountry": "CO"
    },
    "areaServed": {
      "@type": "AdministrativeArea",
      "name": "Villavicencio, Meta, Colombia"
    },
    "makesOffer": [
      { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Diligencias Corporativas" } },
      { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Inteligencia Operativa" } },
      { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Soporte Administrativo por Demanda" } },
      { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Gestión Técnica de Activos" } },
      { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Soluciones Tecnológicas" } },
      { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "B2B Branding y Comunidad" } }
    ]
  }
  </script>

  <!-- Preload de la fuente del cuerpo (Inter) -->
  <link rel="preload" href="<?= ASSETS_PATH ?>/fonts/inter-latin.woff2" as="font" type="font/woff2" crossorigin>

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
