<?php
//el controlador es el intermediario entre la vista y el modelo
//recibe los datos del formulario con el metodo POST y llama los metodos del modelo
    require_once("../Modelo/UsuarioModelo.php");
    define("VistasUsuarios","Location: ../Vista/AgregarUsuario.php");


    $usuarioModelo = new usuario();

    if(isset($_POST["btnIngresar"])){
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $cedula  = $_POST["cedula"];
        $edad = $_POST["edad"];

        $usuarioModelo->setNombre($nombre);
        $usuarioModelo->setApellido($apellido);
        $usuarioModelo->setCedula($cedula);
        $usuarioModelo->setEdad($edad);

        $usuarioModelo->RegistrarUsuario();
        header(VistasUsuarios);
    }
    if(isset($_GET["Eliminar"])){
        $cedula  = $_GET["Eliminar"];
        $usuarioModelo->Eliminar($cedula);
        header(VistasUsuarios);
    }
    if(isset($_POST['btnActualizar'])){
        $ID =$_POST['btnActualizar'];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $cedula  = $_POST["cedula"];
        $edad = $_POST["edad"];
     

        $usuarioModelo->setId($ID);
        $usuarioModelo->setNombre($nombre);
        $usuarioModelo->setApellido($apellido);
        $usuarioModelo->setCedula($cedula);
        $usuarioModelo->setEdad($edad);
        

        $usuarioModelo->ActualizarUsuario();
        header(VistasUsuarios);



    }

   
?>