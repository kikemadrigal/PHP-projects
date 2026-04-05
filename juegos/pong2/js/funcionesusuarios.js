var borrarUsuario=function(){
	console.log('has entrado en borrar usuario');
	$.ajax({
		type: 'POST',
		url: 'obtenerip.php',
	}).done(function(info){
		console.log("la ip es: "+info);
		var ipUsuario=info;
		var parametros={
			accion: "eliminarUsuario",
			ipUsuario
		}
		$.ajax({
			type: 'POST',
			url: 'funcionesusuarios.php',
			data: parametros
		}).done(function(info){
			console.log(info);
		});
	})
}
function verMiIp(){
    	$.ajax({
		type: 'POST',
		url: 'obtenerip.php'
	}).done(function(info){
		document.getElementById('mensajesservidor').innerHTML='Tu jugador es el: '+info;
	});
	//return respuesta;
}



var verUsuarios=function(){
	$.ajax({
		type: 'POST',
		url:"funcionesusuarios.php",
		data: "accion=verUsuarios"
	}).done(function(info){
		var f=new Date();
	 	cad=f.getHours()+":"+f.getMinutes()+":"+f.getSeconds()+", "+f.getDay()+"/"+f.getMonth()+"/"+f.getFullYear(); 
		document.getElementById('divusuariosactivos').innerHTML=cad+" - "+info;
	});
}


var insertarEsteUsuarioConSuIp=function(){
	console.log('has entrado en insertar ip de jugador');
	$.ajax({
		type: 'POST',
		url:"funcionesusuarios.php",
		data: "accion=insertarNuevaIp"
	}).done(function(info){
		//console.log(info)
	});
}






