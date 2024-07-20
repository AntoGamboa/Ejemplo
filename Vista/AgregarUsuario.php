<?php require_once('../Controlador/UsuarioControlador.php') ?>
<!DOCTYPE html>
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
                <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Introduzca el nombre de la persona a registrar</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Introduzca el apellido de la persona a registrar</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">cedula</label>
                <input type="text" class="form-control" id="cedula" name="cedula" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Introduzca la cedula de la persona a registrar</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">edad</label>
                <input type="date" class="form-control" id="edad" name="edad" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Introduzca la edad de la persona a registrar</div>
            </div>

            <button type="submit" class="btn btn-primary" name="btnIngresar">Enviar</button>
        </form>
    </div>


    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">CEDULA</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">APELLIDO</th>
                    <th scope="col">EDAD</th>
                    <th scope="col">STATUS</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach($usuarioModelo->LeerTodos() as $usuario ): ?>
                <tr>
                    <td><?php echo $usuario->ID ?></td>
                    <td><?php echo $usuario->cedula ?></td>
                    <td><?php echo $usuario->nombre ?></td>
                    <td><?php echo $usuario->apellido ?></td>
                    <td><?php echo $usuario->edad ?></td>
                    <td><?php echo $usuario->Estado ?></td>
                    <td>
                        <form method="get" class="d-flex flex-column" action="../Controlador/UsuarioControlador.php"> 
                            <button class="btn btn-danger" name="Eliminar" value="<?php echo $usuario->cedula ?>" 
                            type="submit">Eliminar</button>
                        </form>
                        <form method="get" class="d-flex flex-column" action="./ActualizarUsuario.php"> 
                            <button class="btn btn-primary" name="ActualizarForm" value="<?php echo $usuario->cedula ?>" type="submit">Actualizar</button>

                        </form>
                    </td>
                 

                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </div>

</body>

</html>