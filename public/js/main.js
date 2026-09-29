/**
 * ALDEX CAPITAL — "ALDEX Spatial Operations" · main.js
 * Vanilla JS, sin dependencias. Progressive enhancement:
 * el contenido funciona sin JS; esto añade capa de interacción.
 */

'use strict';

const $  = (s, c = document) => c.querySelector(s);
const $$ = (s, c = document) => [...c.querySelectorAll(s)];

const REDUCED = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const HOVER   = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

/* ── Navegación / command bar + sheet móvil ─────────────────── */
function initNavigation() {
  const navbar = $('#navbar');
  const toggle = $('#nav-toggle');
  const links  = $('#nav-links');
  if (!navbar) return;

  const onScroll = () => navbar.classList.toggle('scrolled', window.scrollY > 24);
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  if (!toggle || !links) return;

  const focusables = () => $$('a, button', links).filter(el => !el.hasAttribute('disabled'));
  let lastFocused = null;

  const open = () => {
    lastFocused = document.activeElement;
    links.classList.add('open');
    toggle.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
    focusables()[0]?.focus();
    document.addEventListener('keydown', onKeydown);
  };
  const close = () => {
    links.classList.remove('open');
    toggle.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
    document.removeEventListener('keydown', onKeydown);
    lastFocused?.focus();
  };
  const onKeydown = (e) => {
    if (e.key === 'Escape') { close(); return; }
    if (e.key !== 'Tab') return;
    const f = focusables();
    if (!f.length) return;
    const first = f[0], last = f[f.length - 1];
    if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); }
    else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); }
  };

  toggle.addEventListener('click', () => {
    links.classList.contains('open') ? close() : open();
  });
  $$('a', links).forEach(a => a.addEventListener('click', () => {
    if (links.classList.contains('open')) close();
  }));
}

/* ── Reveal gramático (fade / up / scale) ───────────────────── */
function initRevealSystem() {
  const items = $$('[data-reveal]');
  if (!items.length) return;
  if (REDUCED) { items.forEach(el => el.classList.add('is-visible')); return; }

  const io = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) { entry.target.classList.add('is-visible'); io.unobserve(entry.target); }
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -6% 0px' });
  items.forEach(el => io.observe(el));
}

