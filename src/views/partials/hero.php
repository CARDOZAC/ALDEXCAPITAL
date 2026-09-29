<?php
/**
 * ALDEX CAPITAL — Partial: Hero (Operational Capacity, visualizada)
 */
declare(strict_types=1);
?>
<section id="hero" aria-labelledby="hero-title">
  <div class="hero-grid" aria-hidden="true"></div>
  <div class="hero-aura hero-aura--1" aria-hidden="true"></div>
  <div class="hero-aura hero-aura--2" aria-hidden="true"></div>

  <div class="container">
    <div class="hero-layout">

      <!-- Texto -->
      <div class="hero-text">
        <p class="hero-badge" data-reveal="fade"><i aria-hidden="true"></i> Capa operativa externa · B2B</p>

        <h1 id="hero-title" class="hero-title" data-reveal="up" style="--reveal-delay: 60ms;">
          Más capacidad operativa.<br>
          Sin ampliar tu <span class="accent">nómina</span>.
        </h1>

        <p class="hero-copy" data-reveal="up" style="--reveal-delay: 140ms;">
          ALDEX CAPITAL ejecuta procesos administrativos, tecnológicos y operativos
          para empresas pequeñas que necesitan delegar con control, evidencia y
          trazabilidad — sin convertir cada tarea en un nuevo cargo fijo.
        </p>

        <p class="hero-microcopy" data-reveal="up" style="--reveal-delay: 200ms;">
          <?= ViewHelper::icon('users', '', 16) ?> Diseñado para equipos de 5 a 20 colaboradores.
        </p>

        <div class="hero-actions" data-reveal="up" style="--reveal-delay: 260ms;">
          <a href="#calculator" class="btn btn--primary" data-magnetic>Cotizar una operación</a>
          <a href="#services" class="btn btn--ghost">Explorar capacidades</a>
        </div>
      </div>

      <!-- Operational Console -->
      <div class="hero-visual" data-reveal="scale" style="--reveal-delay: 180ms;">
        <div class="console glass glass--lg" role="img" aria-label="Consola operativa de ejemplo: una operación avanzando por las etapas Asignado, En ejecución, Soporte adjunto y Cerrado.">
          <div class="console__head">
            <span class="console__id">
              <img src="<?= IMAGES_PATH ?>/aldex_icon_gold.png?v=<?= APP_VERSION ?>" alt="ALDEX CAPITAL Isotipo en Consola" fetchpriority="high" width="22" height="22">
              OP-2048 · Gestión operativa
            </span>
            <span class="console__dots" aria-hidden="true"><i></i><i></i><i></i></span>
          </div>

          <div class="console-track" aria-hidden="true">
            <div class="console-stage console-stage--done">
              <span class="console-stage__dot"><?= ViewHelper::icon('check', '', 14) ?></span>
              <span>Asignado</span>
            </div>
            <div class="console-conn console-conn--done"></div>
            <div class="console-stage console-stage--active">
              <span class="console-stage__dot"><?= ViewHelper::icon('activity', '', 14) ?></span>
              <span>En ejecución</span>
            </div>
            <div class="console-conn"></div>
            <div class="console-stage">
              <span class="console-stage__dot"><?= ViewHelper::icon('file-text', '', 14) ?></span>
              <span>Soporte</span>
            </div>
            <div class="console-conn"></div>
            <div class="console-stage">
              <span class="console-stage__dot"><?= ViewHelper::icon('lock', '', 13) ?></span>
              <span>Cerrado</span>
            </div>
          </div>

          <div class="console-cards" aria-hidden="true">
            <div class="console-card">
              <div class="console-card__label">Avance operativo</div>
              <div class="console-card__val">72%</div>
              <div class="console-spark"><i style="height:40%"></i><i style="height:60%"></i><i style="height:50%"></i><i style="height:75%"></i><i style="height:65%"></i><i style="height:92%"></i></div>
            </div>
            <div class="console-card console-mini">
              <div>
                <div class="console-mini__row"><span>Trazabilidad</span><span>100%</span></div>
                <div class="console-mini__bar"><span style="width:100%"></span></div>
              </div>
              <div>
                <div class="console-mini__row"><span>Evidencia</span><span>Adjunta</span></div>
                <div class="console-mini__bar"><span style="width:84%"></span></div>
              </div>
              <div>
                <div class="console-mini__row"><span>Tiempo directivo</span><span>0 h</span></div>
                <div class="console-mini__bar"><span style="width:12%"></span></div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
