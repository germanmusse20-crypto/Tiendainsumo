/**
 * AGROSTOCK - SISTEMA DE INVENTARIO Y VENTAS DE INSUMOS AGRÍCOLAS
 * Lógica de Interacción y Simulación de Stock
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. ANIMACIÓN DE CONTADORES NUMÉRICOS
    const animateCounters = () => {
        const counters = document.querySelectorAll('.animated-counter');
        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            const duration = 1500; // ms
            const step = target / (duration / 16); // ~60fps
            
            let current = 0;
            const updateCount = () => {
                current += step;
                if (current < target) {
                    counter.innerText = Math.floor(current).toLocaleString();
                    requestAnimationFrame(updateCount);
                } else {
                    counter.innerText = target.toLocaleString();
                }
            };
            updateCount();
        });
    };
    animateCounters();

    // 2. CONFIGURACIÓN DE GRÁFICO INTERACTIVO (Chart.js)
    const ctx = document.getElementById('inventoryChart');
    let inventoryChart;
    
    if (ctx) {
        inventoryChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Fertilizantes', 'Semillas', 'Plaguicidas', 'Herramientas', 'Sistemas de Riego'],
                datasets: [{
                    label: 'Distribución de Insumos',
                    data: [420, 310, 240, 150, 120],
                    backgroundColor: [
                        '#1b4332', // Forest green
                        '#2d6a4f', // Leaf green
                        '#40916c', // Medium green
                        '#74c69d', // Light sage
                        '#d97706'  // Earth amber
                    ],
                    borderColor: '#ffffff',
                    borderWidth: 2,
                    hoverOffset: 12
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                family: 'Inter',
                                size: 12
                            },
                            color: '#1e293b'
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += context.raw + ' sacos/unidades';
                                return label;
                            }
                        }
                    }
                },
                cutout: '65%'
            }
        });
    }

    // 3. SIMULADOR DE CONTROL DE STOCK DE INSUMOS
    // Estado inicial de los productos del simulador
    const initialProducts = [
        {
            id: 'insumo-1',
            nombre: 'Urea Granulada 46% (50kg)',
            categoria: 'Fertilizantes',
            stock: 35,
            stockMax: 50,
            stockMin: 15,
            unidad: 'sacos',
            precio: 32.50
        },
        {
            id: 'insumo-2',
            nombre: 'Semilla Maíz Híbrido DEKALB',
            categoria: 'Semillas',
            stock: 12,
            stockMax: 30,
            stockMin: 8,
            unidad: 'bolsas',
            precio: 125.00
        },
        {
            id: 'insumo-3',
            nombre: 'Glifosato Concentrado (1L)',
            categoria: 'Plaguicidas',
            stock: 9,
            stockMax: 25,
            stockMin: 10, // Comienza por debajo del mínimo para mostrar alerta inicial
            unidad: 'litros',
            precio: 18.90
        }
    ];

    // Clonamos los productos al estado de ejecución
    let products = JSON.parse(JSON.stringify(initialProducts));

    // Elementos del DOM del simulador
    const simulatorSelect = document.getElementById('simulatorProductSelect');
    const simName = document.getElementById('simProductName');
    const simCategory = document.getElementById('simProductCategory');
    const simStock = document.getElementById('simProductStock');
    const simMin = document.getElementById('simProductMin');
    const simMeter = document.getElementById('simStockMeter');
    const simStatusText = document.getElementById('simStockStatus');
    const btnSell = document.getElementById('btnSimSell');
    const btnRestock = document.getElementById('btnSimRestock');
    
    // Toast de Alerta
    const alertToast = document.getElementById('simAlertToast');
    const alertToastMsg = document.getElementById('simAlertMsg');
    const alertToastClose = document.getElementById('simAlertClose');

    // Tabla de movimientos del dashboard mock
    const movementsTableBody = document.getElementById('movementsTableBody');

    // Inicializar select del simulador
    if (simulatorSelect) {
        simulatorSelect.addEventListener('change', (e) => {
            updateSimulatorUI(e.target.value);
        });
    }

    // Función para actualizar la interfaz del simulador
    const updateSimulatorUI = (productId) => {
        const prod = products.find(p => p.id === productId);
        if (!prod) return;

        // Textos básicos
        simName.innerText = prod.nombre;
        simCategory.innerText = prod.categoria;
        simStock.innerText = `${prod.stock} ${prod.unidad}`;
        simMin.innerText = `${prod.stockMin} ${prod.unidad}`;

        // Cálculo de porcentaje para el metro de stock
        const percentage = Math.max(0, Math.min(100, (prod.stock / prod.stockMax) * 100));
        simMeter.style.width = `${percentage}%`;

        // Lógica de colores del medidor y estado
        simMeter.className = 'stock-meter-bar';
        let statusText = '';
        let statusClass = 'text-success';

        if (prod.stock === 0) {
            simMeter.style.width = '0%';
            statusText = 'AGOTADO';
            statusClass = 'text-danger fw-bold';
            btnSell.disabled = true;
            btnSell.innerText = 'Sin Stock';
            showToastAlert(`¡ATENCIÓN! El producto "${prod.nombre}" se ha agotado por completo.`, true);
        } else if (prod.stock <= prod.stockMin) {
            simMeter.classList.add('bg-danger');
            statusText = 'STOCK CRÍTICO (Bajo Mínimo)';
            statusClass = 'text-danger fw-bold animate__animated animate__pulse animate__infinite';
            btnSell.disabled = false;
            btnSell.innerText = 'Vender 1 Unidad';
            showToastAlert(`ALERTA: "${prod.nombre}" se encuentra por debajo del stock mínimo recomendado (${prod.stockMin} ${prod.unidad}). Reabastezca pronto.`, false);
        } else if (prod.stock <= prod.stockMin + 5) {
            simMeter.classList.add('bg-warning');
            statusText = 'Advertencia: Stock Próximo a Mínimo';
            statusClass = 'text-warning fw-semibold';
            btnSell.disabled = false;
            btnSell.innerText = 'Vender 1 Unidad';
            hideToastAlert();
        } else {
            simMeter.classList.add('bg-success');
            statusText = 'Óptimo';
            statusClass = 'text-success fw-semibold';
            btnSell.disabled = false;
            btnSell.innerText = 'Vender 1 Unidad';
            hideToastAlert();
        }

        simStatusText.innerText = statusText;
        simStatusText.className = `small mt-2 ${statusClass}`;
    };

    // Registrar transacciones simuladas en la tabla
    const addMovementRow = (insumo, tipo, cantidad, valor) => {
        if (!movementsTableBody) return;
        const now = new Date();
        const timeStr = now.toTimeString().split(' ')[0];

        const row = document.createElement('tr');
        row.className = 'animate__animated animate__fadeIn';

        let badgeClass = 'bg-danger';
        let pref = '-';
        if (tipo === 'Entrada') {
            badgeClass = 'bg-success';
            pref = '+';
        }

        row.innerHTML = `
            <td><small class="text-muted">${timeStr}</small></td>
            <td><strong>${insumo.nombre}</strong></td>
            <td><span class="badge ${badgeClass}">${tipo}</span></td>
            <td class="text-end fw-semibold text-dark">${pref}${cantidad} ${insumo.unidad}</td>
            <td class="text-end text-success fw-semibold">$${valor.toFixed(2)}</td>
        `;

        // Insertar al inicio de la tabla
        movementsTableBody.insertBefore(row, movementsTableBody.firstChild);

        // Limitar a los últimos 5 movimientos
        if (movementsTableBody.children.length > 5) {
            movementsTableBody.removeChild(movementsTableBody.lastChild);
        }
    };

    // Acción de Vender Insumo
    if (btnSell) {
        btnSell.addEventListener('click', () => {
            const currentId = simulatorSelect.value;
            const prod = products.find(p => p.id === currentId);
            if (prod && prod.stock > 0) {
                prod.stock--;
                
                // Actualizar interfaz del simulador
                updateSimulatorUI(currentId);

                // Agregar movimiento
                addMovementRow(prod, 'Salida', 1, prod.precio);

                // Actualizar el gráfico si es fertilizante o semilla
                updateChartMock(prod.categoria, -1);

                // Modificar el contador del total de productos en almacén de forma visual en los KPI
                const totalInsumosElem = document.getElementById('kpiTotalInsumos');
                if (totalInsumosElem) {
                    let val = parseInt(totalInsumosElem.innerText.replace('.', ''));
                    totalInsumosElem.innerText = (val - 1).toLocaleString();
                }

                // Incrementar las ventas del día en el KPI
                const totalVentasElem = document.getElementById('kpiTotalVentas');
                if (totalVentasElem) {
                    let cleanText = totalVentasElem.innerText.replace('$', '').replace('.', '').replace(',', '.');
                    let val = parseFloat(cleanText);
                    totalVentasElem.innerText = `$${(val + prod.precio).toLocaleString('de-DE', {minimumFractionDigits: 2, maximumFractionDigits: 2})}`;
                }
            }
        });
    }

    // Acción de Reabastecer Insumo
    if (btnRestock) {
        btnRestock.addEventListener('click', () => {
            const currentId = simulatorSelect.value;
            const prod = products.find(p => p.id === currentId);
            const initialProd = initialProducts.find(p => p.id === currentId);
            
            if (prod && initialProd) {
                const restockAmount = initialProd.stockMax - prod.stock;
                if (restockAmount <= 0) return;

                prod.stock = initialProd.stockMax;
                
                // Actualizar interfaz
                updateSimulatorUI(currentId);

                // Agregar movimiento
                addMovementRow(prod, 'Entrada', restockAmount, restockAmount * (prod.precio * 0.7)); // Precio costo

                // Actualizar gráfico
                updateChartMock(prod.categoria, restockAmount);

                // Sumar al KPI
                const totalInsumosElem = document.getElementById('kpiTotalInsumos');
                if (totalInsumosElem) {
                    let val = parseInt(totalInsumosElem.innerText.replace('.', ''));
                    totalInsumosElem.innerText = (val + restockAmount).toLocaleString();
                }
            }
        });
    }

    // Actualizar datos de Chart.js
    const updateChartMock = (category, diff) => {
        if (!inventoryChart) return;

        const categoryIndices = {
            'Fertilizantes': 0,
            'Semillas': 1,
            'Plaguicidas': 2,
            'Herramientas': 3,
            'Sistemas de Riego': 4
        };

        const idx = categoryIndices[category];
        if (idx !== undefined) {
            inventoryChart.data.datasets[0].data[idx] += diff;
            if (inventoryChart.data.datasets[0].data[idx] < 0) {
                inventoryChart.data.datasets[0].data[idx] = 0;
            }
            inventoryChart.update();
        }
    };

    // Funciones del Toast de Alerta del simulador
    const showToastAlert = (message, isCritical) => {
        if (!alertToast || !alertToastMsg) return;
        alertToastMsg.innerText = message;
        alertToast.classList.add('show');
        
        if (isCritical) {
            alertToast.className = 'alert-toast alert alert-danger show shadow-lg border-2 d-flex align-items-center gap-2';
        } else {
            alertToast.className = 'alert-toast alert alert-warning show shadow-lg border-2 d-flex align-items-center gap-2';
        }
    };

    const hideToastAlert = () => {
        if (alertToast) {
            alertToast.classList.remove('show');
        }
    };

    if (alertToastClose) {
        alertToastClose.addEventListener('click', hideToastAlert);
    }

    // Inicializar la UI con el primer producto
    if (simulatorSelect) {
        updateSimulatorUI(simulatorSelect.value);
    }


    // 4. PORTAL DE ACCESO / SELECCIÓN DE ROLES EN EL LOGIN
    const roleButtons = document.querySelectorAll('.role-selector-btn');
    const inputEmail = document.getElementById('loginEmail');
    const inputPass = document.getElementById('loginPassword');
    const loginRoleTitle = document.getElementById('loginRoleTitle');

    const credentials = {
        'admin': {
            email: 'administrador@agrostock.com',
            pass: 'admin2026',
            label: 'Administrador del Sistema'
        },
        'almacen': {
            email: 'bodega@agrostock.com',
            pass: 'bodega2026',
            label: 'Encargado de Almacén'
        },
        'ventas': {
            email: 'cajero@agrostock.com',
            pass: 'ventas2026',
            label: 'Cajero / Punto de Venta'
        }
    };

    roleButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            roleButtons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const role = btn.getAttribute('data-role');
            const creds = credentials[role];

            if (creds && inputEmail && inputPass && loginRoleTitle) {
                inputEmail.value = creds.email;
                inputPass.value = creds.pass;
                loginRoleTitle.innerText = `Ingresar como ${creds.label}`;
            }
        });
    });
});
