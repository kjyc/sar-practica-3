function esconderReceta(element){
 	// Crear el objeto XMLHttpRequest (dependiente del navegador)
	var xhr;
	if(XMLHttpRequest)
		xhr = new XMLHttpRequest();
	else
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	// Establecer el método (GET), la URL (script PHP y parámetro) y
	//  si la solicitud es asíncrona (true)
	xhr.open('GET', '../resources/php/esconderReceta.php?id='+element, true);
	// Establecer rutina de atención (handler)
	xhr.onreadystatechange = function()
	{
		// Si la respuesta ha sido correcta
		if(xhr.readyState == 4 && xhr.status == 200)
			// Asignar el texto del comentario completo enviado
			//  por el servidor al elemento correspondiente de la lista
			document.getElementById(element).innerHTML = xhr.responseText;
	}
	// Enviar la solicitud AJAX
	xhr.send('');   
}

function mostrarReceta(element){
	// Crear el objeto XMLHttpRequest (dependiente del navegador)
	var xhr;
	if(XMLHttpRequest)
		xhr = new XMLHttpRequest();
	else
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	// Establecer el método (GET), la URL (script PHP y parámetro) y
	//  si la solicitud es asíncrona (true)
	xhr.open('GET', '../resources/php/mostrarReceta.php?id='+element, true);
	// Establecer rutina de atención (handler)
	xhr.onreadystatechange = function()
	{
		// Si la respuesta ha sido correcta
		if(xhr.readyState == 4 && xhr.status == 200)
			// Asignar el texto del comentario completo enviado
			//  por el servidor al elemento correspondiente de la lista
			document.getElementById(element).innerHTML = xhr.responseText;
	}
	// Enviar la solicitud AJAX
	xhr.send('');

}
