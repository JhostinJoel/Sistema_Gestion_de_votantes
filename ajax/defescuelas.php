<?php 
require_once "../modelos/DefEscuelas.php";

$DefEscuelas=new DefEscuelas();

$escu_escu=isset($_POST["escu_escu"])? limpiarCadena($_POST["escu_escu"]):"";
$escu_descri=isset($_POST["escu_descri"])? limpiarCadena($_POST["escu_descri"]):"";
$escu_muni=isset($_POST["escu_muni"])? limpiarCadena($_POST["escu_muni"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
		if (empty($escu_escu)){
			$rspta=$DefEscuelas->insertar($escu_descri,$escu_muni);
			echo $rspta ? "Escuela Registrada" : "Escuela no se pudo registrar";
		}
		else {
			$rspta=$DefEscuelas->editar($escu_escu,$escu_muni,$escu_descri);
			echo $rspta ? "Escuela actualizada" : "Escuela no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$DefEscuelas->desactivar($escu_escu);
 		echo $rspta ? "Escuela Desactivada" : "Escuela no se puede desactivar";
 		break;

	case 'activar':
		$rspta=$DefEscuelas->activar($escu_escu);
 		echo $rspta ? "Escuela activada" : "Escuela no se puede activar";
 		break;

	case 'mostrar':
		$rspta=$DefEscuelas->mostrar($escu_escu);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;

	case 'listar':
		$rspta=$DefEscuelas->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->escu_estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->escu_escu.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->escu_escu.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->escu_escu.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->escu_escu.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->escu_descri,
				"2"=>$reg->muni_descri,
 				"3"=>($reg->escu_estado)?'<span class="label bg-green">Activado</span>':
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

	//Metodo para recuperar lista de selección foranea de Lideres para las predicciones votos
	case "selectMunicipios":
		require_once "../modelos/DefMunicipios.php";
		$defMunicipios = new DefMunicipios();
		$rspta = $defMunicipios->select();
		while ($reg = $rspta->fetch_object())
		{
			echo '<option value=' . $reg->muni_muni . '>' . $reg->muni_descri . '</option>';
		}
	break;

	case "selectLideres":
		require_once "../modelos/VotLideres.php";
		$votLideres = new VotLideres();
		$rspta = $votLideres->select();
		while ($reg = $rspta->fetch_object())
		{
			echo '<option value=' . $reg->lide_lide . '>' . $reg->lide_pri_nombre.' '.$reg->lide_pri_apellido . '</option>';
		}
	break;

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