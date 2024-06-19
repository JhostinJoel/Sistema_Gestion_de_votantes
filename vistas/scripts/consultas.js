var tabla;

//Función que se ejecuta al inicio
function init(){
	listar();
    
	//Cargamos los items al select Escuel y Lideres
	$.post("../ajax/defescuelas.php?op=selectEscuela", function(r){
	            $("#escu_escu").html(r);
	            $('#escu_escu').selectpicker('refresh');
	});

    $.post("../ajax/defescuelas.php?op=selectLideres", function(r){
        $("#lide_lide").html(r);
        $('#lide_lide').selectpicker('refresh');
	});

}

//Función Listar
function listar()
{
	
    var lide_lide = $("#lide_lide").val();
	var escu_escu = $("#escu_escu").val();  

	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/consultas.php?op=VotantesLiderEscu',
					data:{lide_lide: lide_lide,escu_escu: escu_escu},
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}


init();