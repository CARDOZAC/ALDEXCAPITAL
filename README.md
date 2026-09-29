# ALDEX CAPITAL — Landing Page

**Stack:** PHP 8.1+ | Vanilla JS | CSS Custom Properties | Apache/Nginx

---

## Estructura del Proyecto

```
ALDEX CAPITAL/
├── index.php                    ← Punto de entrada único
├── .htaccess                    ← Configuración Apache
├── config/
│   └── config.php               ← Constantes globales
├── src/
│   ├── controllers/
│   │   └── ContactController.php
│   ├── helpers/
│   │   ├── SecurityHelper.php   ← XSS, CSRF, sanitización
│   │   └── ViewHelper.php       ← Iconos SVG, formateo
│   ├── models/
│   │   └── ServicesModel.php    ← Datos de servicios
│   └── views/
│       └── partials/
│           ├── head.php
│           ├── navbar.php
│           ├── hero.php
│           ├── metrics.php
│           ├── services.php
│           ├── calculator.php
│           ├── sectors.php
│           ├── trust.php
│           ├── contact.php
│           └── footer.php
└── public/
    ├── css/styles.css
    ├── js/main.js
    └── images/
        ├── logo_slogan.png
        ├── logo_3d.png
        └── logo_white.jpg
```

---

## Requisitos del Servidor

- PHP 8.1 o superior
- Apache 2.4+ con mod_rewrite habilitado
- OpenSSL habilitado (para CSRF tokens seguros)

---

## Instalación

1. Sube todo el contenido a tu servidor vía FTP/SFTP o Git.
2. Apunta el DocumentRoot al directorio raíz del proyecto.
3. Activa `mod_rewrite` en Apache.
4. Edita `config/config.php` con los datos reales:
   - `APP_URL`
   - `CONTACT_EMAIL`
   - `CONTACT_PHONE`
   - `CONTACT_WHATSAPP`
5. Crea el directorio `logs/` con permisos 750:
   ```bash
   mkdir -p logs && chmod 750 logs
   ```
6. En producción, cambia `APP_ENV` a `'production'`.

---

## Seguridad incluida

- Protección CSRF con tokens de sesión
- Sanitización XSS en todos los outputs
- Headers HTTP de seguridad (X-Frame-Options, CSP, etc.)
- Acceso bloqueado a directorios internos vía .htaccess
- Cookies de sesión con HttpOnly + SameStrict
- Sin frameworks externos, sin superficie de ataque innecesaria

---

## Personalización

**Cambiar servicios:** edita `src/models/ServicesModel.php`

**Cambiar colores:** modifica las variables CSS en `public/css/styles.css` bajo `:root`

**Agregar email real:** en `src/controllers/ContactController.php`, reemplaza el método `logContact()` por integración con PHPMailer o SMTP nativo.

---

## Integración de Email (producción)

Instala PHPMailer:
```bash
composer require phpmailer/phpmailer
```

Luego en `ContactController::logContact()`:
```php
use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host       = 'smtp.tuproveedor.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'contacto@jacomcore.com';
$mail->Password   = 'TU_PASSWORD';
$mail->SMTPSecure = 'tls';
$mail->Port       = 587;
$mail->setFrom('contacto@jacomcore.com', 'JACOM CORE');
$mail->addAddress('davidcardozacaballero@gmail.com', 'David');
$mail->Subject = "Nueva consulta JACOM CORE de $name";
$mail->Body    = "Nombre: $name\nEmail: $email\nEmpresa: $company\nMensaje: $message";
$mail->send();
```

---

## Mantenimiento y Keep-Alive en Render (Plan Gratuito)

Para evitar que el servicio gratuito de Render entre en estado de inactividad (spin down) tras 15 minutos sin tráfico, el proyecto incluye un endpoint ultrarrápido y liviano en `/health`:

### Configuración en Render:
- **Health Check Path:** `/health`
- Devuelve estado HTTP `200` y cuerpo `ok` en menos de 200 ms.
- Sin acceso a base de datos, sin iniciar sesión de PHP y sin generar registros de log.
- Incluye el header `Cache-Control: no-store`.

### Monitoreo Externo e Integración:
1. **GitHub Actions Workflow:** El archivo `.github/workflows/keep-alive.yml` ejecuta una solicitud cron cada 5 minutos (`*/5 * * * *`) mediante `curl` hacia `https://aldexcapital.onrender.com/health`.
2. **UptimeRobot / Monitor Externo (Recomendado):**
   - **URL:** `https://aldexcapital.onrender.com/health`
   - **Tipo:** HTTP(s) / HEAD o GET
   - **Intervalo:** 5 minutos

---

**ALDEX CAPITAL** — Precisión operativa, máxima confidencialidad.
