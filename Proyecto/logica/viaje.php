 
  <?php
  
  require_once ('bbdd_conexion.php');

  class Viaje
  {
      public $idViaje;
      public $origen;
      public $destino;
      public $fechaSalida;
      public $horaSalida;
      public $numBus;
      public $idConductor;
      public $fechaFinalizacion;
      public $frecuencia;

    function __construct($idViaje){
        
        $consulta =  "SELECT * FROM viaje WHERE idViaje = '$idViaje'";
        $resultado = Conexion::interacion_bbdd($consulta);

        while($datos = $resultado->fetch_array(MYSQLI_BOTH)){

            $this->idViaje            = $idViaje;
            $this->origen             = $datos['origen'];
            $this->destino            = $datos['destino'];
            $this->fechaSalida        = $datos['fechaSalida'];
            $this->horaSalida         = $datos['horaSalida'];
            $this->numBus             = $datos['numBus'];
            $this->idConductor        = $datos['idConductor'];
            $this->fechaFinalizacion  = $datos['fechaFinalizacion'];
            $this->frecuencia         = $datos['frecuencia'];
      
          }
          mysqli_free_result($resultado);
    }


    public static function insertar($origen, $destino, $fechaSalida, $horaSalida, $numBus, $idConductor, $fechaFinalizacion, $frecuencia){
        
          $insertar = "INSERT INTO viaje VALUES ('idViaje', '$origen', '$destino', '$fechaSalida', '$horaSalida', 
          '$numBus', '$idConductor', '$fechaFinalizacion', '$frecuencia')";
          $resultado = Conexion::interacion_bbdd($insertar);

          return $resultado;
    }


    public function extraerValoracionMediaViaje() {

          $sql = "SELECT avg(valorarViaje) as mediaViaje FROM valoraciones WHERE idViaje = '$this->idViaje' and valorarViaje is not null";
          $resultado = Conexion::interacion_bbdd($sql);

          $datos = $resultado->fetch_array(MYSQLI_BOTH);

          mysqli_free_result($resultado);
        
          return $datos['mediaViaje'];
    }
    

    public function extraerValoracionMediaConductor() {

          $sql = " SELECT avg(valorarConductor) as mediaConductor FROM valoraciones WHERE idViaje = '$this->idViaje' and valorarConductor is not null";
          $resultado = Conexion::interacion_bbdd($sql);

          $datos = $resultado->fetch_array(MYSQLI_BOTH);

          mysqli_free_result($resultado);
          
          return $datos['mediaConductor'];
    }
    

    public static function modificarViaje($idViaje, $fechaSalida, $horaSalida, $numBus, $idConductor) {

          $sql = "UPDATE viaje SET fechaSalida = '$fechaSalida', horaSalida = '$horaSalida', numBus = '$numBus', idConductor = '$idConductor' WHERE idViaje = '$idViaje'";    
          $resultado = Conexion::interacion_bbdd($sql);
    }
    

    public function eliminarViaje() {

          $sql = "DELETE FROM viaje WHERE idViaje = '$this->idViaje' and idConductor = '$this->idConductor'";
          $resultado = Conexion::interacion_bbdd($sql);
    }
    

    public function esViajeRealizado($fechaSalida) {
          $hoy = date("Y-m-d");

          if ($fechaSalida < $hoy)
              return true;
          else
              return false;
    }
    
    
    /* Retorna si la cancelacion de un viaje ha caducado */
    public function cancelacionCaducada($dni) {

          $hoy = date("Y-m-d");
          $date_diff = Viaje::dateDiff($hoy, $this->fechaSalida);  // difference of dates =  ($fechaSalida - $hoy)
          
          require_once 'usuario.php';
          $us = new Usuario($dni);
          if ( ($date_diff >= 1 ) && ($us->esVip()) ) { // Si es VIP y falta un dia para el viaje
              return false;
          }
          else if ( ($date_diff  > 3 ) && !($us->esVip()) ) { // Si no es VIP y faltan cuatro dias para el viaje
              return false;
          }
          else {
              return true;
          }
    }

    function dateDiff($start, $end) {
          $start_ts = strtotime($start);

          $end_ts = strtotime($end);

          $diff = $end_ts - $start_ts;

          return round($diff / 86400);
    }

    

    public static function existeViaje($idViaje) {

          $sql = "SELECT idViaje FROM viaje WHERE idViaje = '$idViaje' " ;
          $resultado = Conexion::interacion_bbdd($sql);

          $n =  mysqli_num_rows($resultado);
          if ( $n > 0 ) 
                return true;
          else
                return false;
    }


    /* Obtiene cuantos billetes se han sacado para un viaje */
    public function extraerOcupacion() {

          $sql = " SELECT count(*) as cuenta FROM billete WHERE idViaje = '$this->idViaje' ";
          $resultado = Conexion::interacion_bbdd($sql);
          $n = $resultado->fetch_array(MYSQLI_BOTH);

          mysqli_free_result($resultado);
          
          return $n['cuenta'];
    }


}/*aqui acaba la clase*/





