 
  <?php
  
  require_once ('bbdd_conexion.php');


  class Conductor
  {

      public $idConductor;
      public $nombre;
      public $apellidos;
      public $fechaContratacion;

    
    function __construct($idConductor){

        $consulta =  "SELECT * FROM conductor WHERE idConductor = '$idConductor'";
        $resultado = Conexion::interacion_bbdd($consulta);

        while($datos = $resultado->fetch_array(MYSQLI_BOTH)){

              $this->idConductor      = $idConductor;
              $this->nombre           = $datos['nombre'];
              $this->apellidos        = $datos['apellidos'];
              $this->fechaContratacion = $datos['fechaContratacion'];

          }
          mysqli_free_result($resultado);
    }


    // llamada desde admin_insertar_conductor
    public static function insertar($nombre, $apellidos, $fechaContratacion){

        $consulta =  "INSERT INTO conductor VALUES ('idConductor', '$nombre', '$apellidos', '$fechaContratacion')";
        $resultado = Conexion::interacion_bbdd($consulta);

        return $resultado;
    }


    public function extraerValoracionMedia(){

        $consulta =  "SELECT AVG(valorarConductor) as media FROM valoraciones WHERE idConductor = '$this->idConductor'" ;
        $resultado = Conexion::interacion_bbdd($consulta);

        $valoracionMedia = $resultado->fetch_array(MYSQLI_BOTH);

        return $valoracionMedia['media'];
    }


  public function eliminarConductor() {

        $consulta =  "DELETE FROM conductor WHERE idConductor = '$this->idConductor' ";
        $resultado = Conexion::interacion_bbdd($consulta);

  }

  public function consultarConductor() {
    
        return $this->nombre;
  }


}/*aqui acaba la clase*/


/* FUNCIONES RELACCIONADAS CON LA CLASE */

  function  extraerConductores(){

        $consulta =  "SELECT * FROM conductor ORDER BY fechaContratacion" ;
        $resultado = Conexion::interacion_bbdd($consulta);

        $datos = array();
        $n = mysqli_num_rows($resultado);
        for ($i=0; $i < $n; $i++) { 
            $datos[$i] = $resultado->fetch_array(MYSQLI_BOTH);
        }
        
        mysqli_free_result($resultado);
      
        return $datos;
  }


  function  extraerViajesConductores($id){

        $consulta =  "SELECT * FROM viaje WHERE idConductor = '$id'" ;
        $resultado = Conexion::interacion_bbdd($consulta);

        $datos = array();
        $n = mysqli_num_rows($resultado);
        for ($i=0; $i < $n; $i++) { 
          $datos[$i] = $resultado->fetch_array(MYSQLI_BOTH);
        }
        

        mysqli_free_result($resultado);
      
        return $datos;
  }

?> 