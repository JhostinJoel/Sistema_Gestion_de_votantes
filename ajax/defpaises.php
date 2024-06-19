<?php 
require_once "../modelos/DefPaises.php";

$defpaises=new DefPaises();

$pais_pais=isset($_POST["pais_pais"])? limpiarCadena($_POST["pais_pais"]):"";
$pais_descri=isset($_POST["pais_descri"])? limpiarCadena($_POST["pais_descri"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($pais_pais)){
			$rspta=$defpaises->insertar($pais_descri);
			echo $rspta ? "País Registrado" : "País no se pudo registrar";
		}
		else {
			$rspta=$defpaises->editar($pais_pais,$pais_descri);
			echo $rspta ? "País actualizado" : "País no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$defpaises->desactivar($pais_pais);
 		echo $rspta ? "País Desactivado" : "País no se puede desactivar";
 		break;

	case 'activar':
		$rspta=$defpaises->activar($pais_pais);
 		echo $rspta ? "País activado" : "País no se puede activar";
 		break;

	case 'mostrar':
		$rspta=$defpaises->mostrar($pais_pais);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;

	case 'listar':
		$rspta=$defpaises->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->pais_estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->pais_pais.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->pais_pais.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->pais_pais.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->pais_pais.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->pais_descri,
 				"2"=>($reg->pais_estado)?'<span class="label bg-green">Activado</span>':
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
}
?>