/* ── Contadores (métricas reales) ───────────────────────────── */
function initCounters() {
  const nums = $$('[data-count]');
  if (!nums.length) return;
  const finalTxt = (el) => (parseFloat(el.dataset.count) || 0) + (el.dataset.suffix || '');
  if (REDUCED) { nums.forEach(el => { el.textContent = finalTxt(el); }); return; }

  const io = new IntersectionObserver((entries) => {
    entries.forEach(entry => { if (entry.isIntersecting) { run(entry.target); io.unobserve(entry.target); } });
  }, { threshold: 0.6 });
  nums.forEach(n => io.observe(n));

  function run(el) {
    const target = parseFloat(el.dataset.count);
    const suffix = el.dataset.suffix || '';
    const dur = 1400; let start = null;
    const step = (now) => {
      if (!start) start = now;
      const p = Math.min((now - start) / dur, 1);
      el.textContent = Math.round((1 - Math.pow(1 - p, 3)) * target) + suffix;
      if (p < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
  }
}

/* ── Spotlight puntero en tarjetas .spot ────────────────────── */
function initPointerSpotlights() {
  if (!HOVER || REDUCED) return;
  $$('.spot').forEach(card => {
    card.addEventListener('pointermove', (e) => {
      const r = card.getBoundingClientRect();
      card.style.setProperty('--mx', `${e.clientX - r.left}px`);
      card.style.setProperty('--my', `${e.clientY - r.top}px`);
    });
  });
}

/* ── Magnetismo sutil solo en CTAs primarios ────────────────── */
function initMagnetic() {
  if (!HOVER || REDUCED) return;
  const MAX = 7, PULL = 0.26;
  $$('[data-magnetic]').forEach(el => {
    el.addEventListener('pointermove', (e) => {
      const r = el.getBoundingClientRect();
      const x = Math.max(-MAX, Math.min(MAX, (e.clientX - (r.left + r.width / 2)) * PULL));
      const y = Math.max(-MAX, Math.min(MAX, (e.clientY - (r.top + r.height / 2)) * PULL));
      el.style.transform = `translate(${x}px, ${y}px)`;
    });
    el.addEventListener('pointerleave', () => { el.style.transform = ''; });
  });
}

/* ── Industry gateway: selector segmentado ──────────────────── */
function initSectorSelector() {
  const root = $('#sectors');
  if (!root) return;
  const tabs = $$('.seg__btn', root);
  const panels = $$('.gateway-panel', root);
  if (!tabs.length || !panels.length) return;

  // Progressive enhancement: sin JS todos los paneles son visibles.
  root.classList.add('is-enhanced');
  panels.forEach(p => { if (!p.classList.contains('is-active')) p.hidden = true; });

  function select(id) {
    tabs.forEach(t => {
      const on = t.dataset.sector === id;
      t.setAttribute('aria-selected', String(on));
      t.tabIndex = on ? 0 : -1;
    });
    panels.forEach(p => {
      const on = p.dataset.sector === id;
      p.hidden = !on;
      p.classList.toggle('is-active', on);
    });
    // Acento de sección según sector
    const active = tabs.find(t => t.dataset.sector === id);
    if (active?.dataset.accent) root.dataset.accent = active.dataset.accent;
  }

  tabs.forEach((tab, i) => {
    tab.addEventListener('click', () => select(tab.dataset.sector));
    tab.addEventListener('keydown', (e) => {
      let ni = null;
      if (e.key === 'ArrowRight' || e.key === 'ArrowDown') ni = (i + 1) % tabs.length;
      else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') ni = (i - 1 + tabs.length) % tabs.length;
      if (ni !== null) { e.preventDefault(); tabs[ni].focus(); select(tabs[ni].dataset.sector); }
    });
  });
}

/* ── Operating layer: revelar línea de flujo ────────────────── */
function initFlowLine() {
  const line = $('.layer-line__fill');
  if (!line) return;
  if (REDUCED) { line.style.width = '100%'; return; }
  const io = new IntersectionObserver((entries) => {
    entries.forEach(entry => { if (entry.isIntersecting) { line.style.width = '100%'; io.disconnect(); } });
  }, { threshold: 0.4 });
  io.observe(line.closest('.layer-flow'));
}

/* ── Calculadora / Quote Control Center ─────────────────────── */
function initCalculator() {
  const select  = $('#calc-service');
  const urgency  = $('#calc-immediacy');
  const elBase   = $('#calc-base');
  const elMargin = $('#calc-margin');
  const elUrg    = $('#calc-immediacy-row');
  const elTotal  = $('#calc-total');
  const bBase = $('#calc-bar-base'), bMarg = $('#calc-bar-margin'), bUrg = $('#calc-bar-urgency');
  if (!select) return;

  const rates = {
    'diligencias-mensajeria': { base: 25000, margin: 0.30 },
    'diligencias-bancaria':   { base: 35000, margin: 0.30 },
    'inteligencia-dashboard': { base: 600000, margin: 0.50 },
    'soporte-4h':             { base: 220000, margin: 0.40 },
    'soporte-8h':             { base: 380000, margin: 0.40 },
    'soporte-retainer':       { base: 750000, margin: 0.40 },
    'activos-levantamiento':  { base: 950000, margin: 0.60 },
    'activos-auditoria':      { base: 900000, margin: 0.80 },
    'tech-automatizacion':    { base: 800000, margin: 0.70 },
    'tech-diagnostico':       { base: 450000, margin: 0.50 },
    'branding-identidad':     { base: 800000, margin: 1.00 },
    'branding-community':     { base: 1000000, margin: 1.00 },
  };
  const IMMEDIACY = 0.20;
  const fmt = (n) => new Intl.NumberFormat('es-CO', { style: 'currency', currency: 'COP', minimumFractionDigits: 0, maximumFractionDigits: 0 }).format(Math.round(n));

  function setMoney(el, value) {
    if (!el) return;
    const prev = el.dataset.raw ? parseFloat(el.dataset.raw) : 0;
    el.dataset.raw = String(value);
    if (REDUCED || Math.abs(value - prev) < 1) { el.textContent = fmt(value); return; }
    const dur = 400; let start = null;
    const step = (now) => {
      if (!start) start = now;
      const p = Math.min((now - start) / dur, 1);
      el.textContent = fmt(prev + (value - prev) * (1 - Math.pow(1 - p, 3)));
      if (p < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
  }

  function recalculate() {
    const rate = rates[select.value];
    if (!rate) return;
    const has = urgency?.checked || false;
    const base = rate.base;
    const margin = base * rate.margin;
    const subtotal = base + margin;
    const urg = has ? subtotal * IMMEDIACY : 0;
    const total = subtotal + urg;
    setMoney(elBase, base);
    setMoney(elMargin, margin);
    setMoney(elUrg, urg);
    setMoney(elTotal, total);
    if (bBase && total > 0) {
      bBase.style.width = `${(base / total) * 100}%`;
      bMarg.style.width = `${(margin / total) * 100}%`;
      bUrg.style.width  = `${(urg / total) * 100}%`;
    }
  }

  select.addEventListener('change', recalculate);
  urgency?.addEventListener('change', recalculate);
  recalculate();
}

/* ── Contacto: evitar doble submit + estado "Enviando…" ─────── */
function initContactUX() {
  const form = $('#contact-form');
  if (!form) return;
  form.addEventListener('submit', () => {
    const btn = form.querySelector('button[type="submit"]');
    if (!btn) return;
    btn.dataset.label = btn.textContent.trim();
    btn.disabled = true;
    btn.textContent = 'Enviando…';
  });
}

/* ── Scroll progress + back to top + anchors con offset ─────── */
function initScrollUtils() {
  const bar = $('#scroll-progress');
  const btn = $('#back-to-top');

  const onScroll = () => {
    if (bar) {
      const h = document.documentElement.scrollHeight - window.innerHeight;
      bar.style.width = h > 0 ? `${(window.scrollY / h) * 100}%` : '0';
    }
    if (btn) btn.classList.toggle('visible', window.scrollY > 620);
  };
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  btn?.addEventListener('click', () => window.scrollTo({ top: 0, behavior: REDUCED ? 'auto' : 'smooth' }));

  $$('a[href^="#"]').forEach(a => {
    a.addEventListener('click', (e) => {
      const href = a.getAttribute('href');
      if (href === '#') return;
      const target = $(href);
      if (!target) return;
      e.preventDefault();
      const navH = $('#navbar')?.offsetHeight || 64;
      const top = target.getBoundingClientRect().top + window.scrollY - navH - 8;
      window.scrollTo({ top, behavior: REDUCED ? 'auto' : 'smooth' });
    });
  });
}

document.addEventListener('DOMContentLoaded', () => {
  initNavigation();
  initRevealSystem();
  initCounters();
  initPointerSpotlights();
  initMagnetic();
  initSectorSelector();
  initFlowLine();
  initCalculator();
  initContactUX();
  initScrollUtils();
});
