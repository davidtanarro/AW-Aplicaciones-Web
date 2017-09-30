 
  <?php


  require_once ('bbdd_conexion.php');

  
  class Usuario
  {

    public $dni;
    public $nombre;
    public $apellidos;
    public $direccion;
    public $codPostal;
    public $telefono;
    public $correo;
    public $password;
    public $numValoraciones;
    public $vip;
    public $fechaRegistro;
    public $usuario;
     
    function __construct($dni){

        $consulta =  "SELECT * FROM usuarios WHERE dni = '$dni'";
        $resultado = Conexion::interacion_bbdd($consulta);

        while($datos = $resultado->fetch_array(MYSQLI_BOTH)){

            $this->dni              = $dni;
            $this->nombre           = $datos['nombre'];
            $this->apellidos        = $datos['apellidos'];
            $this->direccion        = $datos['direccion'];
            $this->codPostal        = $datos['codpostal'];
            $this->telefono         = $datos['telefono'];
            $this->correo           = $datos['correo'];
            $this->password         = $datos['password'];
            $this->numValoraciones  = $datos['numValoraciones'];
            $this->vip              = $datos['vip'];
            $this->fechaRegistro    = $datos['fechaRegistro'];
            $this->usuario          = $datos['usuario'];
      
          }
          mysqli_free_result($resultado);
    }

    public static function insertar($dni, $nombre, $apellidos, $direccion, $codPostal, $telefono, $correo, $password, $validaciones, $vip, $fechaRegistro, $usuario){

         $insertar = "INSERT INTO usuarios VALUES 
            ('$dni', '$nombre', '$apellidos', '$direccion', '$codPostal', '$telefono', '$correo', '$password', 0, 0,  
            '$fechaRegistro', '$usuario')";

         $resultado = Conexion::interacion_bbdd($insertar);


         return $resultado;
    }

  
    public static function loguearUsuario($usuario, $password){
    
        //variables y cosas a usar en esta pagina
        $contador = 0;

        //consulta para obtener el usuario
        $consulta=" SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $resultado = Conexion::interacion_bbdd($consulta);

        while($datos = $resultado->fetch_array(MYSQLI_BOTH)){

          $hash = $datos['password'];
          
          if(password_verify($password, $hash)){
            $contador++;
          } 
          
        }

        mysqli_free_result($resultado);

        return $contador;
    }


  public static function extraerDniUsuario($usuario) {

      
        $consulta = "SELECT dni FROM usuarios WHERE usuario = '$usuario'" ;
        
        $resultado = Conexion::interacion_bbdd($consulta);

        $arraydni = $resultado->fetch_array(MYSQLI_BOTH);
        $dni = $arraydni['dni'];

        mysqli_free_result($resultado);

        return $dni;
  }

  public static function verificarUsuario($user, $dni){

        $verificar_usuario = Conexion::interacion_bbdd("SELECT * FROM usuarios WHERE usuario = '$user'");
        $verificar_dni = Conexion::interacion_bbdd("SELECT * FROM usuarios WHERE dni = '$dni' ");


        if( (mysqli_num_rows($verificar_usuario) > 0) || (mysqli_num_rows($verificar_dni) > 0) ) 
            return false;

        else
            return true;
  }

  public function eliminarUsuario() {

        $sql = "DELETE FROM usuarios WHERE dni = '$this->dni' ";
        $resultado = Conexion::interacion_bbdd($sql);
        
        if ($resultado) {
            mysqli_free_result($resultado);
            return true;
        }
        else {
            mysqli_free_result($resultado);
            return false;
        }
  }

  //Comprueba que el dni del usuario no registrado existe para saber si insertarlo en el bbdd
  public static function verificarDniUsuario($dni) {

        // verifico si el usuario no registrado existe o no
        $sql = "SELECT * FROM noregistrado WHERE dni = '$dni' ";
        $verificar_dni = Conexion::interacion_bbdd($sql);
        if(mysqli_num_rows($verificar_dni) == 1)
            return true;
        else 
            return false;
  }
 
  // Si un usuario no registrado no esta verificado, entonces no existe y se inserta 
  public static function insertarUsuarioNoRegistrado($dni, $nombre, $apellido1, $direccion1, $codPostal, $tlf) {
        
        $sql = "INSERT INTO noregistrado VALUES ('$dni', '$nombre', '$apellido1', '$direccion1', '$codPostal', '$tlf')";
        $resultado = Conexion::interacion_bbdd($sql);

        return $resultado;
  }

  // Si un usuario no registrado esta verificado, entonces existe y se modifica 
  public static function modificarUsuarioNoRegistrado($dni, $nombre, $apellido1, $direccion1, $codPostal, $tlf) {

        $sql = "UPDATE noregistrado SET nombre='$nombre', apellidos='$apellido1', direccion='$direccion1', codpostal='$codPostal', telefono='$tlf' WHERE dni='$dni' ";
        $resultado = Conexion::interacion_bbdd($sql);

        return $resultado;
  }

  // se llama en viaje.php para analizar la cancelacion de un viaje y en login.php para declarar una variable de sesion
  public function esVip() {
       
        if($this->vip == 1)
            return true;
        else 
            return false;
  }

}




/* FUNCIONES RELACCIONADAS CON LA CLASE */

  function extraerUsuarios(){

        $sql = "SELECT * FROM usuarios WHERE usuario != 'admin' ORDER BY fechaRegistro"  ;
        
        $resultado = Conexion::interacion_bbdd($sql);

        //Necesitamos saber las filas para extraer los datos
        $n=  mysqli_num_rows($resultado);

        $datos = array();
        //$verificar = Conexion::interacion_bbdd($sql);
        for ($i=0; $i < $n; $i++) { 
            $datos[$i] = $resultado->fetch_array(MYSQLI_BOTH);
        }
        
        mysqli_free_result($resultado);
      
        return $datos;
  }


?>