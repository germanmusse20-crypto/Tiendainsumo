<?php
session_start();
$errorMessage = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
$successMessage = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '';

unset($_SESSION['error_message']);
unset($_SESSION['success_message']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portal de inicio de sesión de AgroStock. Control de inventario y ventas de insumos agrícolas.">
    <title>Iniciar Sesión | AgroStock</title>
    
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
            <div class="col-lg-6 d-none d-lg-flex auth-bg-panel" style="background-image: url('https://images.unsplash.com/photo-1464226184884-fa280b87c399?q=80&w=1470&auto=format&fit=crop');">
                <div class="auth-overlay"></div>
                <div class="auth-bg-content animate__animated animate__fadeIn">
                    <div class="d-flex align-items-center gap-2 mb-4">
                        <span class="bg-success text-white p-2 rounded-3 d-inline-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                            <i class="bi bi-leaf" style="font-size: 1.25rem;"></i>
                        </span>
                        <h2 class="text-white mb-0 fw-bold">AgroStock</h2>
                    </div>
                    <h1 class="display-5 fw-extrabold mb-4" style="font-family: var(--font-heading); line-height: 1.2;">Sembrando Eficiencia en Cada Rincón de tu Almacén</h1>
                    <p class="lead text-white-50 mb-5">El sistema integral que optimiza el stock, alerta la falta de semillas y fertilizantes y agiliza las ventas en campo.</p>
                    
                    <div class="border-top border-white border-opacity-10 pt-4 mt-4">
                        <blockquote class="blockquote text-white-70 italic small">
                            "La tecnología aplicada a la distribución agrícola nos permite garantizar el abastecimiento a los agricultores en las temporadas más críticas."
                        </blockquote>
                        <figcaption class="blockquote-footer text-success-emphasis mt-2" style="color: var(--accent-sage) !important;">
                            Ing. Agrónomo de AgroStock
                        </figcaption>
                    </div>
                </div>
            </div>

            <!-- PANEL DERECHO: Formulario de Login -->
            <div class="col-lg-6 auth-form-panel animate__animated animate__fadeIn">
                <div class="auth-card-body">
                    <!-- Cabecera Móvil y Título -->
                    <div class="text-center mb-4">
                        <a href="../../Public/index.php" class="d-inline-flex align-items-center gap-2 text-decoration-none mb-3">
                            <span class="bg-success text-white p-2 rounded-3 d-inline-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="bi bi-leaf"></i>
                            </span>
                            <span class="fs-3 fw-bold text-dark">Agro<span class="text-success">Stock</span></span>
                        </a>
                        <h2 class="fw-bold text-dark">Ingreso al Sistema</h2>
                        <p class="text-muted small">Administración de inventario y facturación agrícola</p>
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

                    <!-- Formulario de Acceso -->
                    <form action="#" method="POST" onsubmit="event.preventDefault(); alert('¡Autenticación exitosa! Accediendo al sistema...');">
                        <div class="mb-3">
                            <h6 id="loginRoleTitle" class="text-success small fw-bold mb-3"><i class="bi bi-shield-check me-1"></i>Ingreso Autorizado</h6>
                            
                            <label for="loginEmail" class="form-label small fw-semibold text-muted">Correo Electrónico</label>
                            <div class="auth-input-group">
                                <span class="input-icon"><i class="bi bi-envelope"></i></span>
                                <input type="email" class="form-control" id="loginEmail" placeholder="nombre@agrostock.com" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-1">
                                <label for="loginPassword" class="form-label small fw-semibold text-muted mb-0">Contraseña</label>
                                <a href="#" class="small text-decoration-none text-success">¿Olvidó su contraseña?</a>
                            </div>
                            <div class="auth-input-group">
                                <span class="input-icon"><i class="bi bi-key"></i></span>
                                <input type="password" class="form-control" id="loginPassword" placeholder="Clave de seguridad" required>
                                <button type="button" class="password-toggle" title="Mostrar/Ocultar contraseña">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label text-muted small" for="rememberMe">
                                    Recordar sesión en esta PC
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary-green w-100 py-3 mb-4">
                            <i class="bi bi-shield-lock-fill me-2"></i>Iniciar Sesión
                        </button>
                    </form>

                    <!-- Enlace a Registro y Volver -->
                    <div class="text-center border-top pt-3">
                        <p class="small text-muted mb-2">¿Es un nuevo empleado? 
                            <a href="register.php" class="text-success fw-bold text-decoration-none">Crear una Cuenta</a>
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
