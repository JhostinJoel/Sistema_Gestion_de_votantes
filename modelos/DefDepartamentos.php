<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class DefDepartamentos
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($depa_descri,$depa_pais)
	{
		$sql="INSERT INTO def_departamentos (depa_descri,depa_pais,depa_estado)
		VALUES ('$depa_descri','$depa_pais',1)";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar($depaDepa,$depaDescri,$depaPais)
	{
		$sql="UPDATE def_departamentos SET depa_descri='$depaDescri',depa_pais='$depaPais' WHERE depa_depa='$depaDepa'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar paises
	public function desactivar($depaDepa)
	{
		$sql="UPDATE def_departamentos SET depa_estado='0' WHERE depa_depa='$depaDepa'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar paises
	public function activar($depaDepa)
	{
		$sql="UPDATE def_departamentos SET depa_estado='1' WHERE depa_depa='$depaDepa'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($depaDepa)
	{
		$sql="SELECT * FROM def_departamentos WHERE depa_depa='$depaDepa'";
		return ejecutarConsultaSimpleFila($sql);
	}

	public function Select()
	{
		$sql="SELECT * FROM def_departamentos WHERE depa_estado=1";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT 	depa_depa, 
		depa_cod_dane, 
		depa_pais, 
		(SELECT pais_descri FROM votaciones.def_paises WHERE pais_pais = depa_pais) AS pais_descri,
		depa_descri, 
		depa_estado, 
		depa_usuains, 
		depa_fecins, 
		depa_usuaupd, 
		depa_fechaupd
		 
		FROM 
		votaciones.def_departamentos;";
		return ejecutarConsulta($sql);		
	}
}

?>