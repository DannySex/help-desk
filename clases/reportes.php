<?php
    include "Conexion.php";

    class Reportes extends Conexion {
        public function agregarReporteCliente($datos) {
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO t_reportes (id_usuario,
                                            id_equipo,
                                            descripcion_problema)
                    VALUES (?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('iis', $datos['idUsuario'],
                                      $datos ['idEquipo'],
                                      $datos ['problema']);

            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
        public function eliminarReporteCliente($idReporte){
        $conexion = Conexion :: conectar();
        $sql = "DELETE FROM t_reportes WHERE id_reportes = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('i',$idReporte);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
        }
        public function obtenerSolucion($idReporte){

    $conexion = Conexion::conectar();

    $sql = "SELECT id_reportes, solucion_problema, estatus
            FROM t_reportes 
            WHERE id_reportes = '$idReporte'";

    $result = mysqli_query($conexion, $sql);

    $mostrar = mysqli_fetch_assoc($result);

    $datos = array(
        "idReporte" => $mostrar['id_reportes'],
        "solucion" => $mostrar['solucion_problema'],
        "estatus" => $mostrar['estatus']
    );

    return $datos;
}
        public function actualizarSolucion($datos){
            $conexion = Conexion :: conectar();
            $sql = "UPDATE t_reportes 
        SET id_usuario_tecnico = ?,
            solucion_problema = ?,
            estatus = ?
        WHERE id_reportes = ?";
        $query = $conexion->prepare($sql);
        $query->bind_param('isii', $datos['idUsuario'],
                                   $datos['solucion'],
                                   $datos['estatus'],
                                   $datos['idReporte']);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
        }
    } 
?>