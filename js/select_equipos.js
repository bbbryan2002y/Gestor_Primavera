function cambiotipo() {
	var id_tipo = $("#selecttipoid").val();
	$.ajax({
		url: "../fx/fselect.ajax.php",
		method: "POST",
		data: {
			"id":id_tipo
		},
		success: function(respuesta){
			$("#tipos").attr("disabled", false);
			$("#tipos").html(respuesta);
		}
	})
}