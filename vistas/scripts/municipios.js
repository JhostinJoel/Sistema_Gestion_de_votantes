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
	$.post("../ajax/DefMunicipios.php?op=selectDepartamentos", function(r){
		$("#muni_depa").html(r);
		$('#muni_depa').selectpicker('refresh');
	});
}

//Función limpiar
function limpiar()
{
	// $("#nombre").val("");
	$("#muni_descri").val("");
	$("#muni_muni").val("");
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
					url: '../ajax/defmunicipios.php?op=listar',
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
		url: "../ajax/defmunicipios.php?op=guardaryeditar",
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

function mostrar(muni_muni)
{
	$.post("../ajax/defmunicipios.php?op=mostrar",{muni_muni : muni_muni}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);
        
		// $("#nombre").val(data.nombre);	
		$("#muni_muni").val(data.muni_muni);
		$("#muni_descri").val(data.muni_descri);
		$("#muni_depa").val(data.muni_depa);
		$('#muni_depa').selectpicker('refresh');

 	})
}

//Función para desactivar registros
function desactivar(muni_muni)
{
	bootbox.confirm("¿Está Seguro de desactivar el Municipio?", function(result){
		if(result)
        {
        	$.post("../ajax/defmunicipios.php?op=desactivar", {muni_muni : muni_muni}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(muni_muni)
{
	bootbox.confirm("¿Está Seguro de activar el Municipio?", function(result){
		if(result)
        {
        	$.post("../ajax/defmunicipios.php?op=activar", {muni_muni : muni_muni}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();