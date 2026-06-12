<?php
session_start();

// Retrieve errors or success messages
$errorMessage = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
$successMessage = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '';

// Retrieve form values to preserve inputs on error
$formData = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : [];

// Clear the session messages
unset($_SESSION['error_message']);
unset($_SESSION['success_message']);
unset($_SESSION['form_data']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Registro de nuevos usuarios y empleados de AgroStock. Control de inventario agrícola.">
    <title>Registro de Usuario | AgroStock</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🌱</text></svg>">

    <!-- CSS CDN Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    
    <!-- Custom CSS (Relative path from view/auth/ to Public/css/) -->
    <link rel="stylesheet" href="../../Public/css/custom.css">
</head>
<body>

    <div class="container-fluid p-0 overflow-hidden">
        <div class="row g-0 min-vh-100">
            <!-- PANEL IZQUIERDO: Branding e Imagen de Fondo (Oculto en Móvil) -->
            <div class="col-lg-6 d-none d-lg-flex auth-bg-panel" style="background-image: url('https://images.unsplash.com/photo-1599599810769-bcde5a160d32?q=80&w=1470&auto=format&fit=crop');">
                <div class="auth-overlay"></div>
                <div class="auth-bg-content animate__animated animate__fadeIn">
                    <div class="d-flex align-items-center gap-2 mb-4">
                        <span class="bg-success text-white p-2 rounded-3 d-inline-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                            <i class="bi bi-leaf" style="font-size: 1.25rem;"></i>
                        </span>
                        <h2 class="text-white mb-0 fw-bold">AgroStock</h2>
                    </div>
                    <h1 class="display-5 fw-extrabold mb-4" style="font-family: var(--font-heading); line-height: 1.2;">Únete a la Red de Abastecimiento Tecnológico</h1>
                    <p class="lead text-white-50 mb-5">Administra los productos de tus proveedores, controla la rotación de semillas y realiza auditorías de almacén con las mejores herramientas.</p>
                    
                    <div class="border-top border-white border-opacity-10 pt-4 mt-4">
                        <blockquote class="blockquote text-white-70 italic small">
                            "Conectamos los flujos de stock y facturación para que los ingenieros y bodegueros trabajen con datos exactos del inventario físico."
                        </blockquote>
                        <figcaption class="blockquote-footer text-success-emphasis mt-2" style="color: var(--accent-sage) !important;">
                            Tecnología AgroStock
                        </figcaption>
                    </div>
                </div>
            </div>

            <!-- PANEL DERECHO: Formulario de Registro -->
            <div class="col-lg-6 auth-form-panel animate__animated animate__fadeIn">
                <div class="auth-card-body">
                    <!-- Cabecera y Título -->
                    <div class="text-center mb-4">
                        <a href="../../Public/index.php" class="d-inline-flex align-items-center gap-2 text-decoration-none mb-3">
                            <span class="bg-success text-white p-2 rounded-3 d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="bi bi-leaf"></i>
                            </span>
                            <span class="fs-3 fw-bold text-dark">Agro<span class="text-success">Stock</span></span>
                        </a>
                        <h2 class="fw-bold text-dark">Registro de Empleado</h2>
                        <p class="text-muted small">Crea una cuenta para operar en los módulos autorizados</p>
                    </div>

                    <?php if (!empty($errorMessage)): ?>
                        <div class="alert alert-danger border-2 d-flex align-items-center gap-2 mb-4 animate__animated animate__fadeIn" role="alert">
                            <i class="bi bi-exclamation-octagon-fill fs-5"></i>
                            <div><?php echo $errorMessage; ?></div>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($successMessage)): ?>
                        <div class="alert alert-success border-2 d-flex align-items-center gap-2 mb-4 animate__animated animate__fadeIn" role="alert">
                            <i class="bi bi-check-circle-fill fs-5"></i>
                            <div><?php echo $successMessage; ?></div>
                        </div>
                    <?php endif; ?>

                    <!-- Formulario de Registro -->
                    <form id="registerForm" action="../../Controllers/auth/registrecontroller.php" method="POST">
                        <!-- Nombre Completo -->
                        <div class="mb-3">
                            <label for="registerName" class="form-label small fw-semibold text-muted">Nombre Completo</label>
                            <div class="auth-input-group">
                                <span class="input-icon"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control" id="registerName" name="nombre" placeholder="Juan Pérez" value="<?php echo htmlspecialchars(isset($formData['nombre']) ? $formData['nombre'] : ''); ?>" required>
                            </div>
                        </div>

                        <!-- Correo Electrónico -->
                        <div class="mb-3">
                            <label for="registerEmail" class="form-label small fw-semibold text-muted">Correo Electrónico Institucional</label>
                            <div class="auth-input-group">
                                <span class="input-icon"><i class="bi bi-envelope"></i></span>
                                <input type="email" class="form-control" id="registerEmail" name="email" placeholder="juan.perez@agrostock.com" value="<?php echo htmlspecialchars(isset($formData['email']) ? $formData['email'] : ''); ?>" required>
                            </div>
                        </div>

                        <!-- Rol de Empleado -->
                        <div class="mb-3">
                            <label for="registerRole" class="form-label small fw-semibold text-muted">Cargo / Rol en la Empresa</label>
                            <div class="auth-input-group">
                                <span class="input-icon"><i class="bi bi-person-badge"></i></span>
                                <select class="form-select" id="registerRole" name="id_rol" style="padding-left: 2.75rem; border: 2px solid #e2e8f0; border-radius: 10px; font-weight: 500; height: 49px;" required>
                                    <option value="" disabled <?php echo !isset($formData['id_rol']) ? 'selected' : ''; ?>>Seleccione un cargo...</option>
                                    <option value="1" <?php echo (isset($formData['id_rol']) && $formData['id_rol'] == 1) ? 'selected' : ''; ?>>Administrador del Almacén</option>
                                    <option value="2" <?php echo (isset($formData['id_rol']) && $formData['id_rol'] == 2) ? 'selected' : ''; ?>>Encargado de Bodega / Stock</option>
                                    <option value="3" <?php echo (isset($formData['id_rol']) && $formData['id_rol'] == 3) ? 'selected' : ''; ?>>Cajero / Vendedor de Punto de Venta</option>
                                </select>
                            </div>
                        </div>

                        <!-- Contraseña -->
                        <div class="mb-3">
                            <label for="registerPassword" class="form-label small fw-semibold text-muted">Contraseña</label>
                            <div class="auth-input-group">
                                <span class="input-icon"><i class="bi bi-key"></i></span>
                                <input type="password" class="form-control" id="registerPassword" name="password" placeholder="Clave fuerte" required>
                                <button type="button" class="password-toggle" title="Mostrar/Ocultar contraseña">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            <!-- Medidor de Fuerza de Clave -->
                            <div class="password-strength-meter">
                                <div class="password-strength-bar"></div>
                            </div>
                            <div class="form-text text-muted" style="font-size: 0.75rem;">Mínimo 6 caracteres con letras y números.</div>
                        </div>

                        <!-- Confirmar Contraseña -->
                        <div class="mb-4">
                            <label for="registerPasswordConfirm" class="form-label small fw-semibold text-muted">Confirmar Contraseña</label>
                            <div class="auth-input-group">
                                <span class="input-icon"><i class="bi bi-key"></i></span>
                                <input type="password" class="form-control" id="registerPasswordConfirm" name="password_confirm" placeholder="Repetir clave" required>
                                <button type="button" class="password-toggle" title="Mostrar/Ocultar contraseña">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback" style="font-size: 0.75rem;">Las contraseñas no coinciden.</div>
                            <div class="valid-feedback" style="font-size: 0.75rem;">Las contraseñas coinciden perfectamente.</div>
                        </div>

                        <!-- Términos -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="termsCheck" required>
                                <label class="form-check-label text-muted small" for="termsCheck">
                                    Acepto las normas de seguridad del almacén de AgroStock.
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary-green w-100 py-3 mb-4">
                            <i class="bi bi-person-plus-fill me-2"></i>Registrar Cuenta
                        </button>
                    </form>

                    <!-- Enlace a Login y Volver -->
                    <div class="text-center border-top pt-3">
                        <p class="small text-muted mb-2">¿Ya tiene un usuario registrado? 
                            <a href="login.php" class="text-success fw-bold text-decoration-none">Iniciar Sesión</a>
                        </p>
                        <a href="../../Public/index.php" class="btn btn-link btn-sm text-decoration-none text-muted mt-1">
                            <i class="bi bi-arrow-left me-1"></i> Volver a la Presentación
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS CDN Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- Custom JS for Auth Logic -->
    <script src="../../Public/js/auth.js"></script>
</body>
</html>
