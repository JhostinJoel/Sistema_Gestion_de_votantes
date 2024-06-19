<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class VotPrediVotos
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar(
	$prvo_id
	,$prvo_pri_nombre
	,$prvo_seg_nombre
	,$prvo_pri_apellido
	,$prvo_seg_apellido
	,$prvo_telefono
	,$prvo_direccion
	,$prvo_escu
	,$prvo_mesa
	,$prvo_lide
	)
	{
		$sql="INSERT INTO vot_predi_votos 
		(prvo_id
		,prvo_pri_nombre
		,prvo_seg_nombre
		,prvo_pri_apellido
		,prvo_seg_apellido
		,prvo_telefono
		,prvo_direccion
		,prvo_escu
		,prvo_mesa
		,prvo_vigencia
		,prvo_lide
		)
		VALUES 
		('$prvo_id'
		,'$prvo_pri_nombre'
		,'$prvo_seg_nombre'
		,'$prvo_pri_apellido'
		,'$prvo_seg_apellido'
		,'$prvo_telefono'
		,'$prvo_direccion'
		,'$prvo_escu'
		,'$prvo_mesa'
		,'2023'
		,'$prvo_lide')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar(
	$prvo_prvo
	,$prvo_id
	,$prvo_pri_nombre
	,$prvo_seg_nombre
	,$prvo_pri_apellido
	,$prvo_seg_apellido
	,$prvo_telefono
	,$prvo_direccion
	,$prvo_escu
	,$prvo_mesa
	,$prvo_lide
	)
	{
		$sql="UPDATE vot_predi_votos SET 
		prvo_id 			=	'$prvo_id'
		,prvo_pri_nombre 	=	'$prvo_pri_nombre'
		,prvo_seg_nombre	=	'$prvo_seg_nombre'
		,prvo_pri_apellido	=	'$prvo_pri_apellido'
		,prvo_seg_apellido	=	'$prvo_seg_apellido'
		,prvo_telefono		=	'$prvo_telefono'
		,prvo_direccion		=	'$prvo_direccion'
		,prvo_escu			=	'$prvo_escu'
		,prvo_mesa			=	'$prvo_mesa'
		-- ,prvo_vigencia	=	2023
		,prvo_lide			=	'$prvo_lide' 
		WHERE prvo_prvo		=	'$prvo_prvo'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar paises
	public function desactivar($prvo_prvo)
	{
		$sql="UPDATE vot_predi_votos SET prvo_estado='0' WHERE prvo_prvo='$prvo_prvo'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar paises
	public function activar($prvo_prvo)
	{
		$sql="UPDATE vot_predi_votos SET prvo_estado='1' WHERE prvo_prvo='$prvo_prvo'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($prvo_prvo)
	{
		$sql="SELECT * FROM vot_predi_votos WHERE prvo_prvo='$prvo_prvo'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT prvo_prvo,
			prvo_id, 
		prvo_pri_nombre, 
		prvo_seg_nombre, 
		prvo_pri_apellido, 
		prvo_seg_apellido, 
		prvo_telefono,
		 (SELECT escu_descri FROM def_escuelas WHERE prvo_escu = escu_escu ) escu_descri,
		prvo_mesa,
		(SELECT CONCAT(l.lide_pri_nombre,' ',l.lide_pri_apellido)  FROM vot_lideres l WHERE prvo_lide = lide_lide) lide_descri, 
		prvo_estado
		FROM 
		vot_predi_votos";
		return ejecutarConsulta($sql);		
	}
}

?>