<?php
/**
 * ALDEX CAPITAL — Partial: Navbar (Spatial Command Bar)
 */
declare(strict_types=1);
?>
<div id="scroll-progress" aria-hidden="true"></div>

<nav id="navbar" role="navigation" aria-label="Navegación principal">
  <div class="nav-shell" aria-hidden="true"></div>
  <div class="container">

    <a href="#hero" class="nav-brand" aria-label="ALDEX CAPITAL — Inicio">
      <img src="<?= IMAGES_PATH ?>/aldex_icon_gold.png?v=<?= APP_VERSION ?>" alt="ALDEX CAPITAL Isotipo" class="nav-brand__icon" width="36" height="36">
      <span class="nav-brand__text">
        <span class="nav-brand__name">ALDEX CAPITAL</span>
        <span class="nav-brand__tag">Capacidad operativa por demanda</span>
      </span>
    </a>

    <ul class="nav-links" id="nav-links" role="list">
      <li><a href="#services" aria-label="Ir a la sección de Capacidades">Capacidades</a></li>
      <li><a href="#sectors" aria-label="Ir a la sección de Sectores">Sectores</a></li>
      <li><a href="#how" aria-label="Ir a la sección de Cómo funciona">Cómo funciona</a></li>
      <li><a href="#calculator" aria-label="Ir a la calculadora de Tarifas">Tarifas</a></li>
      <li><a href="#contact" class="btn btn--primary" data-magnetic aria-label="Ir al formulario para Cotizar operación">Cotizar operación</a></li>
    </ul>

    <button id="nav-toggle" class="nav-toggle" aria-controls="nav-links" aria-expanded="false" aria-label="Abrir menú de navegación">
      <span></span><span></span><span></span>
    </button>

  </div>
</nav>
