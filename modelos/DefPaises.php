<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class DefPaises
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($pais_descri)
	{
		$sql="INSERT INTO def_paises (pais_descri,pais_estado)
		VALUES ('$pais_descri',1)";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($paisPais,$paisDescri,)
	{
		$sql="UPDATE def_paises SET pais_descri='$paisDescri' WHERE pais_pais='$paisPais'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar paises
	public function desactivar($paisPais)
	{
		$sql="UPDATE def_paises SET pais_estado='0' WHERE pais_pais='$paisPais'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar paises
	public function activar($paisPais)
	{
		$sql="UPDATE def_paises SET pais_estado='1' WHERE pais_pais='$paisPais'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($paisPais)
	{
		$sql="SELECT * FROM def_paises WHERE pais_pais='$paisPais'";
		return ejecutarConsultaSimpleFila($sql);
	}

		//Implementar un método para mostrar los datos del select list paises
	public function Select()
	{
		$sql="SELECT * FROM def_paises WHERE pais_estado=1";
		return ejecutarConsulta($sql);
	}
	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM def_paises";
		return ejecutarConsulta($sql);		
	}
}
?>