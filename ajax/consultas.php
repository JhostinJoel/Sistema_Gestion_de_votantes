<?php 
require_once "../modelos/Consultas.php";

$consulta=new Consultas();

switch ($_GET["op"]){
	case 'VotantesLiderEscu':
		$lide_lide=$_REQUEST["lide_lide"];
        $escu_escu=$_REQUEST["escu_escu"];

		$rspta=$consulta->VotantesLiderEscu($lide_lide,$escu_escu);
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>$reg->prvo_tipo_id,
 				"1"=>$reg->prvo_id,
                "2"=>$reg->nombre,
 				"3"=>$reg->apellido,
 				"4"=>$reg->prvo_telefono,
                "5"=>$reg->prvo_direccion,
                "6"=>$reg->escu_descri,
                "7"=>$reg->prvo_mesa,
                "8"=>$reg->Lider,
 				"9"=>($reg->prvo_estado=='1')?'<span class="label bg-green">Aceptado</span>':
 				'<span class="label bg-red">Anulado</span>'
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