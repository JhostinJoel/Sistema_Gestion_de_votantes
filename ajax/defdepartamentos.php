<?php 
require_once "../modelos/DefDepartamentos.php";

$defdepartamentos=new DefDepartamentos();

$depa_depa=isset($_POST["depa_depa"])? limpiarCadena($_POST["depa_depa"]):"";
$depa_descri=isset($_POST["depa_descri"])? limpiarCadena($_POST["depa_descri"]):"";
$depa_pais=isset($_POST["depa_pais"])? limpiarCadena($_POST["depa_pais"]):"";
$pais_descri=isset($_POST["pais_descri"])? limpiarCadena($_POST["pais_descri"]):"";



switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($depa_depa)){
			$rspta=$defdepartamentos->insertar($depa_descri,$depa_pais);
			echo $rspta ? "Departamento Registrado" : "Departamento no se pudo registrar";
		}
		else {
			$rspta=$defdepartamentos->editar($depa_depa,$depa_descri,$depa_pais);
			echo $rspta ? "Departamento actualizado" : "Departamento no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$defdepartamentos->desactivar($depa_depa);
 		echo $rspta ? "Departamento Desactivado" : "Departamento no se puede desactivar";
 		break;

	case 'activar':
		$rspta=$defdepartamentos->activar($depa_depa);
 		echo $rspta ? "Departamento activado" : "Departamento no se puede activar";
 		break;

	case 'mostrar':
		$rspta=$defdepartamentos->mostrar($depa_depa);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;

	case 'listar':
		$rspta=$defdepartamentos->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->depa_estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->depa_depa.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->depa_depa.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->depa_depa.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->depa_depa.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->pais_descri,
				"2"=>$reg->depa_descri,
 				"3"=>($reg->depa_estado)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;

	//Metodo para recuperar lista de selección foranea de Paises para las predicciones votos
	case "selectPais":
		require_once "../modelos/DefPaises.php";
		$defPaises = new DefPaises();
		$rspta = $defPaises->select();
		while ($reg = $rspta->fetch_object())
		{
			echo '<option value=' . $reg->pais_pais . '>' . $reg->pais_descri . '</option>';
		}
	break;
}
?>