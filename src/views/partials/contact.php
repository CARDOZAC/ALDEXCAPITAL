<?php
/**
 * ALDEX CAPITAL — Partial: Contacto (Start an operation)
 */
declare(strict_types=1);
?>
<section id="contact" class="section" aria-labelledby="contact-title">
  <div class="container">
    <div class="contact-layout">

      <!-- Canales -->
      <div class="contact-info" data-reveal="up">
        <p class="eyebrow">Iniciar una operación</p>
        <h2 id="contact-title" class="contact-title">Hablemos de tu <span class="accent">operación</span>.</h2>
        <p class="contact-sub">
          Cuéntanos qué necesitas. Confirmamos alcance y tarifa por escrito antes de ejecutar,
          normalmente en menos de 24 horas.
        </p>

        <div class="contact-channels">
          <div class="contact-channel">
            <span class="contact-channel__icon" aria-hidden="true"><?= ViewHelper::icon('mail', '', 19) ?></span>
            <div>
              <strong>Correo operacional</strong>
              <a href="mailto:<?= SecurityHelper::escape(CONTACT_EMAIL) ?>"><?= SecurityHelper::escape(CONTACT_EMAIL) ?></a>
            </div>
          </div>
          <div class="contact-channel">
            <span class="contact-channel__icon" aria-hidden="true"><?= ViewHelper::icon('phone', '', 19) ?></span>
            <div>
              <strong>Teléfono / WhatsApp</strong>
              <a href="tel:+<?= SecurityHelper::escape(CONTACT_WHATSAPP) ?>"><?= SecurityHelper::escape(CONTACT_PHONE) ?></a>
            </div>
          </div>
          <div class="contact-channel">
            <span class="contact-channel__icon" aria-hidden="true"><?= ViewHelper::icon('map-pin', '', 19) ?></span>
            <div>
              <strong>Ubicación</strong>
              <span><?= SecurityHelper::escape(CONTACT_CITY) ?></span>
            </div>
          </div>
        </div>

        <a
          href="https://wa.me/<?= SecurityHelper::escape(CONTACT_WHATSAPP) ?>?text=Hola%20ALDEX%20CAPITAL%2C%20necesito%20informaci%C3%B3n%20sobre%20sus%20servicios."
          class="btn btn--whatsapp"
          target="_blank" rel="noopener noreferrer"
          aria-label="Contactar por WhatsApp"
        >
          <?= ViewHelper::icon('message-circle', '', 18) ?> Escríbenos por WhatsApp
        </a>
      </div>

      <!-- Formulario -->
      <div class="contact-form glass" data-reveal="fade" style="--reveal-delay: 100ms;">
        <?php if ($contactController->isSuccess()): ?>
          <div class="form-alert form-alert--success" role="alert">
            <?= ViewHelper::icon('check-circle', '', 18) ?>
            Tu solicitud se envió con éxito. Te respondemos en menos de 24 horas.
          </div>
        <?php elseif ($contactController->hasErrors()): ?>
          <div class="form-alert form-alert--error" role="alert">
            <div>
              <strong>Por favor corrige lo siguiente:</strong>
              <ul>
                <?php foreach ($contactController->getErrors() as $error): ?>
                  <li><?= SecurityHelper::escape($error) ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        <?php endif; ?>

        <h3 class="form-title">Solicitar cotización</h3>
        <p class="form-intro">Cuéntanos qué necesitas. Confirmamos alcance y tarifa antes de ejecutar.</p>

        <form id="contact-form" method="POST" action="#contact" novalidate aria-label="Formulario de contacto ALDEX CAPITAL">
          <?= ViewHelper::csrfField() ?>

          <div class="form-grid">
            <div class="form-field">
              <label for="name">Nombre completo</label>
              <input type="text" id="name" name="name" placeholder="Tu nombre" required minlength="3" autocomplete="name" value="<?= SecurityHelper::escape($_POST['name'] ?? '') ?>" aria-required="true">
            </div>
            <div class="form-field">
              <label for="email">Correo electrónico</label>
              <input type="email" id="email" name="email" placeholder="correo@empresa.com" required autocomplete="email" value="<?= SecurityHelper::escape($_POST['email'] ?? '') ?>" aria-required="true">
            </div>
            <div class="form-field">
              <label for="company">Empresa</label>
              <input type="text" id="company" name="company" placeholder="Nombre de tu empresa" autocomplete="organization" value="<?= SecurityHelper::escape($_POST['company'] ?? '') ?>">
            </div>
            <div class="form-field">
              <label for="service">Servicio de interés</label>
              <select id="service" name="service">
                <option value="">Selecciona un servicio</option>
                <option value="diligencias"  <?= ($_POST['service'] ?? '') === 'diligencias'  ? 'selected' : '' ?>>Diligencias Corporativas</option>
                <option value="inteligencia" <?= ($_POST['service'] ?? '') === 'inteligencia' ? 'selected' : '' ?>>Inteligencia Operativa</option>
                <option value="soporte"      <?= ($_POST['service'] ?? '') === 'soporte'      ? 'selected' : '' ?>>Soporte Administrativo</option>
                <option value="activos"      <?= ($_POST['service'] ?? '') === 'activos'      ? 'selected' : '' ?>>Gestión de Activos</option>
                <option value="tecnologia"   <?= ($_POST['service'] ?? '') === 'tecnologia'   ? 'selected' : '' ?>>Soluciones Tecnológicas</option>
                <option value="branding"     <?= ($_POST['service'] ?? '') === 'branding'     ? 'selected' : '' ?>>B2B Branding &amp; Comunidad</option>
              </select>
            </div>
            <div class="form-field form-field--full">
              <label for="message">Mensaje</label>
              <textarea id="message" name="message" placeholder="Describe brevemente qué necesitas y en qué plazo." required minlength="20" aria-required="true"><?= SecurityHelper::escape($_POST['message'] ?? '') ?></textarea>
            </div>
          </div>

          <div class="form-submit">
            <button type="submit" class="btn btn--primary btn--block" data-magnetic>
              <?= ViewHelper::icon('send', '', 17) ?> Enviar solicitud
            </button>
          </div>

          <p class="form-note">
            Al enviar aceptas nuestra política de confidencialidad. No compartimos tu información con terceros.
          </p>
        </form>
      </div>

    </div>
  </div>
</section>
