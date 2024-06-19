<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Consultas
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	public function VotantesLiderEscu($lide_lide,$escu_escu)
	{
        $sql="SELECT v.prvo_tipo_id, 
        v.prvo_id, 
        CONCAT(v.prvo_pri_nombre,' ',v.prvo_seg_nombre) nombre , 
        CONCAT(v.prvo_pri_apellido,' ',v.prvo_seg_apellido) apellido, 
        v.prvo_telefono, 
        v.prvo_direccion,
        e.escu_descri, 
        v.prvo_mesa,
        CONCAT(l.lide_pri_nombre,' ',l.lide_pri_apellido) Lider,
        v.prvo_estado 
        FROM 
        vot_predi_votos v, vot_lideres l, def_escuelas e
        WHERE prvo_escu = escu_escu 
        AND   prvo_lide = lide_lide 
        AND l.lide_lide = '$lide_lide' 
        AND e.escu_escu = '$escu_escu'
        OR '$lide_lide' IS NULL AND '$escu_escu' IS NULL ";
		return ejecutarConsulta($sql);		
	}

    public function TopLideres()
	{
        $sql="SELECT COUNT(*) AS Total_lide,
        (SELECT CONCAT(lide_pri_nombre, ' ', lide_pri_apellido) 
                FROM vot_lideres 
                WHERE lide_lide = prvo_lide) AS Lide_lide
        FROM vot_predi_votos
        GROUP BY prvo_lide
        ORDER BY Total_lide DESC
        LIMIT 10";
		return ejecutarConsulta($sql);		
	}
}

?>