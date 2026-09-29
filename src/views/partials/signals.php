<?php
/**
 * ALDEX CAPITAL — Partial: Signals / Status Rail
 * Solo señales reales (sin prueba social inventada).
 */
declare(strict_types=1);
?>
<section id="signals" aria-label="Señales de operación">
  <div class="container">
    <div class="signals-rail">

      <div class="signal" data-reveal="fade">
        <span class="signal__val"><?= ViewHelper::icon('lock', '', 22) ?></span>
        <span class="signal__label">Confidencialidad<br>por acuerdo</span>
      </div>

      <div class="signal" data-reveal="fade" style="--reveal-delay: 60ms;">
        <span class="signal__val"><span data-count="100" data-suffix="%">100%</span></span>
        <span class="signal__label">Gestiones<br>documentadas</span>
      </div>

      <div class="signal" data-reveal="fade" style="--reveal-delay: 120ms;">
        <span class="signal__val"><?= ViewHelper::icon('file-text', '', 22) ?></span>
        <span class="signal__label">Cotización<br>por escrito</span>
      </div>

      <div class="signal" data-reveal="fade" style="--reveal-delay: 180ms;">
        <span class="signal__val"><span data-count="6">6</span></span>
        <span class="signal__label">Líneas<br>operativas</span>
      </div>

      <div class="signal" data-reveal="fade" style="--reveal-delay: 240ms;">
        <span class="signal__val"><span data-count="4">4</span></span>
        <span class="signal__label">Sectores<br>estratégicos</span>
      </div>

      <div class="signal" data-reveal="fade" style="--reveal-delay: 300ms;">
        <span class="signal__val">24/7</span>
        <span class="signal__label">Disponibilidad<br>operativa</span>
      </div>

    </div>
  </div>
</section>
