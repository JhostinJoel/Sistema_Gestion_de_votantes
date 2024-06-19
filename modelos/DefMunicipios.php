<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class DefMunicipios 
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($muni_descri,$muni_depa)
	{
		$sql="INSERT INTO def_municipios (muni_descri,muni_depa,muni_estado)
		VALUES ('$muni_descri','$muni_depa',1)";
		return ejecutarConsulta($sql);
	}
    
	//Implementamos un método para editar registros
	public function editar($muniMuni,$muniDescri,$muniDepa) 	
	{
		$sql="UPDATE def_municipios SET muni_descri='$muniDescri', muni_depa='$muniDepa' WHERE muni_muni='$muniMuni' ";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar paises
	public function desactivar($muniMuni)
	{
		$sql="UPDATE def_municipios SET muni_estado='0' WHERE muni_muni='$muniMuni'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar paises
	public function activar($muniMuni)
	{
		$sql="UPDATE def_municipios SET muni_estado='1' WHERE muni_muni='$muniMuni'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($muniMuni)
	{
		$sql="SELECT * FROM def_municipios WHERE muni_muni='$muniMuni'";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function Select()
	{
		$sql="SELECT * FROM def_municipios WHERE muni_estado=1";
		return ejecutarConsulta($sql);
	}
	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT 	muni_muni, 
		muni_depa, 
		(SELECT depa_descri FROM def_departamentos WHERE depa_depa  = muni_depa ) depa_descri,
		muni_cod_dane, 
		muni_descri, 
		muni_estado, 
		muni_usuains, 
		muni_fecins, 
		muni_usuaupd, 
		muni_fecupd
		 
		FROM 
		votaciones.def_municipios;
	";
		return ejecutarConsulta($sql);		
	}
}

?>