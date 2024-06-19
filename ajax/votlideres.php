<?php 
require_once "../modelos/VotLideres.php";

$votlideres =new VotLideres();

$lide_lide=isset($_POST["lide_lide"])? limpiarCadena($_POST["lide_lide"]):"";
$lide_tipo_id=isset($_POST["lide_tipo_id"])? limpiarCadena($_POST["lide_tipo_id"]):"";
$lide_id=isset($_POST["lide_id"])? limpiarCadena($_POST["lide_id"]):"";
$lide_pri_nombre=isset($_POST["lide_pri_nombre"])? limpiarCadena($_POST["lide_pri_nombre"]):"";
$lide_seg_nombre=isset($_POST["lide_seg_nombre"])? limpiarCadena($_POST["lide_seg_nombre"]):"";
$lide_pri_apellido=isset($_POST["lide_pri_apellido"])? limpiarCadena($_POST["lide_pri_apellido"]):"";
$lide_seg_apellido=isset($_POST["lide_seg_apellido"])? limpiarCadena($_POST["lide_seg_apellido"]):"";
$lide_direccion=isset($_POST["lide_direccion"])? limpiarCadena($_POST["lide_direccion"]):"";
$lide_telefono=isset($_POST["lide_telefono"])? limpiarCadena($_POST["lide_telefono"]):"";
$lide_celular=isset($_POST["lide_celular"])? limpiarCadena($_POST["lide_celular"]):"";
$lide_estado=isset($_POST["lide_estado"])? limpiarCadena($_POST["lide_estado"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($lide_lide)){
			echo "Insertando".$lide_lide;
			$rspta=$votlideres->insertar(
			$lide_tipo_id
			,$lide_id
			,$lide_pri_nombre
			,$lide_seg_nombre
			,$lide_pri_apellido
			,$lide_seg_apellido
			,$lide_direccion
			,$lide_telefono
			,$lide_celular
			);
			echo $rspta ? "Lider Registrado" : "Lider no se pudo registrar";
		}
		else {
			echo "Actualizando".$lide_lide;
			$rspta=$votlideres->editar(
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
		    );
			echo $rspta ? "Lider actualizado" : "Lider no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$votlideres->desactivar($lide_lide);
 		echo $rspta ? "Lider Desactivado" : "Lider no se puede desactivar";
 		break;

	case 'activar':
		$rspta=$votlideres->activar($lide_lide);
 		echo $rspta ? "Lider activado" : "Lider no se puede activar";
 		break;

	case 'mostrar':
		$rspta=$votlideres->mostrar($lide_lide);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;

	case 'listar':
		$rspta=$votlideres->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->lide_estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->lide_lide.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->lide_lide.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->lide_lide.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->lide_lide.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->lide_id,
 				"2"=>$reg->lide_pri_nombre." ".$reg->lide_seg_nombre,
 				"3"=>$reg->lide_pri_apellido." ".$reg->lide_seg_apellido,
 				"4"=>$reg->lide_direccion,
 				"5"=>$reg->lide_telefono,
 				"6"=>$reg->lide_celular,
 				"7"=>($reg->lide_estado)?'<span class="label bg-green">Activado</span>':
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
}
?>