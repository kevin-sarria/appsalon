<?php

namespace Model;


class Usuario extends ActiveRecord {
    
    // Base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'telefono', 'admin', 'confirmado', 'token', 'password'];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;
    public $password;

    public function __construct( $args = [] ) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->admin = $args['admin'] ?? 0;
        $this->confirmado = $args['confirmado'] ?? 0;
        $this->token = $args['token'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    // Mensajes de validación para la creación de la cuenta
    public function validarNuevaCuenta() {

        if( !$this->nombre ) {
            self::$alertas['error'][] = "El Nombre es Obligatorio";
        }

        if( !$this->apellido ) {
            self::$alertas['error'][] = "El Apellido es Obligatorio";
        }

        if( !$this->email ) {
            self::$alertas['error'][] = "El Email es Obligatorio";
        }

        if( !$this->telefono ) {
            self::$alertas['error'][] = "El Telefono es Obligatorio";
        }

        if( !$this->password ) {
            self::$alertas['error'][] = "La Contraseña es Obligatoria";
        } else if( strlen($this->password) < 8 ) {
            self::$alertas['error'][] = "La Contraseña debe tener al menos 8 caracteres";
        }

        return self::$alertas;
    }

    public function validarEmail() {
        if( !$this->email ) {
            self::$alertas['error'][] = "El Email es Obligatorio";
        }
        
        return self::$alertas;
    }

    public function validarPassword() {
        
        if(!$this->password ) {
            self::$alertas['error'][] = "La contraseña es obligatoria";
        } else if( strlen($this->password) < 8 ) {
            self::$alertas['error'][] = "La contraseña debe tener al menos 8 caracteres";
        }

        return self::$alertas;

    }

    public function existeUsuario() {

        $query = "SELECT * FROM " . self::$tabla . " WHERE email='" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if( $resultado->num_rows ) {
            self::$alertas['error'][] = "El usuario ya esta registrado";
        }

        return $resultado;

    }

    public function hashPAssword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken() {
        $this->token = uniqid();
    }

    public function validarLogin() {

        if( !$this->email ) {
            self::$alertas['error'][] = "El email es Obligatorio";
        }

        if( !$this->password ) {
            self::$alertas['error'][] = "La contraseña es Obligatoria";
        }

        return self::$alertas;


    }

    public function comprobarPasswordAndVerificado($password) {

        $resultado = password_verify( $password, $this->password );

        if( !$this->confirmado ) {
            self::$alertas['error'][] = "Tu cuenta no ha sido confirmada";
        }else if(!$resultado) {
            self::$alertas['error'][] = "Error!, Contraseña incorrecta";
        }else {
            return true;
        }


    }

}


