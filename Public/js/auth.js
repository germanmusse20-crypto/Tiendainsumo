/**
 * AGROSTOCK - SISTEMA DE INVENTARIO Y VENTAS DE INSUMOS AGRÍCOLAS
 * Lógica Interactiva para Formularios de Autenticación (Login & Registro)
 */

document.addEventListener('DOMContentLoaded', () => {

    // 1. CONTROL DE VISIBILIDAD DE CONTRASEÑA (PASSWORD TOGGLE)
    const toggleButtons = document.querySelectorAll('.password-toggle');
    
    toggleButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault(); // Evita envíos de formulario
            
            // Buscar el input hermano
            const inputGroup = btn.closest('.auth-input-group');
            const passwordInput = inputGroup.querySelector('input');
            const icon = btn.querySelector('i');

            if (passwordInput && icon) {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                }
            }
        });
    });

    // 2. PRE-LLENADO DE CREDENCIALES POR ROL (SÓLO EN LOGIN)
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

    if (roleButtons.length > 0 && inputEmail && inputPass && loginRoleTitle) {
        roleButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                roleButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const role = btn.getAttribute('data-role');
                const creds = credentials[role];

                if (creds) {
                    inputEmail.value = creds.email;
                    inputPass.value = creds.pass;
                    loginRoleTitle.innerText = `Ingresar como ${creds.label}`;
                }
            });
        });
    }

    // 3. MEDIDOR DE FORTALEZA DE CONTRASEÑA (SÓLO EN REGISTRO)
    const registerPasswordInput = document.getElementById('registerPassword');
    const strengthMeter = document.querySelector('.password-strength-meter');
    const strengthBar = document.querySelector('.password-strength-bar');

    if (registerPasswordInput && strengthMeter && strengthBar) {
        registerPasswordInput.addEventListener('input', (e) => {
            const password = e.target.value;
            
            if (password.length === 0) {
                strengthMeter.style.display = 'none';
                return;
            }

            strengthMeter.style.display = 'block';
            let strength = 0;

            // Criterios de evaluación
            if (password.length >= 6) strength += 20;
            if (password.length >= 10) strength += 20;
            if (/[A-Z]/.test(password)) strength += 20;
            if (/[0-9]/.test(password)) strength += 20;
            if (/[^A-Za-z0-9]/.test(password)) strength += 20;

            // Ajustar visualmente el medidor
            strengthBar.style.width = `${strength}%`;

            // Cambiar colores según nivel
            strengthBar.className = 'password-strength-bar'; // Reset
            if (strength <= 40) {
                strengthBar.classList.add('bg-danger'); // Débil
            } else if (strength <= 80) {
                strengthBar.classList.add('bg-warning'); // Media
            } else {
                strengthBar.classList.add('bg-success'); // Fuerte
            }
        });
    }

    // 4. VALIDACIÓN DE COINCIDENCIA DE CONTRASEÑAS (REGISTRO)
    const registerForm = document.getElementById('registerForm');
    const passwordConfirm = document.getElementById('registerPasswordConfirm');

    if (registerForm && registerPasswordInput && passwordConfirm) {
        const validatePasswords = () => {
            if (passwordConfirm.value.length === 0) {
                passwordConfirm.classList.remove('is-valid', 'is-invalid');
                return true;
            }

            if (registerPasswordInput.value === passwordConfirm.value) {
                passwordConfirm.classList.remove('is-invalid');
                passwordConfirm.classList.add('is-valid');
                return true;
            } else {
                passwordConfirm.classList.remove('is-valid');
                passwordConfirm.classList.add('is-invalid');
                return false;
            }
        };

        registerPasswordInput.addEventListener('input', validatePasswords);
        passwordConfirm.addEventListener('input', validatePasswords);

        registerForm.addEventListener('submit', (e) => {
            if (!validatePasswords()) {
                e.preventDefault();
                alert('Las contraseñas ingresadas no coinciden. Por favor, verifíquelas.');
            }
        });
    }
});
