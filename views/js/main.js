$(function () {

	// Elementos ocultos
	$("#my_account_save_name,#my_account_save_pass,#frmEditUser,#btn-editsave-user").hide();

	// Elementos bloqueados
	$('#my_a_name,#my_a_pass,#my_a_pass_confirm,#my_a_pass_actual').attr('disabled', true);

	// Ejecutar función que muestra la lista de usuarios en la vista users
	list_users();

	// Cerrar sesión
	$(document).on("click", "#closesesion", function () {

		alertify.confirm("Cerrar sesión", "¿Estás seguro de querer cerrar la sesión?", function () {

			window.location = '../controllers/cerrarSesion.php';

		}, function () { });

		return false;

	});

	// Botón de editar usuario
	$(document).on("click", "#btn-edit-user", function () {

		$("#frmEditUser,#btn-editsave-user").show();
		$("#frmEditName").val(document.getElementById('nombre').innerHTML);
		$("#frmEditStatus").val(1);
		$(this).hide();
		return false;

	});

	// Guardar cambios editar usuario
	$(document).on("click", "#btn-editsave-user", function () {

		user = document.getElementById('usuario').innerHTML;

		$.ajax({
			type: "post",
			url: "../controllers/ajaxController.php",
			// url: "../controllers/editUserController.php",
			data: { usuario: user, name: $("#frmEditName").val(), status: $("#frmEditStatus").val() },
			success: function (r) {

				switch (r) {
					case "1":
						alertify.success("Actualizado con éxito!");
						$("#frmEditUser")[0].reset();
						$("#zoom-user-modal").modal('hide');
						$("#frmEditUser").hide();
						list_users();
						break;

					case "":
						alertify.warning("No se pudo actualizar los datos!");
						break;
				}

			}
		});

		return false;

	});

	// Registrar usuarios
	$(document).on("submit", "#frm-reg-user", function () {

		$.ajax({
			type: "post",
			url: "../controllers/ajaxController.php",
			data: $("#frm-reg-user").serialize(),
			success: function (r) {
				console.log(r);

				switch (r) {
					case '1':
						alertify.success("Usuario registrado correctamente");
						$("#frm-reg-user")[0].reset();
						$("#reg-user-modal").modal('hide');
						list_users();
						break;

					case '2':
						alertify.warning("Formulario incompleto");
						break;

					case "":
						alertify.error("No se pudo registrar!");
						$("#frm-reg-user")[0].reset();
						break;
				}

			}
		});

		return false;

	});

	// Función de interacción de los botones en la vista myaccount
	$(document).on('click', '#my_account_name', function () {

		$("#my_account_save_name").show();
		$("#my_account_save_pass").hide();
		$("#my_a_name").attr('disabled', false);
		$("#my_a_pass,#my_a_pass_confirm,#my_a_pass_actual").attr('disabled', true);
		return false;

	});

	// Función de interacción de los botones en la vista myaccount
	$(document).on('click', '#my_account_pass', function () {

		$("#my_account_save_pass").show();
		$("#my_account_save_name").hide();
		$("#my_a_name").attr('disabled', true);
		$("#my_a_pass,#my_a_pass_confirm,#my_a_pass_actual").attr('disabled', false);
		return false;

	});

	// Función que actualiza la el nombre del usuario en la vista myaccount
	$(document).on('click', '#my_account_save_name', function () {

		name = $("#my_a_name").val();
		myaccount_update(name);
		$(this).hide();
		return false;

	});

	// Función que actualiza la contraseña del usuario en la vista myaccount
	$(document).on('click', '#my_account_save_pass', function () {

		$("#my_a_pass,#my_a_pass_actual").attr('disabled', false);
		new_pass = $("#my_a_pass").val();
		old_pass = $("#my_a_pass_actual").val();
		myaccount_update_pass(old_pass, new_pass);
		return false;

	});

	// Comparar contraseñas
	$(document).on("focusout", "#my_a_pass", function () {

		var vacio = "La contraseña no puede estar vacía";
		var longitud = "La contraseña debe estar formada entre 6-10 carácteres";

		pass1 = $('#my_a_pass').val();
		pass2 = $('#my_a_pass_confirm').val();

		if (pass1.length == 0 || pass1 == "") {

			document.getElementById("msg_pass").innerHTML = vacio;
			$("#msg_pass").addClass("text-danger");
			$("#msg_pass").removeClass("text-success");

		} else {

			if (pass1.length < 6 || pass1.length > 10) {

				document.getElementById("msg_pass").innerHTML = longitud;
				$("#my_a_pass_confirm").attr('disabled', true);

			} else {

				if (pass1.length > 5 || pass1.length < 11) {

					$("#my_a_pass_confirm").attr('disabled', false);

					$("#my_a_pass_confirm").on('keyup', function () {

						coincidePassword();

					});

				} else {

					$("#my_a_pass_confirm").attr('disabled', true);

				}

			}

		}

	});
	// Este boton nos ayudara a generar los reporte PDF atravez de un select 
	$("#gen").attr('disabled', 'disabled');
	var valor = $("#soli").val();
	$('#soli').on({
		change: function () {

			$("#gen").removeAttr('disabled');
			//   console.log($("#soli").val());
			event.preventDefault();

		}
	});

	$('#gen').on({
		click: function () {

			switch ($("#soli").val()) {
				case "1":
					// console.log("es 1");
					window.open("../myaccount", "_blank");
					break;

				case "2":
					// console.log("es 2");
					window.open("../users", "_blank");
					break;

				case "3":
					// console.log("es 3");
					window.open("../myaccount", "_blank");
					break;

				default:
					break;
			}
			event.preventDefault();
	
		}
	});



}); // Cierre de la función ready



