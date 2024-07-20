<?php
//en el modelo se hereda la conexion, se crea la clase con sus atributos, constructor y metodos 
    require_once("../conexion.php");
    class usuario extends conexion
    {
        private $id;
        private $nombre;
        private $apellido;
        private $cedula;
        private $edad;
        public function getNombre() { return $this->nombre; } 
        public function setNombre($nombre) { $this->nombre = $nombre; }
        public function getApellido() { return $this->apellido; } 
        public function setApellido($apellido) { $this->apellido = $apellido; }
        public function getCedula() { return $this->cedula; } 
        public function setCedula($cedula) { $this->cedula = $cedula; }
        public function getEdad() { return $this->edad; } 
        public function setEdad($edad) { $this->edad = $edad; }
        public function getId() { return $this->id; }
        public function setId($id) { $this->id = $id; }

        public function __construct()
        {
            parent::__construct();
        }
        
        public function RegistrarUsuario(){
            $query = 'INSERT INTO usuarios(nombre,apellido,cedula,edad) VALUES(?,?,?,?);';
            $this->getConexion()
            ->prepare($query)
            ->execute(array($this->nombre,$this->apellido,$this->cedula,$this->edad));
        }

        public function LeerTodos(){
            $query ='SELECT u.ID,u.nombre,u.apellido,u.cedula,u.edad ,
                    IF(u.Estado <> 0 , "Activo","Inactivo") AS Estado 
                    FROM usuarios u
                    WHERE u.Estado = 1;
                ';
            $stmt = $this->getConexion()->prepare($query);  //el método prepare() toma la consulta, crea un objeto PDOStatement y se guarda en $stmt
            $stmt->execute();                               //ejecuta la consulta preparada
            return $stmt->fetchAll(PDO::FETCH_OBJ);         //fetchAll() recupera todas las filas como una matriz
                                                            //PDO::FETCH_OBJ especifica que cada fila de la matriz debe ser un objeto
        }

        public function BuscarCedula($cedula){
             try {
                $query = 'SELECT u.ID,u.nombre,u.apellido,u.cedula,u.edad ,
                    IF(u.Estado <> 0 , "Activo","Inactivo") AS Estado 
                    FROM usuarios u
                    WHERE u.cedula = ?;';
                $stmt= $this->getConexion()->prepare($query);
                $stmt->execute(array($cedula));
                return $stmt->fetch(PDO::FETCH_OBJ);
             } catch (Exception $e) {
                echo $e->getMessage();
                echo $e->getLine();
                echo $e->getCode();
             }
        }
        public function Eliminar($cedula){
            $query = 'UPDATE usuarios SET Estado = 0 WHERE cedula = ?;';
            $this->getConexion()->prepare($query)->execute(array($cedula));

        }

        public function ActualizarUsuario(){
     
            $query = 'UPDATE usuarios set nombre=:nombre,  apellido=:apellido, cedula=:cedula, edad=:edad WHERE id=:id;';
            $stmt = $this->getConexion()->prepare($query);
            $stmt->bindParam(':nombre', $this->nombre);         //bindParam() enlaza variables a un marcador de posición en una sentencia SQL preparada
            $stmt->bindParam(':apellido', $this->apellido);
            $stmt->bindParam(':cedula', $this->cedula);
            $stmt->bindParam(':edad', $this->edad);
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
        }
    }
?>