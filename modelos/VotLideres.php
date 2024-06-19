<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class VotLideres
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar(
	$lide_tipo_id
	,$lide_id
	,$lide_pri_nombre
	,$lide_seg_nombre
	,$lide_pri_apellido
	,$lide_seg_apellido
	,$lide_direccion
	,$lide_telefono
	,$lide_celular
	)
	{
		$sql="INSERT INTO vot_lideres 
		(lide_tipo_id, 
		lide_id, 
		lide_pri_nombre, 
		lide_seg_nombre, 
		lide_pri_apellido, 
		lide_seg_apellido, 
		lide_direccion, 
		lide_telefono, 
		lide_celular, 
		lide_estado
		)
		VALUES 
		('$lide_tipo_id'
		,'$lide_id'
		,'$lide_pri_nombre'
		,'$lide_seg_nombre'
		,'$lide_pri_apellido'
		,'$lide_seg_apellido'
		,'$lide_direccion'
		,'$lide_telefono'
		,'$lide_celular'
		,1)";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar(
	$lide_lide
	,$lide_tipo_id
	,$lide_id
	,$lide_pri_nombre
	,$lide_seg_nombre
	,$lide_pri_apellido
	,$lide_seg_apellido
	,$lide_direccion
	,$lide_telefono
	,$lide_celular
	)
	{
		$sql="UPDATE vot_lideres SET 
		lide_tipo_id 		=	'$lide_tipo_id'
		,lide_id 			=	'$lide_id'
		,lide_pri_nombre	=	'$lide_pri_nombre'
		,lide_seg_nombre	=	'$lide_seg_nombre'
		,lide_pri_apellido	=	'$lide_pri_apellido'
		,lide_seg_apellido	=	'$lide_seg_apellido'
		,lide_direccion		=	'$lide_direccion'
		,lide_telefono		=	'$lide_telefono'
		,lide_celular		=	'$lide_celular'
		WHERE lide_lide		=	'$lide_lide'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar paises
	public function desactivar($lide_lide)
	{
		$sql="UPDATE vot_lideres SET lide_estado='0' WHERE lide_lide='$lide_lide'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar paises
	public function activar($lide_lide)
	{
		$sql="UPDATE vot_lideres SET lide_estado='1' WHERE lide_lide='$lide_lide'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($lide_lide)
	{
		$sql="SELECT * FROM vot_lideres WHERE lide_lide='$lide_lide'";
		return ejecutarConsultaSimpleFila($sql);
	}
	public function Select()
	{
		$sql="SELECT * FROM vot_lideres WHERE lide_estado=1";
		return ejecutarConsulta($sql);
	}
	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM vot_lideres";
		return ejecutarConsulta($sql);		
	}
}

?>