/* FUNCIONES RELACCIONADAS CON LA CLASE */

    /*function hayViajeDisponible($fecha, $origen, $destino) {

        $hoy = date("Y-m-d");
        $sql = "SELECT * FROM viaje WHERE fechaSalida = '$fecha' and origen = '$origen' and destino = '$destino' and fechaSalida >= '$hoy'" ;
        $resultado = Conexion::interacion_bbdd($sql);
        
        $n =  mysqli_num_rows($resultado);
        if ($n == 0) 
            return false;
        else
            return true;
    }


    function hayViajesVueltaDisponible($fecha, $origen, $destino) { // Cambia en fechaSalida >= '$fecha' respecto a hayViajeDisponible(...)

        $hoy = date("Y-m-d");
        $sql = "SELECT * FROM viaje WHERE fechaSalida >= '$fecha' and origen = '$origen' and destino = '$destino' and fechaSalida >= '$hoy'" ;
        $resultado = Conexion::interacion_bbdd($sql);
        
        $n =  mysqli_num_rows($resultado);
        if ($n == 0) 
            return false;
        else
            return true;
    }*/

    /*
        Cuando extraemos viajes disponibles de un usuario registrado
          Entonces solo le mostraremos aquellos viajes que aun no ha sacado ningun billete
          Ya que implementamos la restriccion de que un usuario no puede viajar en mas de un asiento
        Cuando extraemos viajes disponibles de un usuario no registrado
          Entonces, como no conocemos su dni, mostraremos todos los disponibles y verificaremos que un usuario no registrado no viaje en el varios asientos en insertar_billete.php  
    */
    function extraerViajesDisponibles($fecha, $origen, $destino, $usuario) {


          $hoy = date("Y-m-d");      
          $hora = date("H:i:s");

          if ($usuario != NULL) {
              require "usuario.php";
              $dni = Usuario::extraerDniUsuario($usuario);

              $sql = "SELECT * 
                      FROM viaje v
                      WHERE v.fechaSalida = '$fecha' and v.origen = '$origen' and v.destino = '$destino' 
                              and ( (v.fechaSalida > '$hoy') or (v.fechaSalida = '$hoy' and v.horaSalida >= '$hora') )
                              and v.idViaje NOT IN (  SELECT b.idViaje
                                                      FROM billete b
                                                      WHERE v.idViaje = b.idViaje and b.idPasajero = '$dni'
                                                    )
                      ORDER BY v.horaSalida ASC";
            }
          else {
              $sql = "SELECT * 
                      FROM viaje v
                      WHERE v.fechaSalida = '$fecha' and v.origen = '$origen' and v.destino = '$destino' and v.fechaSalida >= '$hoy'
                      ORDER BY v.horaSalida ASC";
          }
          $resultado = Conexion::interacion_bbdd($sql);

          $n =  mysqli_num_rows($resultado);
          $datos = array();
          for ($i=0; $i < $n; $i++) { 
              $datos[$i] = $resultado->fetch_array(MYSQLI_BOTH);
          }

          mysqli_free_result($resultado);
          
          return $datos;  
    }

    /*
        Extraemos los viajes disponibles de vuelta a partir de una fecha, sin mostrar los viajes en los que un usuario haya sacado un billete
    */
    function extraerViajesVueltaDisponibles($fecha, $origen, $destino, $idPasajero) { // Cambia en fechaSalida >= '$fecha' respecto a la anterior

          $hoy = date("Y-m-d");
          $hora = date("H:i:s");

          $sql = "SELECT * 
                  FROM viaje v
                  WHERE v.fechaSalida >= '$fecha' and v.origen = '$origen' and v.destino = '$destino' 
                          and ( (v.fechaSalida > '$hoy') or (v.fechaSalida = '$hoy' and v.horaSalida >= '$hora') )
                          and v.idViaje NOT IN (  SELECT b.idViaje
                                                  FROM billete b
                                                  WHERE v.idViaje = b.idViaje and b.idPasajero = '$idPasajero'
                                                )
                  ORDER BY v.fechaSalida ASC, v.horaSalida ASC";
        
          $resultado = Conexion::interacion_bbdd($sql);

          $n =  mysqli_num_rows($resultado);
          $datos = array();
          for ($i=0; $i < $n; $i++) { 
              $datos[$i] = $resultado->fetch_array(MYSQLI_BOTH);
          }

          mysqli_free_result($resultado);
          
          return $datos;  
    }
    
    /* Extrae los viajes estas programados (aun por realizar) para el administrador */
    function extraerViajesProgramados() {

          $hoy = date("Y-m-d");
          $hora = date("H:i:s");

          $sql = "SELECT * 
                  FROM viaje
                  WHERE (fechaSalida > '$hoy') or (fechaSalida = '$hoy' and horaSalida >= '$hora')
                  ORDER BY fechaSalida ASC" ;
          $resultado = Conexion::interacion_bbdd($sql);

          $n =  mysqli_num_rows($resultado);
          $datos = array();
          for ($i=0; $i < $n; $i++) { 
              $datos[$i] = $resultado->fetch_array(MYSQLI_BOTH);
          }

          mysqli_free_result($resultado);
          
          return $datos;
    }

    /* Extrae los viajes estas realizados para que el administrador vea estadisticas */
    function extraerViajesRealizados() {

          $hoy = date("Y-m-d");
          $hora = date("H:i:s");

          $sql = "SELECT *
                  FROM viaje
                  WHERE (fechaSalida < '$hoy') or (fechaSalida = '$hoy' and horaSalida < '$hora')
                  ORDER BY fechaSalida DESC" ;
          $resultado = Conexion::interacion_bbdd($sql);

          $n =  mysqli_num_rows($resultado);
          $datos = array();
          for ($i=0; $i < $n; $i++) { 
              $datos[$i] = $resultado->fetch_array(MYSQLI_BOTH);
          }

          mysqli_free_result($resultado);
          
          return $datos;
    }


   /* function  extraerViajesUsuarios($id){

          $sql = "SELECT * FROM billete b, viaje vi, valoraciones va 
                  WHERE b.idViaje = vi.idViaje 
                        and vi.idViaje = va.idViaje
                        and va.idUsuario = '$id'
                        and b.idPasajero = '$id'" ;
        

          $resultado = Conexion::interacion_bbdd($sql);
          $n=  mysqli_num_rows($resultado);

          $datos = array();
       
          for ($i=0; $i < $n; $i++) { 
            $datos[$i] = $resultado->fetch_array(MYSQLI_BOTH);
          }

          mysqli_free_result($resultado);
        
          return $datos;
    }*/

    function extraerViajesRealizadosUsuario($dni) {

          $hoy = date("Y-m-d");
          $hora = date("H:i:s");

          $sql = "SELECT * FROM billete b, viaje vi
                  WHERE b.idViaje = vi.idViaje 
                        and b.idPasajero = '$dni'
                        and ( (vi.fechaSalida < '$hoy') or (vi.fechaSalida = '$hoy' and vi.horaSalida < '$hora') )
                  ORDER BY vi.fechaSalida DESC" ;


         $resultado = Conexion::interacion_bbdd($sql);
         $n=  mysqli_num_rows($resultado);


          $datos = array();
         
          for ($i=0; $i <$n; $i++) { 
              $datos[$i] = $resultado->fetch_array(MYSQLI_BOTH);
          }

          mysqli_free_result($resultado);
          
          return $datos;
          
    }



    function extraerViajesProgramadosUsuario($dni) {

          $hoy = date("Y-m-d");
          $hora = date("H:i:s");

          $sql = "SELECT * FROM billete b, viaje vi 
                  WHERE b.idViaje = vi.idViaje
                        and b.idPasajero = '$dni'
                        and ( (vi.fechaSalida > '$hoy') or (vi.fechaSalida = '$hoy' and vi.horaSalida >= '$hora') )
                  ORDER BY vi.fechaSalida ASC";

        $resultado = Conexion::interacion_bbdd($sql);
        $n=  mysqli_num_rows($resultado);


          $datos = array();
         
          for ($i=0; $i <$n; $i++) { 
              $datos[$i] = $resultado->fetch_array(MYSQLI_BOTH);
          }

          mysqli_free_result($resultado);
          
          return $datos;
    }

?> 