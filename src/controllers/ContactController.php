<?php
/**
 * JACOM CORE - Controlador de Contacto
 * Maneja el procesamiento del formulario de contacto
 */

declare(strict_types=1);

class ContactController
{
    private array $errors = [];
    private bool  $success = false;

    /**
     * Procesa la solicitud POST del formulario de contacto
     */
    public function handle(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return;
        }

        // Validar CSRF
        $token = $_POST['csrf_token'] ?? '';
        if (!SecurityHelper::validateCsrfToken($token)) {
            $this->errors[] = 'Token de seguridad inválido. Por favor recarga la página.';
            return;
        }

        // Sanitizar y validar campos
        $name    = SecurityHelper::sanitizeText($_POST['name'] ?? '');
        $email   = SecurityHelper::sanitizeEmail($_POST['email'] ?? '');
        $company = SecurityHelper::sanitizeText($_POST['company'] ?? '');
        $service = SecurityHelper::sanitizeText($_POST['service'] ?? '');
        $message = SecurityHelper::sanitizeText($_POST['message'] ?? '');

        // Validaciones
        if (empty($name) || strlen($name) < 3) {
            $this->errors[] = 'El nombre debe tener al menos 3 caracteres.';
        }

        if (!SecurityHelper::isValidEmail($email)) {
            $this->errors[] = 'Por favor ingresa un correo electrónico válido.';
        }

        if (empty($message) || strlen($message) < 20) {
            $this->errors[] = 'El mensaje debe tener al menos 20 caracteres.';
        }

        if (empty($this->errors)) {
            // En producción: enviar email real con PHPMailer o similar
            // Por ahora registramos en log seguro
            $this->logContact($name, $email, $company, $service, $message);
            $this->success = true;

            // Regenerar token CSRF tras éxito
            unset($_SESSION['csrf_token']);
        }
    }

    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }

    /**
     * Log seguro de contacto (reemplazar con email en producción)
     */
    private function logContact(
        string $name,
        string $email,
        string $company,
        string $service,
        string $message
    ): void {
        $logDir  = dirname(__DIR__, 2) . '/logs';
        $logFile = $logDir . '/contacts.log';

        if (!is_dir($logDir)) {
            mkdir($logDir, 0750, true);
        }

        $entry = sprintf(
            "[%s] Nombre: %s | Email: %s | Empresa: %s | Servicio: %s | Mensaje: %s\n",
            date('Y-m-d H:i:s'),
            $name, $email, $company, $service,
            substr($message, 0, 200)
        );

        file_put_contents($logFile, $entry, FILE_APPEND | LOCK_EX);
    }
}
