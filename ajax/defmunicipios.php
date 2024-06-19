<?php 
require_once "../modelos/DefMunicipios.php";

$defMunicipios=new DefMunicipios();

$muni_muni=isset($_POST["muni_muni"])? limpiarCadena($_POST["muni_muni"]):"";
$muni_descri=isset($_POST["muni_descri"])? limpiarCadena($_POST["muni_descri"]):"";
$muni_depa=isset($_POST["muni_depa"])? limpiarCadena($_POST["muni_depa"]):"";
$depa_descri=isset($_POST["depa_descri"])? limpiarCadena($_POST["depa_descri"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($muni_muni)){
			$rspta=$defMunicipios->insertar($muni_descri, $muni_depa);
			echo $rspta ? "Municipio Registrado" : "Municipio no se pudo registrar";
		}
		else {
			$rspta=$defMunicipios->editar($muni_muni,$muni_descri,$muni_depa);
			echo $rspta ? "Municipio actualizado" : "Municipio no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$defMunicipios->desactivar($muni_muni);
 		echo $rspta ? "Municipio Desactivado" : "Municipio no se puede desactivar";
 		break;

	case 'activar':
		$rspta=$defMunicipios->activar($muni_muni);
 		echo $rspta ? "Municipio activado" : "Municipio no se puede activar";
 		break;

	case 'mostrar':
		$rspta=$defMunicipios->mostrar($muni_muni);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;

	case 'listar':
		$rspta=$defMunicipios->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->muni_estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->muni_muni.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->muni_muni.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->muni_muni.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->muni_muni.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->muni_descri,
				"2"=>$reg->depa_descri,
 				"3"=>($reg->muni_estado)?'<span class="label bg-green">Activado</span>':
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

	//Metodo para recuperar lista de selección foranea de departamentos para las predicciones votos
	case "selectDepartamentos":
		require_once "../modelos/DefDepartamentos.php";
		$defDepartamentos = new DefDepartamentos();
		$rspta = $defDepartamentos->select();
		while ($reg = $rspta->fetch_object())
		{
			echo '<option value=' . $reg->depa_depa . '>' . $reg->depa_descri . '</option>';
		}
	break;
}
?>