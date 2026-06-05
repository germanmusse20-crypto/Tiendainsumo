<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Plataforma premium para el control de inventarios, alertas de stock crítico y punto de venta de insumos agrícolas (semillas, fertilizantes, plaguicidas).">
    <title>AgroStock | Sistema Profesional de Inventario y Ventas Agrícolas</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🌱</text></svg>">

    <!-- CSS CDN Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    
    <!-- Custom CSS Stylesheet -->
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>

    <!-- ==========================================
       BARRA DE NAVEGACIÓN (NAVBAR)
    ========================================== -->
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                <span class="bg-success text-white p-2 rounded-3 d-inline-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                    <i class="bi bi-leaf"></i>
                </span>
                <span class="text-white">Agro<span class="text-success-emphasis text-decoration-none" style="color: var(--accent-sage) !important;">Stock</span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-2">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#inicio"><i class="bi bi-house-door me-1"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#caracteristicas"><i class="bi bi-shield-check me-1"></i> Beneficios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#simulador"><i class="bi bi-cpu me-1"></i> Simulador</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#categorias"><i class="bi bi-tags me-1"></i> Insumos</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <button class="btn btn-accent-amber w-100" data-bs-toggle="modal" data-bs-target="#loginModal">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Acceso al Sistema
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ==========================================
       SECCIÓN HERO
    ========================================== -->
    <section id="inicio" class="hero-section d-flex align-items-center">
        <div class="container mt-5 mt-lg-0">
            <div class="row align-items-center min-vh-100 py-5">
                <!-- Columna Izquierda: Información -->
                <div class="col-lg-6 mb-5 mb-lg-0 animate__animated animate__fadeInLeft">
                    <div class="badge-demo mb-3">
                        <i class="bi bi-stars"></i> Gestión de Inventario Inteligente v2.6
                    </div>
                    <h1 class="hero-title mb-4">Control de Stock y Ventas para Insumos Agrícolas</h1>
                    <p class="lead text-white-50 mb-5">
                        AgroStock es la solución tecnológica diseñada para semilleras, agroquímicas y distribuidoras de insumos. Registra ventas rápidas, monitorea el stock mínimo y evita la escasez de fertilizantes y semillas en temporada de siembra.
                    </p>
                    <div class="d-flex flex-column flex-sm-row gap-3">
                        <a href="#simulador" class="btn btn-accent-amber btn-lg px-4 py-3">
                            <i class="bi bi-play-circle me-2"></i>Probar Simulador
                        </a>
                        <button class="btn btn-outline-white btn-lg px-4 py-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                            <i class="bi bi-shield-lock me-2"></i>Entrar al Portal
                        </button>
                    </div>
                    
                    <!-- Pequeña fila de stats en Hero -->
                    <div class="row mt-5 pt-4 border-top border-secondary border-opacity-25">
                        <div class="col-6 col-sm-4">
                            <h4 class="text-white mb-1">99.8%</h4>
                            <p class="text-white-50 small">Precisión de Inventario</p>
                        </div>
                        <div class="col-6 col-sm-4">
                            <h4 class="text-white mb-1">Cero</h4>
                            <p class="text-white-50 small">Pérdida de Stock</p>
                        </div>
                    </div>
                </div>

                <!-- Columna Derecha: Mockup / Vista Previa -->
                <div class="col-lg-6 position-relative animate__animated animate__fadeInRight">
                    <!-- Badges Flotantes Decorativos -->
                    <div class="floating-badge badge-1">
                        <div class="d-flex align-items-center gap-2">
                            <span class="spinner-grow spinner-grow-sm text-success" role="status"></span>
                            <small class="fw-semibold">Urea Granulada: Ventas Activas</small>
                        </div>
                    </div>
                    
                    <div class="floating-badge badge-2">
                        <div class="d-flex align-items-center gap-2 text-warning">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            <small class="fw-semibold">Alerta: Stock Bajo Semillas</small>
                        </div>
                    </div>

                    <!-- Cuadro de la Demo -->
                    <div class="hero-dashboard-preview">
                        <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?q=80&w=1470&auto=format&fit=crop" class="img-fluid opacity-25 position-absolute w-100 h-100" style="object-fit: cover; z-index: 0;" alt="Fondo agrícola">
                        <div class="p-4 bg-dark bg-opacity-75 position-relative" style="z-index: 1;">
                            <div class="d-flex justify-content-between align-items-center border-bottom border-secondary border-opacity-50 pb-3 mb-4">
                                <div class="d-flex align-items-center gap-2">
                                    <span style="width: 12px; height: 12px;" class="bg-danger rounded-circle d-inline-block"></span>
                                    <span style="width: 12px; height: 12px;" class="bg-warning rounded-circle d-inline-block"></span>
                                    <span style="width: 12px; height: 12px;" class="bg-success rounded-circle d-inline-block"></span>
                                </div>
                                <span class="badge bg-success bg-opacity-25 text-success border border-success border-opacity-50">Terminal POS Habilitada</span>
                            </div>
                            
                            <!-- Mini Grid de stock del dashboard mock en Hero -->
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="p-3 bg-secondary bg-opacity-10 border border-secondary border-opacity-25 rounded-3">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="text-white-50 small">Movimiento Reciente</span>
                                            <span class="text-success small fw-semibold">+50 Sacos</span>
                                        </div>
                                        <h5 class="text-white mb-1">Abono Fertilizante NPK 15-15-15</h5>
                                        <div class="progress bg-dark" style="height: 6px;">
                                            <div class="progress-bar bg-success" style="width: 85%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-3 bg-secondary bg-opacity-10 border border-secondary border-opacity-25 rounded-3">
                                        <span class="text-white-50 small">Total Insumos</span>
                                        <h3 class="text-white mb-0 mt-1">1,240</h3>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-3 bg-secondary bg-opacity-10 border border-secondary border-opacity-25 rounded-3 text-warning">
                                        <span class="text-white-50 small">Alertas de Stock</span>
                                        <h3 class="text-warning mb-0 mt-1">3 Críticas</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================
       SECCIÓN DE CARACTERÍSTICAS / BENEFICIOS
    ========================================== -->
    <section id="caracteristicas" class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5 max-width-md mx-auto">
                <h6 class="text-uppercase text-success fw-bold tracking-wider mb-2">Características Clave</h6>
                <h2 class="h1 mb-3">Diseñado para el Negocio del Agro</h2>
                <p class="text-muted">Unificamos el almacén, la facturación rápida y las alertas de campo para mantener tu cadena de insumos en perfecto equilibrio.</p>
            </div>
            
            <div class="row g-4">
                <!-- Card 1 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card card-glass h-100 p-4">
                        <div class="feature-icon-wrapper">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <h4>Control de Stock Físico</h4>
                        <p class="text-muted small mb-0">Control exacto de sacos, envases de agroquímicos y herramientas con filtros por categorías agrícolas y lotes.</p>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card card-glass h-100 p-4">
                        <div class="feature-icon-wrapper">
                            <i class="bi bi-bell"></i>
                        </div>
                        <h4>Alertas Automáticas</h4>
                        <p class="text-muted small mb-0">Recibe notificaciones en rojo y amarillo cuando las semillas o pesticidas estén cerca de agotarse, previniendo quiebres de stock.</p>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card card-glass h-100 p-4">
                        <div class="feature-icon-wrapper">
                            <i class="bi bi-cart3"></i>
                        </div>
                        <h4>Facturación POS Rápida</h4>
                        <p class="text-muted small mb-0">Genera boletas y notas de venta al instante para agricultores. El stock se deduce de forma automatizada al vender.</p>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card card-glass h-100 p-4">
                        <div class="feature-icon-wrapper">
                            <i class="bi bi-bar-chart-line"></i>
                        </div>
                        <h4>Análisis de Temporada</h4>
                        <p class="text-muted small mb-0">Visualiza gráficos estadísticos del comportamiento de ventas y rotación de insumos de acuerdo a las épocas de cultivo.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================
       SECCIÓN INTERACTIVA: MOCK DASHBOARD & SIMULADOR
    ========================================== -->
    <section id="simulador" class="py-5 bg-light border-top border-bottom border-secondary border-opacity-10">
        <div class="container py-5">
            <div class="text-center mb-5">
                <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill mb-2">Módulo Interactivo en Vivo</span>
                <h2 class="h1">Simulador de Control de Inventario</h2>
                <p class="text-muted max-width-md mx-auto">Prueba cómo responde el sistema en tiempo real. Selecciona un producto agrícola abajo, simula su venta y observa los movimientos en el dashboard.</p>
            </div>

            <div class="row g-4 align-items-stretch">
                <!-- Columna Izquierda: El Mockup Dashboard -->
                <div class="col-lg-7">
                    <div class="dashboard-mockup h-100 d-flex flex-column">
                        <!-- Barra superior del dashboard -->
                        <div class="p-3 bg-light border-bottom d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center gap-2">
                                <span class="bg-success rounded-circle" style="width: 10px; height: 10px;"></span>
                                <span class="fw-bold text-dark small">Dashboard Administrativo</span>
                            </div>
                            <span class="small text-muted"><i class="bi bi-calendar3 me-1"></i> Hoy: <span id="currentDate">05/06/2026</span></span>
                        </div>
                        
                        <!-- Contenido Principal del Dashboard -->
                        <div class="p-4 flex-grow-1">
                            <!-- Fila KPIs -->
                            <div class="row g-3 mb-4">
                                <div class="col-6 col-md-3">
                                    <div class="dashboard-kpi-card text-center">
                                        <small class="text-muted text-uppercase d-block mb-1" style="font-size: 0.75rem;">Insumos Stock</small>
                                        <h4 class="mb-0 animated-counter" id="kpiTotalInsumos" data-target="1240">0</h4>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="dashboard-kpi-card text-center text-primary">
                                        <small class="text-muted text-uppercase d-block mb-1" style="font-size: 0.75rem;">Ventas Hoy</small>
                                        <h4 class="mb-0 text-primary fw-bold" id="kpiTotalVentas">$1.450,20</h4>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="dashboard-kpi-card text-center">
                                        <small class="text-muted text-uppercase d-block mb-1" style="font-size: 0.75rem;">Proveedores</small>
                                        <h4 class="mb-0 animated-counter" id="kpiTotalProveedores" data-target="18">0</h4>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="dashboard-kpi-card text-center text-danger">
                                        <small class="text-muted text-uppercase d-block mb-1" style="font-size: 0.75rem;">Alertas Stock</small>
                                        <h4 class="mb-0 text-danger fw-bold" id="kpiTotalAlertas">1 Activa</h4>
                                    </div>
                                </div>
                            </div>

                            <!-- Fila Gráficos y Tabla -->
                            <div class="row g-3">
                                <!-- Gráfico -->
                                <div class="col-md-5">
                                    <div class="p-3 border rounded-3 bg-white h-100">
                                        <h6 class="text-dark fw-bold mb-3 small"><i class="bi bi-pie-chart-fill text-success me-1"></i> Stock por Categorías</h6>
                                        <div style="height: 180px; position: relative;">
                                            <canvas id="inventoryChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Tabla de Últimos Movimientos -->
                                <div class="col-md-7">
                                    <div class="p-3 border rounded-3 bg-white h-100">
                                        <h6 class="text-dark fw-bold mb-3 small"><i class="bi bi-clock-history text-success me-1"></i> Últimos Movimientos (Kardex)</h6>
                                        <div class="table-responsive" style="max-height: 180px;">
                                            <table class="table table-sm table-hover align-middle" style="font-size: 0.8rem;">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Hora</th>
                                                        <th>Producto</th>
                                                        <th>Operación</th>
                                                        <th class="text-end">Cant.</th>
                                                        <th class="text-end">Valor</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="movementsTableBody">
                                                    <!-- Movimiento 1 Inicial -->
                                                    <tr>
                                                        <td><small class="text-muted">11:32:00</small></td>
                                                        <td><strong>Semilla Maíz DEKALB</strong></td>
                                                        <td><span class="badge bg-danger">Salida</span></td>
                                                        <td class="text-end fw-semibold">-2 bolsas</td>
                                                        <td class="text-end text-success fw-semibold">$250.00</td>
                                                    </tr>
                                                    <!-- Movimiento 2 Inicial -->
                                                    <tr>
                                                        <td><small class="text-muted">10:45:00</small></td>
                                                        <td><strong>Urea Granulada 46%</strong></td>
                                                        <td><span class="badge bg-success">Entrada</span></td>
                                                        <td class="text-end fw-semibold">+15 sacos</td>
                                                        <td class="text-end text-success fw-semibold">$341.25</td>
                                                    </tr>
                                                    <!-- Movimiento 3 Inicial -->
                                                    <tr>
                                                        <td><small class="text-muted">09:15:00</small></td>
                                                        <td><strong>Glifosato Concentrado 1L</strong></td>
                                                        <td><span class="badge bg-danger">Salida</span></td>
                                                        <td class="text-end fw-semibold">-3 litros</td>
                                                        <td class="text-end text-success fw-semibold">$56.70</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Columna Derecha: Widget del Simulador -->
                <div class="col-lg-5">
                    <div class="card card-glass simulator-card h-100 p-4 d-flex flex-column justify-content-between">
                        <!-- Toast / Caja de alertas dinámicas integradas en el widget -->
                        <div id="simAlertToast" class="alert alert-warning alert-toast" role="alert">
                            <i class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" style="font-size: 1.25rem;"></i>
                            <div>
                                <span id="simAlertMsg">Aviso de Stock Crítico</span>
                            </div>
                            <button type="button" class="btn-close ms-auto" id="simAlertClose" aria-label="Close"></button>
                        </div>

                        <div>
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h3 class="mb-0 text-dark"><i class="bi bi-sliders text-success me-2"></i>Consola de Venta</h3>
                                <span class="badge bg-success bg-opacity-25 text-success">Interactivo</span>
                            </div>
                            
                            <p class="text-muted small mb-4">
                                Utiliza esta consola para registrar una salida/venta de producto al instante. Si el stock desciende del límite mínimo, se disparará una alerta inmediata en el panel de control.
                            </p>

                            <!-- Selección de Insumo -->
                            <div class="mb-4">
                                <label for="simulatorProductSelect" class="form-label fw-bold text-dark small">1. Seleccionar Insumo del Inventario</label>
                                <select class="form-select border-2" id="simulatorProductSelect">
                                    <option value="insumo-1">Urea Granulada 46% (50kg) - [Fertilizante]</option>
                                    <option value="insumo-2">Semilla Maíz Híbrido DEKALB - [Semilla]</option>
                                    <option value="insumo-3" selected>Glifosato Concentrado (1L) - [Plaguicida]</option>
                                </select>
                            </div>

                            <!-- Tarjeta de Detalles del Insumo Seleccionado -->
                            <div class="p-3 bg-light rounded-3 border mb-4">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <span class="badge bg-secondary text-uppercase mb-1" id="simProductCategory" style="font-size: 0.65rem;">Categoría</span>
                                        <h5 class="text-dark mb-0 fw-bold" id="simProductName">Cargando producto...</h5>
                                    </div>
                                    <div class="col-4 text-end">
                                        <span class="text-muted small">Mínimo Requerido</span>
                                        <div class="fw-bold text-danger" id="simProductMin">10 unidades</div>
                                    </div>
                                </div>

                                <!-- Barra de Progreso y Medidor Visual de Stock -->
                                <div class="mt-3">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="small fw-semibold text-muted">Nivel de Almacén:</span>
                                        <span class="fw-bold text-success" id="simProductStock">30 unidades</span>
                                    </div>
                                    <div class="stock-meter-container">
                                        <div class="stock-meter-bar bg-success" id="simStockMeter" style="width: 80%;"></div>
                                    </div>
                                    <div id="simStockStatus" class="small mt-2 text-success">Estado óptimo</div>
                                </div>
                            </div>
                        </div>

                        <!-- Botones de Acción de Simulación -->
                        <div class="d-flex gap-2 pt-3 border-top mt-auto">
                            <button type="button" class="btn btn-primary-green flex-grow-1 py-3" id="btnSimSell">
                                <i class="bi bi-cart-dash-fill me-2"></i>Vender 1 Unidad
                            </button>
                            <button type="button" class="btn btn-outline-secondary px-3 py-3" id="btnSimRestock" title="Completar stock al máximo">
                                <i class="bi bi-arrow-repeat me-1"></i> Reabastecer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================
       SECCIÓN DE CATEGORÍAS DE INSUMOS
    ========================================== -->
    <section id="categorias" class="py-5 bg-white">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h6 class="text-uppercase text-success fw-bold tracking-wider mb-2">Catálogo General</h6>
                <h2 class="h1">Tipos de Insumos Controlados</h2>
                <p class="text-muted max-width-md mx-auto">La plataforma está parametrizada para los principales insumos necesarios para garantizar la productividad del sector agrícola.</p>
            </div>

            <div class="row g-4">
                <!-- Categoría 1: Semillas -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden text-center card-glass">
                        <img src="https://images.unsplash.com/photo-1530595467537-0b5996c41f2d?q=80&w=1470&auto=format&fit=crop" class="card-img-top" style="height: 160px; object-fit: cover;" alt="Semillas agrícolas">
                        <div class="card-body p-4">
                            <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex p-3 mb-3">
                                <i class="bi bi-flower1" style="font-size: 1.5rem;"></i>
                            </div>
                            <h5 class="card-title fw-bold text-dark">Semillas Certificadas</h5>
                            <p class="card-text text-muted small">Monitoreo de sacos de semillas de maíz, trigo, soya, y hortalizas, controlando porcentaje de germinación y fechas de envasado.</p>
                        </div>
                    </div>
                </div>

                <!-- Categoría 2: Fertilizantes -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden text-center card-glass">
                        <img src="https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?q=80&w=1632&auto=format&fit=crop" class="card-img-top" style="height: 160px; object-fit: cover;" alt="Fertilizantes">
                        <div class="card-body p-4">
                            <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex p-3 mb-3">
                                <i class="bi bi-box-fill" style="font-size: 1.5rem;"></i>
                            </div>
                            <h5 class="card-title fw-bold text-dark">Abonos y Nutrición</h5>
                            <p class="card-text text-muted small">Administración de stock de Urea, NPK, micronutrientes y fertilizantes orgánicos en formatos de sacos, sacas o toneladas.</p>
                        </div>
                    </div>
                </div>

                <!-- Categoría 3: Plaguicidas -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden text-center card-glass">
                        <img src="https://images.unsplash.com/photo-1595974482597-4b8da8879bc5?q=80&w=1470&auto=format&fit=crop" class="card-img-top" style="height: 160px; object-fit: cover;" alt="Agroquímicos">
                        <div class="card-body p-4">
                            <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex p-3 mb-3">
                                <i class="bi bi-droplet-half" style="font-size: 1.5rem;"></i>
                            </div>
                            <h5 class="card-title fw-bold text-dark">Defensa Agrícola</h5>
                            <p class="card-text text-muted small">Control riguroso de herbicidas, fungicidas e insecticidas. Almacenamiento seguro vigilando lotes, toxicidad y fechas de expiración.</p>
                        </div>
                    </div>
                </div>

                <!-- Categoría 4: Herramientas -->
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden text-center card-glass">
                        <img src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?q=80&w=1470&auto=format&fit=crop" class="card-img-top" style="height: 160px; object-fit: cover;" alt="Herramientas agrícolas">
                        <div class="card-body p-4">
                            <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex p-3 mb-3">
                                <i class="bi bi-tools" style="font-size: 1.5rem;"></i>
                            </div>
                            <h5 class="card-title fw-bold text-dark">Riego y Maquinaria</h5>
                            <p class="card-text text-muted small">Registro de aspersores, herramientas manuales, repuestos de tractores e implementos de campo con código de barras.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================
       SECCIÓN BANNER DE CONTACTO/CTA
    ========================================== -->
    <section class="py-5 text-white" style="background: linear-gradient(135deg, var(--medium-green) 0%, var(--primary-green) 100%);">
        <div class="container py-4 text-center">
            <h2 class="h1 fw-bold mb-3">¿Listo para modernizar tu agro-comercio?</h2>
            <p class="lead text-white-50 max-width-md mx-auto mb-4">Agenda una asesoría técnica gratuita con nuestros ingenieros de soporte para estructurar las categorías de tu almacén hoy mismo.</p>
            <button class="btn btn-accent-amber btn-lg px-5 py-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                <i class="bi bi-telephone-outbound me-2"></i> Solicitar Información del Sistema
            </button>
        </div>
    </section>

    <!-- ==========================================
       PIE DE PÁGINA (FOOTER)
    ========================================== -->
    <footer class="bg-dark text-white-50 py-5 border-top border-secondary border-opacity-10">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <a class="navbar-brand d-flex align-items-center gap-2 justify-content-center justify-content-md-start mb-3" href="#">
                        <span class="bg-success text-white p-2 rounded-3 d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                            <i class="bi bi-leaf"></i>
                        </span>
                        <span class="text-white fw-bold">AgroStock</span>
                    </a>
                    <p class="small mb-0">Sistema integral para la administración, ventas y control de stock de insumos para el agro a nivel nacional.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="mb-3">
                        <a href="#" class="text-white-50 text-decoration-none mx-2 hover-white"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white-50 text-decoration-none mx-2 hover-white"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="text-white-50 text-decoration-none mx-2 hover-white"><i class="bi bi-linkedin"></i></a>
                    </div>
                    <p class="small mb-0">&copy; 2026 AgroStock Inc. Todos los derechos reservados. | Diseñado a nivel Profesional</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- ==========================================
       MODAL DE INICIO DE SESIÓN (LOGIN MODAL)
    ========================================== -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-login-content">
                <!-- Cabecera con Degradado -->
                <div class="modal-header modal-login-header flex-column align-items-center position-relative">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="bg-white text-success rounded-circle d-flex align-items-center justify-content-center mb-3 shadow" style="width: 60px; height: 60px;">
                        <i class="bi bi-shield-lock-fill" style="font-size: 1.75rem;"></i>
                    </div>
                    <h4 class="modal-title fw-bold text-center" id="loginModalLabel">Acceso al Sistema</h4>
                    <p class="small text-white-50 mb-0">Portal de Identificación de AgroStock</p>
                </div>

                <!-- Cuerpo del Modal -->
                <div class="modal-body p-4 bg-white">
                    <!-- Selector de Roles Rápido -->
                    <label class="form-label fw-bold text-dark small mb-3">1. Seleccionar Rol de Acceso (Demostración)</label>
                    <div class="row g-2 mb-4">
                        <div class="col-4">
                            <div class="role-selector-btn text-center active" data-role="admin">
                                <i class="bi bi-person-workspace d-block mb-1 text-success" style="font-size: 1.25rem;"></i>
                                <span style="font-size: 0.75rem;" class="fw-semibold">Admin</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="role-selector-btn text-center" data-role="almacen">
                                <i class="bi bi-building-up d-block mb-1 text-primary" style="font-size: 1.25rem;"></i>
                                <span style="font-size: 0.75rem;" class="fw-semibold">Almacén</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="role-selector-btn text-center" data-role="ventas">
                                <i class="bi bi-cash-coin d-block mb-1 text-amber" style="font-size: 1.25rem; color: var(--accent-amber);"></i>
                                <span style="font-size: 0.75rem;" class="fw-semibold">Vendedor</span>
                            </div>
                        </div>
                    </div>

                    <!-- Formulario de Acceso -->
                    <form action="#" method="POST" onsubmit="event.preventDefault(); alert('¡Autenticación simulada con éxito! Accediendo al sistema...');">
                        <div class="mb-3">
                            <h6 id="loginRoleTitle" class="text-success small fw-bold mb-3">Ingresar como Administrador del Sistema</h6>
                            <label for="loginEmail" class="form-label small fw-semibold text-muted">Correo Electrónico</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-2 border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                                <input type="email" class="form-control border-2 border-start-0" id="loginEmail" value="administrador@agrostock.com" placeholder="ejemplo@agrostock.com" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="d-flex justify-content-between">
                                <label for="loginPassword" class="form-label small fw-semibold text-muted">Contraseña</label>
                                <a href="#" class="small text-decoration-none text-success">¿La olvidaste?</a>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-2 border-end-0"><i class="bi bi-key text-muted"></i></span>
                                <input type="password" class="form-control border-2 border-start-0" id="loginPassword" value="admin2026" placeholder="Ingrese clave" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary-green w-100 py-3 mb-2">
                            <i class="bi bi-check2-circle me-2"></i>Iniciar Sesión en el Portal
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JS CDN Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Custom JS Dashboard Simulator Logic -->
    <script src="js/dashboard.js"></script>
</body>
</html>
