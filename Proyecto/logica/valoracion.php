 
  <?php

  
  class Valoracion
  {
      public $idConductor;
      public $idViaje;
      public $idUsuario;
      public $valorarConductor;
      public $valorarViaje;

    function __construct($idConductor, $idViaje, $idUsuario){
 
        $consulta =  "SELECT * FROM valoraciones WHERE idConductor = '$idConductor' and idViaje = '$idViaje' and idUsuario = '$idUsuario'";
        $resultado = Conexion::interacion_bbdd($consulta);

        while($datos = $resultado->fetch_array(MYSQLI_BOTH)){

            $this->idConductor      = $idConductor;
            $this->idViaje          = $idViaje;
            $this->idUsuario        = $idUsuario;
            $this->valorarConductor = $datos['valorarConductor'];
            $this->valorarViaje     = $datos['valorarViaje'];
      
          }
          mysqli_free_result($resultado);
    }


    public static function insertarCalificacionConductor($calificacion , $idViaje, $dni){
        
        require_once 'viaje.php';
        $v = new Viaje($idViaje);
        $idConductor = $v->idConductor;


        $consultaValoraciones = "SELECT * FROM valoraciones WHERE idViaje='$idViaje' and idUsuario='$dni' and idConductor='$idConductor'" ;

        $consultaValoracion = Conexion::interacion_bbdd($consultaValoraciones);
        $n = mysqli_num_rows($consultaValoracion);

        if($n <= 0) {
            // añadimos la valoracion
            $insertar = "INSERT INTO valoraciones VALUES ('$idConductor', '$idViaje', '$dni', '$calificacion', NULL)";
            Conexion::interacion_bbdd($insertar);


            // aumentamos el contador de las valoraciones del usuario
            $consultaVip = "SELECT * FROM usuarios WHERE dni='$dni'" ;
            $resultados = Conexion::interacion_bbdd($consultaVip);
            $arrayVip = $resultados->fetch_array(MYSQLI_BOTH);

            $vip = $arrayVip['vip'];
            $numValoraciones = $arrayVip['numValoraciones'];

            $suma = $numValoraciones+1;

            $modificanumvaloraciones = "UPDATE usuarios SET numValoraciones='$suma' WHERE dni='$dni'";
            Conexion::interacion_bbdd($modificanumvaloraciones);
            
            if ( $vip==0 && (($numValoraciones+1) >= 5) ) {
                // Cambiamos a ser vip
                session_start();
                $_SESSION["vip"]=true;
                $modificavip = "UPDATE usuarios SET vip=1 WHERE dni='$dni'";
                Conexion::interacion_bbdd($modificavip);
            }

        }
        else {
            // modificamos la valoracion porque sabemos que ya existe una
            $modifica = "UPDATE valoraciones SET valorarConductor='$calificacion' WHERE idViaje='$idViaje' and idUsuario='$dni' and idConductor='$idConductor'";
            Conexion::interacion_bbdd($modifica);
        }

        mysqli_free_result($resultado);
    }



    public static function insertarCalificacionViaje($calificacion , $idViaje, $dni){
        
        require_once 'viaje.php';
        $v = new Viaje($idViaje);
        $idConductor = $v->idConductor;
        

        $consultaValoraciones = "SELECT * FROM valoraciones WHERE idViaje='$idViaje' and idUsuario='$dni' and idConductor='$idConductor'" ;
        
        $consultaValoracion = Conexion::interacion_bbdd($consultaValoraciones);
        $n = mysqli_num_rows($consultaValoracion);

        if($n <= 0) {
            // añadimos la valoracion
            $insertar = "INSERT INTO valoraciones VALUES ('$idConductor', '$idViaje', '$dni', NULL, '$calificacion')";
            Conexion::interacion_bbdd($insertar);

            // aumentamos el contador de las valoraciones del usuario
            $consultaVip = "SELECT * FROM usuarios WHERE dni='$dni'" ;
            $resultados = Conexion::interacion_bbdd($consultaVip);
            $arrayVip = $resultados->fetch_array(MYSQLI_BOTH);

            $vip = $arrayVip['vip'];
            $numValoraciones = $arrayVip['numValoraciones'];

            $suma = $numValoraciones+1;

            $modificanumvaloraciones = "UPDATE usuarios SET numValoraciones='$suma' WHERE dni='$dni'";
            Conexion::interacion_bbdd($modificanumvaloraciones);
            
            if ( $vip==0 && (($numValoraciones+1) >= 5) ) {
                // Cambiamos a ser vip
                session_start();
                $_SESSION["vip"]=true;
                $modificavip = "UPDATE usuarios SET vip=1 WHERE dni='$dni'";
                Conexion::interacion_bbdd($modificavip);
            }

        }
        else {
            // modificamos la valoracion porque sabemos que ya existe una
            $modifica = "UPDATE valoraciones SET valorarViaje='$calificacion' WHERE idViaje='$idViaje' and idUsuario='$dni' and idConductor='$idConductor'";
            Conexion::interacion_bbdd($modifica);
        }

        mysqli_free_result($resultado);
    }



    public static function existeValoracionViaje($idViaje, $idConductor, $idUsuario) {

        $consultavaloracion = "SELECT * FROM valoraciones 
                                WHERE idViaje = '$idViaje'
                                  and idConductor = '$idConductor'
                                  and idUsuario = '$idUsuario'" ;
        $valoraciones = Conexion::interacion_bbdd($consultavaloracion);

        $detallesValoracion = $valoraciones->fetch_array(MYSQLI_BOTH);
        $estaViajeValorado = $detallesValoracion['valorarViaje'];

        if ( (mysqli_num_rows($valoraciones) <= 0) || ($estaViajeValorado == NULL) )
            return false;
        else
            return true;
    }


    public static function existeValoracionConductor($idViaje, $idConductor, $idUsuario) {

        $consultavaloracion = "SELECT * FROM valoraciones 
                                WHERE idViaje = '$idViaje'
                                  and idConductor = '$idConductor'
                                  and idUsuario = '$idUsuario'" ;
        $valoraciones = Conexion::interacion_bbdd($consultavaloracion);

        $detallesValoracion = $valoraciones->fetch_array(MYSQLI_BOTH);
        $estaConductorValorado = $detallesValoracion['valorarConductor'];

        if ( (mysqli_num_rows($valoraciones) <= 0) || ($estaConductorValorado == NULL) )
            return false;
        else
            return true;
    }


}/*aqui acaba la clase*/


?> 