//función que comprueba las dos contraseñas
function coincidePassword() {

	var confirmacion = "Las contraseñas coinciden";
	var negacion = "No coinciden las contraseñas";

	var valor1 = $('#my_a_pass').val();
	var valor2 = $('#my_a_pass_confirm').val();

	//condiciones dentro de la función

	if (valor1 != valor2) {

		document.getElementById("msg_pass").innerHTML = negacion;
		$("#msg_pass").addClass("text-danger");
		$("#msg_pass").removeClass("text-success");

	}

	if (valor1.length != 0 && valor1 == valor2) {

		document.getElementById("msg_pass").innerHTML = confirmacion;
		$("#msg_pass").removeClass("text-danger");
		$("#msg_pass").addClass("text-success");
		$("#my_a_pass_actual").attr('disabled', false);
		$("#my_a_name,#my_a_pass,#my_a_pass_confirm").attr('disabled', true);

	}

}

// Función que carga los datos del usuario en la vista myaccount
function myaccount() {

	$.ajax({
		type: "get",
		url: "../controllers/myAccountController.php",
		success: function (r) {

			datos = JSON.parse(r);
			document.getElementById('my_a_user').innerHTML = datos[0];
			document.getElementById('my_a_name').value = datos[1];
			document.getElementById('my_a_date').innerHTML = datos[2];
			document.getElementById('my_a_rol').innerHTML = datos[3];
			document.getElementById('my_a_status').innerHTML = datos[4];

		}
	});

}

// Función que actualiza el nombre del usuario en la vista myaccount
function myaccount_update(name) {

	$.ajax({
		type: "post",
		url: "../controllers/ajaxController.php",
		data: { my_a_name: name },
		success: function (r) {

			switch (r) {
				case "1":
					alertify.success('Datos actualizados correctamente!');
					myaccount();
					$('#my_a_name,#my_a_pass,#my_a_pass_confirm,#my_a_pass_actual').attr('disabled', true);
					$("#my_account_save").hide();
					$("#my_account_edit").show();
					break;

				case "":
					alertify.warning('No se pudo actualizar el nombre!');
					break;
			}

		}

	});

}

// Función que actualiza la contraseña del usuario en la vista myaccount
function myaccount_update_pass(old_pass, new_pass) {

	$.ajax({
		type: "post",
		url: "../controllers/ajaxController.php",
		data: { current_pass: old_pass, new_pass: new_pass },
		success: function (r) {

			switch (r) {
				case "":
					alertify.error("No se pudo actualizar la clave");
					break;

				case "1":
					alertify.success('Contraseña actualizada correctamente!');
					myaccount();
					$('#my_a_name,#my_a_pass,#my_a_pass_confirm,#my_a_pass_actual').attr('disabled', true);
					$("#my_a_pass,#my_a_pass_confirm,#my_a_pass_actual").val("");
					document.getElementById("msg_pass").innerHTML = "";
					$("#my_account_save_pass").hide();
					break;
			}

		}

	});

}

