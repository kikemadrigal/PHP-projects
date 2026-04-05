var canvas, context;
var stage, fondo;
var keyboard=[];
var personaje1, personaje2;
var imagen1, imagen2, flecha_arriba;
var arrayConIpsPersonajes;
var crearPersonajesAsociadosASuIp=function(){
	$.ajax({
		type: 'POST',
		url:"funcionesusuarios.php",
		data: "accion=verUsuarios",
		async: false,
	}).done(function(info){
		arrayConIpsPersonajes =info.split(',');
		personaje1=new Personaje(90,100,20, 50, arrayConIpsPersonajes[0]);
		imagen1 = new Image();
		console.log('Personaje 1  creado '+arrayConIpsPersonajes[0]);
		imagen1.src="imagenes/barra_azul.png";
		/*if(arrayConIpsPersonajes.length==3){
			console.log('Personaje 2  creado '+arrayConIpsPersonajes[1]);
			personaje2=new Personaje(330,100,20, 50, arrayConIpsPersonajes[1]);
			imagen2 = new Image();
			imagen2.src="imagenes/barra_roja.png";
		}*/
		
		
		
	});
}

//El nivel uno sirve para inicializar las variables del nivel 1
function nivelUno(){
	canvas=document.getElementById("canvas");
	context=canvas.getContext("2d");
	canvas.height=320;
	canvas.width=450;
	fondo=new Image();
	fondo.src="imagenes/fondo.png";
	flecha_arriba=new Image();
	flecha_arriba.src="imagenes/flecha_arriba.png";



	/*$.ajax({
		type: 'POST',
		url:"funcionesusuarios.php",
		data: "accion=obtenerNumeroDePersonajes",
		success:function(result){
			console.log(result);
     		switch(result)
			{
				case '1':
				
					
					personaje1=new Personaje(100,100,20, 50, 1);
					imagen1 = new Image();
					imagen1.src="imagenes/barra_azul.png";
					numeroDePersonajes=1;
			
				break;
				case '2':
					 personaje1=new Personaje(100,100,20, 50, 1);
					imagen1 = new Image();
					imagen1.src="imagenes/barra_azul.png";
				
					 personaje2=new Personaje(100,100,20, 50, 2);
					 imagen2 = new Image();
					 imagen2.src="imagenes/barra_azul.png";
					 
					 numeroDePersonajes=2;
				
				
				break;
			}
    }});*/
	
	
}





var teclaPulsada=true;
function addKeyBoardEvents(){
	agregarEvento(document,'keydown', function(e){
		//Ponemos en true la tecla presionada
		keyboard[e.keyCode]=true;
		//Como moverPersonaje se ejecuta 50 veces por segundo
		//creo un boleano para evita repeticiones
		teclaPulsada=true;
		
	});
	agregarEvento(document,'keyup', function(e){
		//Ponemos en  falso la tecla que dejó de ser presionada
		keyboard[e.keyCode]=false;
	});


	/*agregarEvento(document, 'onclick', function(e){
		console.log('Has hecho click');
	});*/







	function agregarEvento(elemento, nombreEvento, funcion){
		if(elemento.addEventListener){
			elemento.addEventListener(nombreEvento, funcion, false);
		}else if(elemento.attachEvent){
			elemento.attachEvent(nombreEvento, funcion);
		}
	}
}



function moverPersonaje(personaje){
	//console.log("ha entrado: "+personaje.ip+", "+personaje.x);
	if(keyboard[38]){
		if(teclaPulsada && personaje.y >0){
			personaje.y-=4;
			 console.log('ip:'+personaje.ip+', canvas height:'+canvas.height+", personaje heifh= "+personaje.height+", personaje y: "+personaje.y);
			
			actualizarPersonajeEnServidor(personaje);
			obtenerCoordenadasDelPersonajeEnServidor(personaje);
			teclaPulsada=false;
		}
	}
	if(keyboard[40]){
		var largoPersonaje=personaje.y+personaje.height*2;
		if(teclaPulsada && largoPersonaje<canvas.height){
			 personaje.y+=4;
			  console.log('id:'+personaje.ip+', canvas height:'+canvas.height+", personaje heifh= "+personaje.height+", personaje y: "+personaje.y);
			actualizarPersonajeEnServidor(personaje);
			obtenerCoordenadasDelPersonajeEnServidor(personaje);
			teclaPulsada=false;
		}	
	}
}


var actualizarPersonajeEnServidor=function(personaje){
	//$.ajax({
		//type: 'POST',
		//url: 'obtenerip.php'
	//}).done(function(info){
		//var personajeip=info;
		$.ajax({
			type: 'POST',
			url: 'actualizarpersonaje.php',
			data: "personajex="+personaje.x+"&personajey="+personaje.y+"&personajeip="+personaje.ip
		}).done(function(info){
			//console.log(info);
		});
	//})
}
function obtenerCoordenadasDelPersonajeEnServidor(personaje){
	//$.ajax({
		//type: 'POST',
		//url: 'obtenerip.php'
	//}).done(function(info){
		//var personajeip=info;
		$.ajax({
			type: 'POST',
			url: 'obtenercoordenadaspersonaje.php',
			data: "personajeip="+personaje.ip
		}).done(function(info){
			//console.log("Coordenadas: "+info);
			var coordenadas =info.split(',');
			personaje.servidorx = parseInt(coordenadas[0]);
			personaje.servidory = parseInt(coordenadas[1]);	
		});
	//});
		
	//})
	
}












     














/***********************Colisiones*************************/

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
/*********Fin del control de colisiones*************************/





 









//EL frameLoop hirá redibujando lapantalla 55 veces por segundo
function frameLoop(){
	canvas.width=canvas.width;
	context.drawImage(fondo, 0, 0);
	context.drawImage(flecha_arriba, 10, 0);
	context.drawImage(imagen1, personaje1.servidorx, personaje1.servidory);
	moverPersonaje(personaje1);
	if(arrayConIpsPersonajes.length==3){
		obtenerCoordenadasDelPersonajeEnServidor(personaje1);
		/*obtenerCoordenadasDelPersonajeEnServidor(personaje2);
		context.drawImage(imagen2, personaje2.servidorx, personaje2.servidory);*/
	}
}









var soloUnaVez=true;

$('document').ready(function() {
	insertarEsteUsuarioConSuIp();
	//Esta funcion pone un cartel abajo con la ip del cliente
	verMiIp();
	//Esta funcion pone un cartel arriba con todas las ips
	verUsuarios();
	
	//Inicializo las variables del nivel
	nivelUno();
	//Creo los objetos Personaje
	crearPersonajesAsociadosASuIp();
	//console.log("Prueba:  "+personaje1.ip+", "+personaje1.y+", "+personaje1.width+", "+personaje1.height);
	console.log('Hay creados: '+arrayConIpsPersonajes.length+" jugadores");
	addKeyBoardEvents();
	//frameLoop es donde se redibuja la pantalla y los movimientos
	setInterval(frameLoop,1000/55);
	setInterval(verUsuarios,1000);
 }); 


$(window).on('beforeunload', function() { 
	borrarUsuario();
	return 'estas seguro que quieres salir';
 }); 



