
<!DOCTYPE html>
<?php  
    require_once('../Controlador/UsuarioControlador.php') ;
    $userActualizar = $usuarioModelo->BuscarCedula($_GET['ActualizarForm']);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container ">
        <form method="post" action="../Controlador/UsuarioControlador.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="nombre"
                    name="nombre" 
                    aria-describedby="emailHelp"
                    value="<?php echo $userActualizar->nombre?>">

                <div id="emailHelp" class="form-text">Introduzca el nombre de la persona a registrar</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">apellido</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="apellido" 
                    name="apellido"
                    aria-describedby="emailHelp"
                    value="<?php echo $userActualizar->apellido?>"
                 >
                <div id="emailHelp" class="form-text">Introduzca el apellido de la persona a registrar</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">cedula</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="cedula" name="cedula"
                    aria-describedby="emailHelp"
                    value="<?php echo $userActualizar->cedula?>">
                <div id="emailHelp" class="form-text">Introduzca la cedula de la persona a registrar</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">edad</label>
                <input 
                    type="date" 
                    class="form-control" 
                    id="edad" 
                    name="edad" 
                    aria-describedby="emailHelp"
                    value="<?php echo $userActualizar->edad?>">
                <div id="emailHelp" class="form-text">Introduzca la edad de la persona a registrar</div>
            </div>

            <button type="submit" class="btn btn-primary" value="<?php echo $userActualizar->ID?>" name="btnActualizar">Enviar</button>
        </form>
    </div>
</body>

</html>