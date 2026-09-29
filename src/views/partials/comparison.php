<?php
/**
 * ALDEX CAPITAL — Partial: Comparación (capacidad variable vs estructura fija)
 * Solo criterios cualitativos; sin cifras de ahorro inventadas.
 */
declare(strict_types=1);

$fixed = [
  'Costo fijo mensual, use o no la capacidad',
  'Un cargo por cada tipo de necesidad',
  'Tiempo de selección, contratación y curva',
  'Especialización limitada a un perfil',
  'Difícil de escalar hacia arriba o hacia abajo',
];
$aldex = [
  'Pagas la capacidad puntual que realmente usas',
  'Un solo socio para múltiples líneas operativas',
  'Activación inmediata, sin proceso de nómina',
  'Especialización por demanda según la tarea',
  'Escalas según el mes y la carga real',
];
?>
<section id="comparison" class="section" aria-labelledby="comparison-title">
  <div class="container">
    <header class="sec-head sec-head--center" data-reveal="up">
      <p class="eyebrow">Capacidad vs estructura</p>
      <h2 class="sec-title" id="comparison-title">
        Suma capacidad sin sumar <span class="accent">estructura fija</span>.
      </h2>
      <p class="sec-lead">
        ALDEX no reemplaza a tu equipo: lo complementa cuando una necesidad no justifica crear
        un cargo permanente.
      </p>
    </header>

    <div class="compare">
      <div class="compare-col compare-col--fixed" data-reveal="up">
        <span class="compare-col__tag"><?= ViewHelper::icon('users', '', 15) ?> Ampliar la nómina</span>
        <h3>Estructura fija</h3>
        <ul class="compare-list">
          <?php foreach ($fixed as $item): ?>
            <li><?= ViewHelper::icon('minus', '', 16) ?> <?= SecurityHelper::escape($item) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="compare-col compare-col--aldex spot" data-reveal="up" style="--reveal-delay: 90ms;">
        <span class="compare-col__tag"><?= ViewHelper::icon('git-branch', '', 15) ?> Capacidad ALDEX</span>
        <h3>Capacidad por demanda</h3>
        <ul class="compare-list">
          <?php foreach ($aldex as $item): ?>
            <li><?= ViewHelper::icon('check', '', 16) ?> <?= SecurityHelper::escape($item) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</section>
