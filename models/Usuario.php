<?php

class Usuario {
    private $conn;
    private $table_name = "usuarios";

    public $id_usuario;
    public $nombre;
    public $email;
    public $password;
    public $id_rol;
    public $estado;
    public $fecha_creacion;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Check if email already exists
    public function emailExists() {
        $query = "SELECT id_usuario FROM " . $this->table_name . " WHERE email = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $this->email = htmlspecialchars(strip_tags($this->email));
        $stmt->bindParam(1, $this->email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }

    // Create new user record
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                SET nombre = :nombre, 
                    email = :email, 
                    password = :password, 
                    id_rol = :id_rol, 
                    estado = :estado, 
                    fecha_creacion = :fecha_creacion";

        $stmt = $this->conn->prepare($query);

        // Sanitize and clean inputs
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->id_rol = intval($this->id_rol);
        $this->estado = isset($this->estado) ? (bool)$this->estado : true;
        
        if (empty($this->fecha_creacion)) {
            $this->fecha_creacion = date('Y-m-d H:i:s');
        }

        // Hash the password before binding/saving
        $hashed_password = password_hash($this->password, PASSWORD_BCRYPT);

        // Bind values
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':id_rol', $this->id_rol);
        
        $estado_int = $this->estado ? 1 : 0;
        $stmt->bindParam(':estado', $estado_int, PDO::PARAM_INT);
        $stmt->bindParam(':fecha_creacion', $this->fecha_creacion);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
