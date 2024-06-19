<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class DefEscuelas
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($escu_descri,$escu_muni)
	{
		$sql="INSERT INTO def_escuelas (escu_descri,escu_muni,escu_estado)
		VALUES ('$escu_descri','$escu_muni','1')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($escuEscu,$escuMuni,$escuDescri)
	{
		$sql="UPDATE def_escuelas SET escu_descri='$escuDescri', escu_muni='$escuMuni' WHERE escu_escu='$escuEscu'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar paises
	public function desactivar($escuEscu)
	{
		$sql="UPDATE def_escuelas SET escu_estado='0' WHERE escu_escu='$escuEscu'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar paises
	public function activar($escuEscu)
	{
		$sql="UPDATE def_escuelas SET escu_estado='1' WHERE escu_escu='$escuEscu'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($escuEscu)
	{
		$sql="SELECT * FROM def_escuelas WHERE escu_escu='$escuEscu'";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function Select()
	{
		$sql="SELECT * FROM def_escuelas WHERE escu_estado=1";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="
		SELECT 	escu_escu, 
			escu_descri, 
			escu_muni, 
			(SELECT muni_descri FROM def_municipios WHERE muni_muni = escu_muni ) muni_descri,
			escu_fecins, 
			escu_estado, 
			escu_usuains, 
			escu_fecupd, 
			escu_insupd
			 
			FROM 
			votaciones.def_escuelas;
		";
		return ejecutarConsulta($sql);		
	}
}

?>