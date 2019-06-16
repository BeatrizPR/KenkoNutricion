function foodList(valor, pagina) {
	var pagina = Number(pagina);
	$.ajax({
		url: 'http://localhost/aplicacion/food/searchFoodPagination',
		type: 'POST',
		data: 'valor=' + valor + '&pagina=' + pagina + '&boton=buscar'
	}).done(function (resp) {

		var d = resp.split("*");
		//Imprimimos los registro en nuestra Table
		var items = eval(d[0]);
		//console.log(items);
		html = "<table class='table table-bordered'><thead><tr><th>#</th><th>nombreAli</th><th>calorias</th><th>nombreCat</th><th>proteinas</th><th>hidratosCarbono</th><th>lipidos</th><th>fibra</th></tr></thead><tbody>";
		for (i = 0; i < items.length; i++) {
			datos = items[i][0] + "*" + items[i][1] + "*" + items[i][2] + "*" + items[i][3] + "*" + items[i][4] + "*" + items[i][5] + "*" + items[i][6] + "*" + items[i][7];

			html += "<tr><td>" + items[i][0] + "</td><td>" + items[i][1] + "</td><td>" + items[i][2] + "</td><td>" + items[i][19] + "</td><td>" + items[i][4] + "</td><td>" + items[i][5] + "</td><td>" + items[i][6] + "</td><td>" + items[i][7] + "</td></tr>";
		}
		html += "</tbody></table>"
		$("#lista").html(html);

		var totalRegister = d[1];
		//console.log(totalRegister);
		var totalPages = Math.ceil(totalRegister / 20);
		var inputSearch = $("#buscar").val();
		//alert(totalPages);
		paginationhtml = "<nav aria-label='Page navigation example'><ul class='pagination justify-content-center'>";
		if (pagina > 1) {
			paginationhtml += "<li class='page-item'><a class='page-link' href='javascript:void(0)' onclick='foodList(" + '"' + inputSearch + '","' + 1 + '"' + ")'>&laquo;</a></li>";
			paginationhtml += "<li class='page-item'><a class='page-link' href='javascript:void(0)' onclick='foodList(" + '"' + inputSearch + '","' + (pagina - 1) + '"' + ")'>&lsaquo;</a></li>";

		}
		else {
			paginationhtml += "<li class='disabled page-item'><a class='page-link' href='javascript:void(0)'>&laquo;</a></li>";
			paginationhtml += "<li class='disabled page-item'><a class='page-link' href='javascript:void(0)'>&lsaquo;</a></li>";
		}

		limite = 6;

		div = Math.ceil(limite / 2);

		// si la pagina de inicio se encuentra en un numero mayor al div que he creado con 5 valores, se mostraran las paginas restandole una por delante,
		//si la pagina en la que nos encontramos es más pequeña que el div, la pagina inicial será la 1.
		initPage = (pagina > div) ? (pagina - div) : 1;

		remainingPages = totalPages - pagina;
		//paginal final
		// si las paginas restantes son mas de las muestra el div, la última página será la pagina que estamos más el div, es decir, 5 más
		finalPage = (remainingPages > div) ? (pagina + div) : totalPages;

		for (i = initPage; i <= finalPage; i++) {
			if (i == pagina)
				paginationhtml += "<li id='activePagination' class='active page-item'><a class='page-link' href='javascript:void(0)'>" + i + "</a></li>";
			else
				paginationhtml += "<li class='page-item'><a class='page-link' href='javascript:void(0)' onclick='foodList(" + '"' + inputSearch + '","' + i + '"' + ")'>" + i + "</a></li>";
		}



		if (pagina < totalPages) {
			paginationhtml += "<li class='page-item' ><a class='page-link' href='javascript:void(0)' onclick='foodList(" + '"' + inputSearch + '","' + (pagina + 1) + '"' + ")'>&rsaquo;</a></li>";
			paginationhtml += "<li class='page-item'><a class='page-link' href='javascript:void(0)' onclick='foodList(" + '"' + inputSearch + '","' + totalPages + '"' + ")'>&raquo;</a></li>";

		}
		else {
			paginationhtml += "<li class='disabled page-item'><a class='page-link' href='javascript:void(0)'>&rsaquo;</a></li>";
			paginationhtml += "<li class='disabled page-item'><a class='page-link' href='javascript:void(0)'>&raquo;</a></li>";
		}
		paginationhtml += "</ul></nav>";
		$("#paginador").html(paginationhtml);

	});
}