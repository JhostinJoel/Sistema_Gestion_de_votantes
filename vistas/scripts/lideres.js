var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})

	$.post("../ajax/defescuelas.php?op=selectLideres", function(r){
		$("#lide_lide").html(r);
		$('#lide_lide').selectpicker('refresh');
	});
}

//Función limpiar
function limpiar()
{
	//$("#lide_lide").val("");
	$("#lide_id").val("");
	$("#lide_pri_nombre").val("");
	$("#lide_seg_nombre").val("");
	$("#lide_pri_apellido").val("");
	$("#lide_seg_apellido").val("");
	$("#lide_direccion").val("");
	$("#lide_telefono").val("");
	$("#lide_celular").val("");
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
					url: '../ajax/votlideres.php?op=listar',
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
		url: "../ajax/votlideres.php?op=guardaryeditar",
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

function mostrar(lide_lide)
{
	$.post("../ajax/votlideres.php?op=mostrar",{lide_lide : lide_lide}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);
 		$("#lide_lide").val(data.lide_lide);
 		$("#lide_tipo_id").val(data.lide_tipo_id);
 		$("#lide_id").val(data.lide_id);
 		$("#lide_pri_nombre").val(data.lide_pri_nombre);
 		$("#lide_seg_nombre").val(data.lide_seg_nombre);
 		$("#lide_pri_apellido").val(data.lide_pri_apellido);
 		$("#lide_seg_apellido").val(data.lide_seg_apellido);
 		$("#lide_direccion").val(data.lide_direccion);
 		$("#lide_telefono").val(data.lide_telefono);
 		$("#lide_celular").val(data.lide_celular);
 	})
}

//Función para desactivar registros
function desactivar(lide_lide)
{
	bootbox.confirm("¿Está Seguro de desactivar la persona?", function(result){
		if(result)
        {
        	$.post("../ajax/votlideres.php?op=desactivar", {lide_lide : lide_lide}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(lide_lide)
{
	bootbox.confirm("¿Está Seguro de activar la persona?", function(result){
		if(result)
        {
        	$.post("../ajax/votlideres.php?op=activar", {lide_lide : lide_lide}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();