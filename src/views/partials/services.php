<?php
/**
 * ALDEX CAPITAL — Partial: Capabilities / Bento principal
 */
declare(strict_types=1);

$byId = [];
foreach (ServicesModel::getAll() as $s) {
    $byId[$s['id']] = $s;
}

/** "Desde $X" a partir del primer ítem de precio real. */
function svcPriceFrom(array $service): string
{
    $first = $service['items'][0]['price'] ?? '';
    if ($first === '') {
        return 'Cotización a medida';
    }
    $min = trim(explode(' - ', $first)[0]);
    return str_starts_with($min, 'Desde') ? $min : 'Desde ' . $min;
}

/** Microvisualización abstracta por servicio. */
function svcViz(string $type): void
{
    switch ($type) {
        case 'kpi':
            echo '<div class="viz viz-kpi" aria-hidden="true">'
               . '<div class="viz-kpi__cell"><small>Ejecución</small><b>97.8%</b></div>'
               . '<div class="viz-kpi__cell"><small>Evidencia</small><b>100%</b></div>'
               . '<div class="viz-kpi__cell"><small>Desvíos</small><b>0.4%</b></div>'
               . '</div>'
               . '<div class="viz viz-spark" aria-hidden="true">'
               . '<i style="height:38%"></i><i style="height:55%"></i><i style="height:46%"></i><i style="height:70%"></i><i style="height:60%"></i><i style="height:88%"></i><i style="height:76%"></i><i style="height:94%"></i>'
               . '</div>';
            break;
        case 'nodes':
            echo '<div class="viz viz-nodes" aria-hidden="true">'
               . '<span class="viz-nodes__n">Input</span><span class="viz-nodes__c"></span>'
               . '<span class="viz-nodes__n">Validación</span><span class="viz-nodes__c"></span>'
               . '<span class="viz-nodes__n">Entrega</span>'
               . '</div>';
            break;
        case 'availability':
            echo '<div class="viz viz-tags" aria-hidden="true">'
               . '<span>4 h</span><span>8 h</span><span>16 h/mes</span><span>Backoffice</span>'
               . '</div>';
            break;
        case 'inventory':
            echo '<div class="viz viz-blocks" aria-hidden="true">';
            $on = [0, 2, 3, 6, 7, 9, 10, 11];
            for ($i = 0; $i < 12; $i++) {
                echo '<i class="' . (in_array($i, $on, true) ? 'on' : '') . '"></i>';
            }
            echo '</div>';
            break;
        case 'route':
            echo '<div class="viz viz-route" aria-hidden="true">'
               . '<i class="on"></i><span></span><i class="on"></i><span></span><i></i><span></span><i></i>'
               . '</div>';
            break;
        case 'channels':
            echo '<div class="viz viz-tags" aria-hidden="true">'
               . '<span>Identidad</span><span>LinkedIn</span><span>Contenido</span><span>Autoridad</span>'
               . '</div>';
            break;
    }
}

$layout = [
    ['id' => 'inteligencia', 'class' => 'svc--lg spot',   'viz' => 'kpi'],
    ['id' => 'tecnologia',   'class' => 'svc--lg spot',   'viz' => 'nodes'],
    ['id' => 'soporte',      'class' => 'spot',           'viz' => 'availability'],
    ['id' => 'activos',      'class' => 'spot',           'viz' => 'inventory'],
    ['id' => 'diligencias',  'class' => 'svc--lg spot',   'viz' => 'route'],
    ['id' => 'branding',     'class' => 'svc--wide spot', 'viz' => 'channels'],
];
?>
<section id="services" class="section" aria-labelledby="services-title">
  <div class="container">
    <header class="sec-head" data-reveal="up">
      <p class="eyebrow">Capacidades</p>
      <h2 class="sec-title" id="services-title">
        Seis capacidades. Un mismo <span class="accent">estándar de ejecución</span>.
      </h2>
      <p class="sec-lead">
        Contrata la capacidad exacta que necesitas, cuando la necesitas. Cada línea absorbe
        una fuente concreta de fricción y la devuelve con evidencia.
      </p>
    </header>

    <div class="bento" role="list">
      <?php foreach ($layout as $i => $slot): ?>
        <?php $svc = $byId[$slot['id']] ?? null; if ($svc === null) { continue; } ?>
        <article
          class="svc <?= SecurityHelper::escape($slot['class']) ?>"
          role="listitem"
          data-reveal="scale"
          style="--reveal-delay: <?= ($i % 3) * 70 ?>ms;"
          aria-labelledby="svc-<?= SecurityHelper::escape($svc['id']) ?>"
        >
          <div class="svc__top">
            <span class="svc__num"><?= SecurityHelper::escape($svc['number']) ?></span>
            <span class="svc__icon" aria-hidden="true"><?= ViewHelper::icon($svc['icon'], '', 22) ?></span>
          </div>

          <div class="svc__body">
            <h3 class="svc__title" id="svc-<?= SecurityHelper::escape($svc['id']) ?>"><?= SecurityHelper::escape($svc['title']) ?></h3>
            <p class="svc__sub"><?= SecurityHelper::escape($svc['subtitle']) ?></p>
            <p class="svc__desc"><?= SecurityHelper::escape($svc['description']) ?></p>
            <?php svcViz($slot['viz']); ?>
          </div>

          <div class="svc__foot">
            <span class="svc__price"><?= SecurityHelper::escape(svcPriceFrom($svc)) ?></span>
            <a class="svc__link" href="#calculator" aria-label="Cotizar <?= SecurityHelper::escape($svc['title']) ?>">
              Cotizar <?= ViewHelper::icon('arrow-right', '', 14) ?>
            </a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
