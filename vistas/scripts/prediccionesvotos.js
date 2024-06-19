var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
	
	//Cargamos los items al select categoria
	$.post("../ajax/votpredivotos.php?op=selectEscuela", function(r){
		$("#prvo_escu").html(r);
		$('#prvo_escu').selectpicker('refresh');
	});

	//Cargamos los items al select categoria
	$.post("../ajax/votpredivotos.php?op=selectLideres", function(r){
		$("#prvo_lide").html(r);
		$('#prvo_lide').selectpicker('refresh');
	});
}

//Función limpiar
function limpiar()
{
	$("#prvo_prvo").val("");
	$("#prvo_id").val("");
	$("#prvo_pri_nombre").val("");
	$("#prvo_seg_nombre").val("");
	$("#prvo_pri_apellido").val("");
	$("#prvo_seg_apellido").val("");
	$("#prvo_direccion").val("");
	// $("#prvo_escu").val("");
	$("#prvo_mesa").val("");
	//$("#prvo_lide").val("");
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//Función Listar
function listar()
{
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
					url: '../ajax/votpredivotos.php?op=listar',
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
//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/votpredivotos.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          tabla.ajax.reload();
	    }

	});
	limpiar();
}

function mostrar(prvo_prvo)
{
	$.post("../ajax/votpredivotos.php?op=mostrar",{prvo_prvo : prvo_prvo}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);
 		$("#prvo_prvo").val(data.prvo_prvo);
 		$("#prvo_id").val(data.prvo_id);
 		$("#prvo_pri_nombre").val(data.prvo_pri_nombre);
 		$("#prvo_seg_nombre").val(data.prvo_seg_nombre);
 		$("#prvo_pri_apellido").val(data.prvo_pri_apellido);
 		$("#prvo_seg_apellido").val(data.prvo_seg_apellido);
 		$("#prvo_direccion").val(data.prvo_direccion);
 		$("#prvo_escu").val(data.prvo_escu);
		$('#prvo_escu').selectpicker('refresh');
 		$("#prvo_mesa").val(data.prvo_mesa);
 		$("#prvo_lide").val(data.prvo_lide);
		$('#prvo_lide').selectpicker('refresh');
 	})
}

//Función para desactivar registros
function desactivar(prvo_prvo)
{
	bootbox.confirm("¿Está Seguro de desactivar la persona?", function(result){
		if(result)
        {
        	$.post("../ajax/votpredivotos.php?op=desactivar", {prvo_prvo : prvo_prvo}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(prvo_prvo)
{
	bootbox.confirm("¿Está Seguro de activar la persona?", function(result){
		if(result)
        {
        	$.post("../ajax/votpredivotos.php?op=activar", {prvo_prvo : prvo_prvo}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();