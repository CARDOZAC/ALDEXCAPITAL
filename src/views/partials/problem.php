<?php
/**
 * ALDEX CAPITAL — Partial: Problema (el cuello de botella del equipo pequeño)
 */
declare(strict_types=1);

$frictions = [
  [
    'icon'  => 'clock',
    'title' => 'Tiempo gerencial',
    'desc'  => 'Cuando todo termina en la misma persona, cada tarea operativa compite con dirigir y vender.',
    'viz'   => [40, 65, 55, 80, 70, 95],
    'hot'   => [3, 5],
  ],
  [
    'icon'  => 'git-branch',
    'title' => 'Procesos manuales',
    'desc'  => 'Tareas repetitivas que consumen horas y se hacen "como se puede", sin un flujo definido.',
    'viz'   => [30, 50, 45, 60, 40, 55],
    'hot'   => [1, 3],
  ],
  [
    'icon'  => 'file-text',
    'title' => 'Falta de trazabilidad',
    'desc'  => 'Sin registro claro de qué se hizo, cuándo y cómo, el control se vuelve una sensación, no un dato.',
    'viz'   => [55, 35, 60, 30, 50, 45],
    'hot'   => [1, 4],
  ],
  [
    'icon'  => 'users',
    'title' => 'Capacidad variable',
    'desc'  => 'Necesidades que no justifican un cargo permanente, pero que igual hay que ejecutar bien.',
    'viz'   => [45, 60, 40, 70, 55, 85],
    'hot'   => [3, 5],
  ],
];
?>
<section id="problem" class="section" aria-labelledby="problem-title">
  <div class="container">
    <header class="sec-head" data-reveal="up">
      <p class="eyebrow">El punto de fricción</p>
      <h2 class="sec-title" id="problem-title">
        En un equipo pequeño, una tarea "pequeña" <span class="accent">nunca es pequeña</span>.
      </h2>
      <p class="sec-lead">
        Con 5 a 20 personas, cada proceso operativo compite directamente con la dirección,
        la venta y la administración. Delegar deja de ser un lujo: es lo que libera capacidad.
      </p>
    </header>

    <div class="problem-grid">
      <?php foreach ($frictions as $i => $f): ?>
        <article class="problem-card" data-reveal="scale" style="--reveal-delay: <?= $i * 70 ?>ms;">
          <div class="problem-card__icon" aria-hidden="true"><?= ViewHelper::icon($f['icon'], '', 20) ?></div>
          <h3><?= SecurityHelper::escape($f['title']) ?></h3>
          <p><?= SecurityHelper::escape($f['desc']) ?></p>
          <div class="problem-viz" aria-hidden="true">
            <?php foreach ($f['viz'] as $j => $h): ?>
              <i class="<?= in_array($j, $f['hot'], true) ? 'hot' : '' ?>" style="height: <?= (int) $h ?>%"></i>
            <?php endforeach; ?>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
