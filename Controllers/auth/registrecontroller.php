<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Include database and model files
    require_once __DIR__ . '/../../Config/Database.php';
    require_once __DIR__ . '/../../models/Usuario.php';

    // Retrieve and sanitize inputs
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $id_rol = isset($_POST['id_rol']) ? intval($_POST['id_rol']) : 0;
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $password_confirm = isset($_POST['password_confirm']) ? $_POST['password_confirm'] : '';

    // Save form data to session to preserve input values on failure
    $_SESSION['form_data'] = [
        'nombre' => $nombre,
        'email' => $email,
        'id_rol' => $id_rol
    ];

    $errors = [];

    // Validation
    if (empty($nombre)) {
        $errors[] = "El nombre completo es requerido.";
    }

    if (empty($email)) {
        $errors[] = "El correo electrónico es requerido.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El formato del correo electrónico no es válido.";
    }

    if ($id_rol < 1 || $id_rol > 3) {
        $errors[] = "Debe seleccionar un cargo o rol válido.";
    }

    if (empty($password)) {
        $errors[] = "La contraseña es requerida.";
    } elseif (strlen($password) < 6) {
        $errors[] = "La contraseña debe tener al menos 6 caracteres.";
    }

    if ($password !== $password_confirm) {
        $errors[] = "Las contraseñas no coinciden.";
    }

    // If validation failed
    if (!empty($errors)) {
        $_SESSION['error_message'] = implode("<br>", $errors);
        header("Location: ../../view/auth/register.php");
        exit();
    }

    // Connect to database
    $database = new Database();
    $db = $database->getConnection();

    if ($db === null) {
        $_SESSION['error_message'] = "No se pudo establecer conexión con la base de datos.";
        header("Location: ../../view/auth/register.php");
        exit();
    }

    // Instantiate Usuario model
    $usuario = new Usuario($db);
    $usuario->nombre = $nombre;
    $usuario->email = $email;
    $usuario->password = $password;
    $usuario->id_rol = $id_rol;

    // Check if email already exists
    if ($usuario->emailExists()) {
        $_SESSION['error_message'] = "El correo electrónico ya está registrado.";
        header("Location: ../../view/auth/register.php");
        exit();
    }

    // Create user
    if ($usuario->create()) {
        // Success: clear form data and set success message
        unset($_SESSION['form_data']);
        $_SESSION['success_message'] = "¡Registro completado con éxito! Se ha creado su cuenta. Inicie sesión.";
        header("Location: ../../view/auth/login.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Ocurrió un error al intentar crear el usuario. Por favor, intente de nuevo.";
        header("Location: ../../view/auth/register.php");
        exit();
    }
} else {
    // If not a POST request, redirect to register page
    header("Location: ../../view/auth/register.php");
    exit();
}
