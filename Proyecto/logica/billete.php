 
  <?php

  require_once ('bbdd_conexion.php');
  
  class Billete
  {

      public $idViaje;
      public $asiento;
      public $idPasajero;
      public $suplementos;

    
    function __construct($idViaje, $idPasajero) {
        
        $consulta =  "SELECT * FROM billete WHERE idViaje = '$idViaje' and idPasajero = '$idPasajero'";
        $resultado = Conexion::interacion_bbdd($consulta);

        while($datos = $resultado->fetch_array(MYSQLI_BOTH)){

            $this->idViaje     = $idViaje;
            $this->asiento     = $datos['asiento'];
            $this->idPasajero  = $idPasajero;
            $this->suplementos = $datos['suplementos'];
      
          }
          mysqli_free_result($resultado);
    }



    public static function insertarBillete($idViaje, $asiento, $idPasajero, $suplementos){

        $consulta = "INSERT INTO billete VALUES ('$idViaje', '$asiento', '$idPasajero', '$suplementos')";
        $resultado = Conexion::interacion_bbdd($consulta);

        return $resultado;
    }


    public function borrarBillete() {

          $consulta = "DELETE FROM billete WHERE idViaje='$this->idViaje' and idPasajero='$this->idPasajero'";
          $resultado = Conexion::interacion_bbdd($consulta);

          if ($resultado) {
              mysqli_free_result($resultado);
              return true;
          }
          else {
              mysqli_free_result($resultado);
              return false;
          }
    }


    public static function tieneBillete($idViaje, $dni) {

          $sql = "SELECT * FROM billete WHERE idViaje = '$idViaje' and idPasajero = '$dni' " ;
          $resultado = Conexion::interacion_bbdd($sql);
          $n = mysqli_num_rows($resultado);
          if ( $n == 0 ) {
                return false;
          }
          else {
                return true;
          }
    }

}/*aqui acaba la clase*/







/* FUNCIONES RELACCIONADAS CON LA CLASE */

    /* Obtenemos los detalles de un billete de un usuario no registrado
      (nos interesa saber los datos del usuario no registrado en la comprobacion de sus datos) */
    function extraerViajeUsuarioNoRegistrado($idViaje, $asientoSelecionado) {

          $consulta =  "SELECT * FROM billete b, viaje v, noregistrado nr
                        WHERE v.idViaje = b.idViaje
                          and nr.dni = b.idPasajero
                          and b.idViaje = '$idViaje' and b.asiento = '$asientoSelecionado' " ;
          
          $resultado = Conexion::interacion_bbdd($consulta);

          $datos = $resultado->fetch_array(MYSQLI_BOTH);

          return $datos;
    }

    // Obtenemos los detalles de un billete (para general_impresion.php)
    function extraerDetallesBillete($idViaje, $asientoSelecionado) {

          $consulta = "SELECT * FROM billete b, viaje v
                WHERE v.idViaje = b.idViaje
                  and b.idViaje = '$idViaje' and b.asiento = '$asientoSelecionado' " ;

          $resultado = Conexion::interacion_bbdd($consulta);
          
          $datos = $resultado->fetch_array(MYSQLI_BOTH);

          return $datos;
    }

    // Obtenemos todos los asientos ocupados para un viaje determinado 
    function obtenerAsientosOcupados($idViaje) {
          //sentencia que selecciona todo de la tabla
          $sql = "SELECT * FROM billete WHERE idViaje = '$idViaje'";
          $resultado = Conexion::interacion_bbdd($sql);
          
          //array para guardar los asientos
          $TodosAsientos= array();
          $cont=0;
          //while para recorrer los asientos en la BD
          while($fila=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
          
            $asientos= $fila['asiento'];
            
            $TodosAsientos[$cont] = $asientos;
            $cont++;
          }

          return $TodosAsientos;
    }

    // Comprueba si un asiento esta disponible y verifica ademas que el asiento este contenido en el intervalo [1,60]
    function asientoDisponible($idViaje, $asientoSelecionado) {

          $sql = "SELECT * FROM billete WHERE idViaje = '$idViaje' and asiento = '$asientoSelecionado' " ;

          $resultado = Conexion::interacion_bbdd($sql);
          $n = mysqli_num_rows($resultado);
          if ( ($n ==0) && (0 < $asientoSelecionado) && ($asientoSelecionado < 61) ) {
                return true;
          }
          else {
                return false;
          }
    }
?> 