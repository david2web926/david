<?php

class Conexion {
    private $conexion;
    
    function __construct($host,$user,$pass,$db){
        $this->conexion = new mysqli($host,$user,$pass,$db);
    }


    function getComentarios($pagina){
        $sql = "SELECT * FROM comentarios WHERE tipoPagina = ? ORDER BY fecha";
        $stmt = $this->conexion->prepare($sql);

        $stmt->bind_param('s',$pagina);
        $stmt->execute();

        $comentarios = [];
        $resultado = $stmt->get_result();

        while($filas = $resultado->fetch_assoc()){
            arraypush($comentarios,$filas);
        }
        
        $stmt->close();

        return $comentarios;
    }

    function insertarComentario($nombre,$comentario,$pagina){
        $sql = "INSERT INTO(nombre,comentario,pagina) VALUES(?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);

        $stmt>bind_param('sss',$nombre,$comentario,$pagina);
        $stmt->execute();

        $stmt->close();
    }

    function cerrarConexion(){
        $this->conexion->close();
    }
}
        

?>