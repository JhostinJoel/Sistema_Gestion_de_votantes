<?php 
require_once "../modelos/VotPrediVotos.php";

$votpredivotos =new VotPrediVotos();

$prvo_prvo=isset($_POST["prvo_prvo"])? limpiarCadena($_POST["prvo_prvo"]):"";
$prvo_id=isset($_POST["prvo_id"])? limpiarCadena($_POST["prvo_id"]):"";
$prvo_pri_nombre=isset($_POST["prvo_pri_nombre"])? limpiarCadena($_POST["prvo_pri_nombre"]):"";
$prvo_seg_nombre=isset($_POST["prvo_seg_nombre"])? limpiarCadena($_POST["prvo_seg_nombre"]):"";
$prvo_pri_apellido=isset($_POST["prvo_pri_apellido"])? limpiarCadena($_POST["prvo_pri_apellido"]):"";
$prvo_seg_apellido=isset($_POST["prvo_seg_apellido"])? limpiarCadena($_POST["prvo_seg_apellido"]):"";
$prvo_direccion=isset($_POST["prvo_direccion"])? limpiarCadena($_POST["prvo_direccion"]):"";
$prvo_telefono=isset($_POST["prvo_telefono"])? limpiarCadena($_POST["prvo_telefono"]):"";
$prvo_escu=isset($_POST["prvo_escu"])? limpiarCadena($_POST["prvo_escu"]):"";
$prvo_mesa=isset($_POST["prvo_mesa"])? limpiarCadena($_POST["prvo_mesa"]):"";
$prvo_lide=isset($_POST["prvo_lide"])? limpiarCadena($_POST["prvo_lide"]):"";
$escu_descri=isset($_POST["escu_descri"])? limpiarCadena($_POST["escu_descri"]):"";
$lide_descri=isset($_POST["lide_descri"])? limpiarCadena($_POST["lide_descri"]):"";



switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($prvo_prvo)){
			$rspta=$votpredivotos->insertar(
			$prvo_id
			,$prvo_pri_nombre
			,$prvo_seg_nombre
			,$prvo_pri_apellido
			,$prvo_seg_apellido
			,$prvo_telefono
			,$prvo_direccion
			,$prvo_escu
			,$prvo_mesa
			,$prvo_lide);
			echo $rspta ? "Persona Registrada" : "Persona no se pudo registrar";
		}
		else {
			$rspta=$votpredivotos->editar(
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
		    );
			echo $rspta ? "País actualizado" : "País no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$votpredivotos->desactivar($prvo_prvo);
 		echo $rspta ? "Persona Desactivada" : "Persona no se puede desactivar";
 		break;

	case 'activar':
		$rspta=$votpredivotos->activar($prvo_prvo);
 		echo $rspta ? "Persona activada" : "Persona no se puede activar";
 		break;

	case 'mostrar':
		$rspta=$votpredivotos->mostrar($prvo_prvo);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;

	case 'listar':
		$rspta=$votpredivotos->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->prvo_estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->prvo_prvo.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->prvo_prvo.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->prvo_prvo.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->prvo_prvo.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->prvo_id,
 				"2"=>$reg->prvo_pri_nombre." ".$reg->prvo_seg_nombre,
 				"3"=>$reg->prvo_pri_apellido." ".$reg->prvo_seg_apellido,
 				"4"=>$reg->prvo_telefono,
 				"5"=>$reg->escu_descri,
 				"6"=>$reg->prvo_mesa,
 				"7"=>$reg->lide_descri,
 				"8"=>($reg->prvo_estado)?'<span class="label bg-green">Activado</span>':
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
	//Metodo para recuperar lista de selección foranea de escuelas para las predicciones votos
	case "selectEscuela":
		require_once "../modelos/DefEscuelas.php";
		$defEscuelas = new DefEscuelas();
		$rspta = $defEscuelas->select();
		while ($reg = $rspta->fetch_object())
		{
			echo '<option value=' . $reg->escu_escu . '>' . $reg->escu_descri . '</option>';
		}
	break;

	//Metodo para recuperar lista de selección foranea de Lideres para las predicciones votos
	case "selectLideres":
		require_once "../modelos/VotLideres.php";
		$votLideres = new VotLideres();
		$rspta = $votLideres->select();
		while ($reg = $rspta->fetch_object())
		{
			echo '<option value=' . $reg->lide_lide . '>' . $reg->lide_pri_nombre.' '.$reg->lide_pri_apellido . '</option>';
		}
	break;
}
?>