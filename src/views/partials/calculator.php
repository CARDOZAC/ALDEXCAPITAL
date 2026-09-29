<?php
/**
 * ALDEX CAPITAL — Partial: Quote Control Center
 * Conserva IDs/lógica de la calculadora (main.js initCalculator).
 */
declare(strict_types=1);
?>
<section id="calculator" class="section" aria-labelledby="calc-title">
  <div class="container">
    <header class="sec-head sec-head--center" data-reveal="up">
      <p class="eyebrow">Inversión transparente</p>
      <h2 class="sec-title" id="calc-title">
        Conoce tu inversión <span class="accent">antes de hablar con nosotros</span>.
      </h2>
      <p class="sec-lead">
        Sin cotizaciones opacas. Selecciona el servicio y obtén al instante un desglose claro
        de tu inversión estimada.
      </p>
    </header>

    <div class="calc glass" data-reveal="fade">

      <!-- Controles -->
      <div class="calc__controls">
        <div>
          <label class="calc-label" for="calc-service">Servicio a cotizar</label>
          <div class="calc-select">
            <select id="calc-service" name="service">
              <optgroup label="Diligencias Corporativas">
                <option value="diligencias-mensajeria">Mensajería de Alta Seguridad</option>
                <option value="diligencias-bancaria">Gestión Bancaria Especializada</option>
              </optgroup>
              <optgroup label="Inteligencia Operativa">
                <option value="inteligencia-dashboard">Business Dashboard (Power BI / Excel)</option>
              </optgroup>
              <optgroup label="Soporte Administrativo">
                <option value="soporte-4h">Soporte Presencial 4h</option>
                <option value="soporte-8h">Jornada Completa 8h</option>
                <option value="soporte-retainer">Retainer Mensual (16h)</option>
              </optgroup>
              <optgroup label="Gestión de Activos">
                <option value="activos-levantamiento">Levantamiento Físico de Inventario</option>
                <option value="activos-auditoria">Auditoría y Conciliación de Activos</option>
              </optgroup>
              <optgroup label="Soluciones Tecnológicas">
                <option value="tech-automatizacion">Automatización de Procesos (Make/n8n)</option>
                <option value="tech-diagnostico">Diagnóstico Tecnológico</option>
              </optgroup>
              <optgroup label="Branding &amp; Comunidad">
                <option value="branding-identidad">Identidad Corporativa B2B / Branding</option>
                <option value="branding-community">Gestión de Comunidades B2B</option>
              </optgroup>
            </select>
          </div>
        </div>

        <div class="calc-urgency" role="group" aria-labelledby="immediacy-label">
          <?= ViewHelper::icon('alert-triangle', '', 20) ?>
          <div>
            <p id="immediacy-label">
              <strong>Factor Inmediatez (+20%)</strong><br>
              Recargo aplicable cuando la ejecución se requiere en menos de 24 horas.
            </p>
            <label class="calc-toggle" for="calc-immediacy">
              <span class="calc-toggle__sw">
                <input type="checkbox" id="calc-immediacy" name="immediacy" aria-describedby="immediacy-label">
                <span class="calc-toggle__track" aria-hidden="true"></span>
              </span>
              Requiero ejecución urgente
            </label>
          </div>
        </div>

        <p class="calc-note">
          Valores estimados sobre tarifas base de ALDEX CAPITAL. El precio final se confirma
          por cotización formal escrita antes de iniciar la gestión.
        </p>
      </div>

      <!-- Resultado en vivo -->
      <div class="calc__result" aria-live="polite" aria-label="Desglose de inversión estimada">
        <div class="calc__result-head">
          <span class="calc__result-title"><?= ViewHelper::icon('bar-chart-2', '', 16) ?> Desglose de inversión</span>
          <span class="chip chip--live"><span class="chip__dot" aria-hidden="true"></span> En vivo</span>
        </div>

        <dl class="calc-rows">
          <div class="calc-row"><dt>Tarifa base</dt><dd id="calc-base">—</dd></div>
          <div class="calc-row"><dt>Margen operativo</dt><dd id="calc-margin">—</dd></div>
          <div class="calc-row"><dt>Factor inmediatez</dt><dd id="calc-immediacy-row">$ 0</dd></div>
          <div class="calc-row calc-row--total"><dt>Total estimado</dt><dd id="calc-total">—</dd></div>
        </dl>

        <div class="calc-bar" aria-hidden="true">
          <span class="s-base" id="calc-bar-base"></span>
          <span class="s-margin" id="calc-bar-margin"></span>
          <span class="s-urgency" id="calc-bar-urgency"></span>
        </div>
        <div class="calc-legend" aria-hidden="true">
          <span><i class="l-base"></i> Base</span>
          <span><i class="l-margin"></i> Margen</span>
          <span><i class="l-urgency"></i> Inmediatez</span>
        </div>

        <a href="#contact" class="btn btn--primary calc-cta" data-magnetic aria-label="Solicitar cotización formal">
          <?= ViewHelper::icon('send', '', 16) ?> Solicitar cotización formal
        </a>
        <p class="calc-secure"><?= ViewHelper::icon('lock', '', 13) ?> Confidencial · Sin sorpresas · Por escrito</p>
      </div>

    </div>
  </div>
</section>
