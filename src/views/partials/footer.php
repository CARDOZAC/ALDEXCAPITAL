<?php
/**
 * ALDEX CAPITAL — Partial: Footer
 */
declare(strict_types=1);

$year     = date('Y');
$services = ServicesModel::getAll();
?>
<footer id="footer" role="contentinfo" aria-label="Pie de página ALDEX CAPITAL">
  <div class="container">
    <div class="footer-grid">

      <div class="footer-brand">
        <div class="footer-brand__row">
          <img src="<?= IMAGES_PATH ?>/aldex_icon_gold.png?v=<?= APP_VERSION ?>" alt="ALDEX CAPITAL" width="46" height="46">
          <div>
            <span class="footer-brand__name">ALDEX CAPITAL</span>
            <span class="footer-brand__tag">Capacidad operativa por demanda</span>
          </div>
        </div>
        <p class="footer-quote">El mecanismo de alta confiabilidad que reduce la incertidumbre de quien toma las decisiones.</p>
        <p class="footer-desc">
          Capa operativa externa para empresas pequeñas: ejecutamos procesos, diligencias,
          activos e inteligencia con trazabilidad y confidencialidad, sin ampliar tu estructura fija.
        </p>
      </div>

      <div class="footer-col">
        <h4>Capacidades</h4>
        <ul role="list">
          <?php foreach ($services as $s): ?>
            <li><a href="#services"><?= SecurityHelper::escape($s['title']) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Contacto</h4>
        <ul role="list">
          <li><a href="mailto:<?= SecurityHelper::escape(CONTACT_EMAIL) ?>"><?= SecurityHelper::escape(CONTACT_EMAIL) ?></a></li>
          <li><a href="tel:+<?= SecurityHelper::escape(CONTACT_WHATSAPP) ?>"><?= SecurityHelper::escape(CONTACT_PHONE) ?></a></li>
          <li><a href="https://wa.me/<?= SecurityHelper::escape(CONTACT_WHATSAPP) ?>" target="_blank" rel="noopener noreferrer">Línea directa WhatsApp</a></li>
          <li><span><?= SecurityHelper::escape(CONTACT_CITY) ?></span></li>
        </ul>
      </div>

    </div>

    <div class="footer-bottom">
      <p class="footer-legal">&copy; <?= $year ?> ALDEX CAPITAL. Todos los derechos reservados.</p>
      <p class="footer-badge"><?= ViewHelper::icon('lock', '', 13) ?> Trazabilidad y confidencialidad absoluta</p>
    </div>
  </div>
</footer>

<!-- WhatsApp flotante -->
<a
  href="https://wa.me/<?= SecurityHelper::escape(CONTACT_WHATSAPP) ?>?text=Hola%20ALDEX%20CAPITAL%2C%20necesito%20informaci%C3%B3n%20sobre%20sus%20servicios."
  class="wa-float" target="_blank" rel="noopener noreferrer" aria-label="Chatear por WhatsApp"
>
  <?= ViewHelper::icon('message-circle', '', 24) ?>
</a>

<!-- Volver arriba -->
<button id="back-to-top" aria-label="Volver al inicio de la página" title="Volver al inicio">
  <?= ViewHelper::icon('chevron-up', '', 20) ?>
</button>
