var canvas, context;
var stage, fondo;
var keyboard=[];
var disparos=[];
var intv;
var personaje;
var gravedad=0.8;
var val_rebote=0;
var imagen, flecha_arriba;

function nivelUno(){
	canvas=document.getElementById("canvas");
	context=canvas.getContext("2d");
	canvas.height=320;
	canvas.width=450;
	fondo=new Image();
	fondo.src="imagenes/fondo.png";
	flecha_arriba=new Image();
	flecha_arriba.src="imagenes/flecha_arriba.png";
	
	flecha_arriba.onclick=function(){
		
		//personaje.avanzar();
		console.log('se ha pinchado la flecha arriba');
		//actualizarPersonajeEnServidor();
		//obtenerCoordenadasDelPersonajeEnServidor();
	};
	
	canvas.appendChild(flecha_arriba);
	personaje=new Personaje(100,100,20, 50);
	imagen = new Image();
	imagen.src="imagenes/barra_azul.png";
	
}







var unaVezIzquierda=false;
var unaVezDerecha=false;
var unaVezArriba=false;
var unaVezAbajo=false;
function addKeyBoardEvents(){
	agregarEvento(document,'keydown', function(e){
		//Ponemos en true la tecla presionada
		keyboard[e.keyCode]=true;
		//console.log(e.keyCode);
		
		
	});
	agregarEvento(document,'keyup', function(e){
		//Ponemos en  falso la tecla que dejó de ser presionada
		keyboard[e.keyCode]=false;
		unaVezIzquierda=false;
		unaVezDerecha=false;
		unaVezArriba=false;
		unaVezAbajo=false;
	});

	function agregarEvento(elemento, nombreEvento, funcion){
		if(elemento.addEventListener){
			elemento.addEventListener(nombreEvento, funcion, false);
		}else if(elemento.attachEvent){
			elemento.attachEvent(nombreEvento, funcion);
		}
	}
}





function obtenerPersonajes(){
	$.ajax({
		type: 'GET',
		url: 'obtenerpersonajes.php',
	}).done(function(info){
		
		
	
	})
}








	//
function moverPersonaje(){

	if(keyboard[37]){
		if(unaVezIzquierda==false){
			personaje.x-=4;
			actualizarPersonajeEnServidor();
			obtenerCoordenadasDelPersonajeEnServidor();
			console.log('objeto personaje movido hacia la izquierda 6 px');
			//unaVezIzquierda=true;
		}
		
	}
	if(keyboard[39]){
		if(unaVezDerecha==false){
			personaje.avanzar();
			console.log('objeto personaje movido hacia la derecha 6 px');
			actualizarPersonajeEnServidor();
			obtenerCoordenadasDelPersonajeEnServidor();
			//unaVezDerecha=true;
		}
	}
	//if(keyboard[38]) personaje.y-=6;
	if(keyboard[38]){
		if(unaVezArriba==false){
			personaje.saltar();
			console.log('objeto personaje movido hacia arriba 6 px');
			actualizarPersonajeEnServidor();
			obtenerCoordenadasDelPersonajeEnServidor();
			//unaVezArriba=true;
		}
	}
	if(keyboard[40]){
		if(unaVezAbajo==false){
			 personaje.y+=4;
			 console.log('objeto personaje movido hacia abajao 6 px');
			 actualizarPersonajeEnServidor();
			 obtenerCoordenadasDelPersonajeEnServidor();
			//unaVezAbajo=true;
		}
	}
	if(keyboard[32]) fire();
	
}

var actualizarPersonajeEnServidor=function(){
	//$.ajax({
		//type: 'GET',
		//url: 'obtenerip.php',
	//}).done(function(info){
		var personajeip="79.109.184.175";
		$.ajax({
			type: 'POST',
			url: 'actualizarpersonaje.php',
			data: "personajex="+personaje.x+"&personajey="+personaje.y+"&personajeip="+personajeip
		}).done(function(info){
			console.log(info);
		});
	//})
}
function obtenerCoordenadasDelPersonajeEnServidor(){
	//$.ajax({
		//type: 'GET',
		//url: 'obtenerip.php',
	//}).done(function(info){
		var personajeip="79.109.184.175";
		$.ajax({
			type: 'POST',
			url: 'obtenercoordenadaspersonaje.php',
			data: "personajeip="+personajeip
		}).done(function(info){
			console.log("Coordenadas: "+info);
			var coordenadas =info.split(',');
			personaje.servidorx = coordenadas[0];
			personaje.servidory = coordenadas[1];
				
		});
	//})
	
}









function fire(){
	var disparo=new Disparo(personaje.x, personaje.y); 
	disparos.push(disparo);
}
function dibujarDisparos(){
	context.save();
	context.fillStyle='white';
	for(var i in disparos){
		var disparo=disparos[i];
		//context.fillRect(disparo.x, disparo.y, disparo.width, disparo.height);
		context.beginPath();
		context.arc(disparo.x, disparo.y,5,0,2*Math.PI);

		context.strokeStyle = 'white';
		context.fill();
		context.stroke();
	}
	context.restore();
}
function moverDisparos(){
	for(var i in disparos){
		var disparo=disparos[i];
		disparo.y -= 2;
	}
	disparos = disparos.filter(function(disparo){
		return disparo.y > 0;
	})
}



     


function aplicarFuerzas(){
	personaje.aplicarGravedad(gravedad,val_rebote);
}






function hit(a,b){
	var hit=false;
	//Colisiones horizontales
	if(b.x+b.width>=a.x && b.x<a.x+a.width){
		//Colisiones verticales
		if(b.y+b.height>=a.y && b.y <  a.y+a.height){
			hit=true;
		}
	}
	//Colision de a con b
	if(b.x<=a.x && b.x+b.width>=a.x+a.width){
		//Colisiones verticales
		if(b.y<=a.y&&b.y+b.height>=a.y+a.height){
			hit=true;
		}
	}
	//Colision de b con a
	if(a.y<=b.x && a.x +a.width >=b.x+b.width){
		if(a.y<=b.y&&a.y+a.height>=b.y+b.height){
			hit =true;
		}
	}
	return hit;
}






 










function frameLoop(){
	canvas.width=canvas.width;
	context.drawImage(fondo, 0, 0);
	context.drawImage(flecha_arriba, 10, 0);
	moverPersonaje();
	
	
	context.drawImage(imagen, personaje.servidorx, personaje.servidory);
	
	//aplicarFuerzas();
	
	//context.drawImage(nave, personaje.x, personaje.y);
	dibujarDisparos();
	moverDisparos();
}
















nivelUno();
addKeyBoardEvents();
intv=setInterval(frameLoop,1000/55);

window.onunload=function(){
	 //alert('Adios');
	 document.getElementById('mensajesservidor').innerHTML+="\nUno que se va: ";
	 optenerIpUsuario();
	 $('#mensajesservidor').html('borrando usuario que se va.');
	 borrarUsuario();
}
window.onload=function(){
	//var ip=optenerIpUsuario();
	//console.log("el valor es"+ip);
	//document.getElementById('mensajesservidor').innerHTML+="";
	
	
	$('#mensajesservidor').html('\nUno que entra: ');
	optenerIpUsuario();
	//console.log('comprobando usuarios');
	verUsuarios();
}