// Obtener lista de usuarios
function list_users() {

	$('#userTable').DataTable({
		"destroy": true,
		"ajax": {
			"url": "../controllers/usersController.php"
		},
		"columns": [
			{ "data": "nro" },
			{ "data": "civ" },
			{ "data": "nombre" },
			{ "data": "rol" },
			{ "data": "reg_date" },
			{ "data": "opciones" }
		],
		"columnDefs": [
			{
				"targets": 0,
				"className": "text-center",
				"width": "4%"
			},
			{
				"targets": 1,
				"className": "text-center",
			},
			{
				"targets": 3,
				"className": "text-center",
			},
			{
				"targets": 4,
				"className": "text-center",
			},
			{
				"targets": 5,
				"className": "text-center"
			}
		],
		"language": spanish
	});

}

// Zoom usuarios
function zoom_user(id) {

	$.get("../controllers/ajaxController.php", { zoom_user: id }, function (r) {

		datos = JSON.parse(r);
		$("#usuario").html(datos.civ).addClass('font-weight-bold');
		$("#nombre").html(datos.nombre).addClass('font-weight-bold');
		$("#rol").html(datos.rol).addClass('font-weight-bold');
		$("#fecha").html(datos.reg_date).addClass('font-weight-bold');

	});

}

// Borrar usuarios
function delete_user(id) {

	alertify.confirm("Eliminar usuario", "¿Seguro quieres eliminar este usuario?", function () {

		$.get("../controllers/ajaxController.php", { d_user: id }, function (r) {

			alertify.success("Usuario eliminado con éxito");
			list_users();

		});

	}, function () { });

}

// Idioma español para datatables
var spanish = {

	"sProcessing": "Procesando...",
	"sLengthMenu": "Mostrar _MENU_ registros",
	"sZeroRecords": "No se encontraron resultados",
	"sEmptyTable": "Ningún dato disponible en esta tabla",
	"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
	"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
	"sInfoPostFix": "",
	"sSearch": "Buscar:",
	"sUrl": "",
	"sInfoThousands": ",",
	"sLoadingRecords": "Cargando...",
	"oPaginate": {
		"sFirst": "Primero",
		"sLast": "Último",
		"sNext": "Siguiente",
		"sPrevious": "Anterior"
	},
	"oAria": {
		"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
		"sSortDescending": ": Activar para ordenar la columna de manera descendente"
	}

}

// Grafica
function crearCadenaLineal(json) {
	var parsed = JSON.parse(json);
	var arr = [];
	for (var x in parsed) {
		arr.push(parsed[x]);
	}
	return arr;
}

function graficaHome(datosX1, datosY1, datosX2, datosY2) {
	var linea1 = {
		x: datosX1,
		y: datosY1,
		type: 'scatter',
		name: 'Administrador'
	};

	var linea2 = {
		x: datosX2,
		y: datosY2,
		type: 'scatter',
		name: 'Analista'
	};

	var layout = {
		title: 'Usuarios',
		xaxis: {
			title: 'Meses',
			showgrid: false,
			zeroline: false
		},
		yaxis: {
			title: 'Total',
			showline: false
		}
	};

	var data = [linea1, linea2];

	Plotly.newPlot('graficaLinea', data, layout, {}, { showSendToCloud: true });
}

// Buscar trabajador
const buscar = () => {

	let cedula = document.getElementById("civ");
	let rcedula = document.getElementById("rciv");
	let rnombres = document.getElementById("rnombres");
	let rjquia = document.getElementById("rjquia");


	$.get("../controllers/searchController.php", { civ: cedula.value }, function (r) {
		r = JSON.parse(r);
		console.log(r);
		rcedula.innerHTML = r.cedula;
		rnombres.innerHTML = r.nombres;
		rjquia.innerHTML = r.jquia;

	});

}


//Comprobar si soporta fetch
/*
if(window.fetch=!undefined) console.log('ok')
else console.log('no');
*/