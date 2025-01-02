<?php

include "modelo/conexion.php";


session_start();
if(!empty($_POST["btningresar"])){
    //echo "Boton presionado";
    if (!empty($_POST["usuario"]) && !empty($_POST["password"] )) {
        $usuario = $_POST["usuario"];
        $pass = $_POST["password"];
        $sql = $conexion->query("SELECT * FROM usuario WHERE usuario = '$usuario' and contraseña='$pass'");
        if($datos=$sql->fetch_object()){
            $_SESSION["id"] = $datos->idusuario;
            $_SESSION["nombre"] = $datos->nombres;
            $_SESSION["apellido"] = $datos->apellidos;
            header("location: inicio.php"); //si el usuario existe enviame a la pagina inicio.php
        }else{
            echo "<div class='alert alert-danger'>Acceso Denegado</div>";
        }
    } else {
        echo "Campos vacios";
    }
    
}