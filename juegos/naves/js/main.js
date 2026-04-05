//Objetos importantes de canvas
var canvas=document.getElementById('game');
canvas.width='800';
canvas.height='400'
var	ctx=canvas.getContext('2d');
var fondo, imgNave, imgEnemigo;
var teclado={};
//Array para los disparos
var disparos=[];
//Array para los disparos de los enemigos
var disparosEnemigos=[];
//Arreglo que almacena los enemigos
var enemigos=[];
//Crear el objeto de la nave
var nave={
	x:100,
	y:canvas.height-100,
	width:50,
	height:50
}

var juego={
	estado:'iniciando'
};

var imagenes=['imagenes/enemigo.png', 'imagenes/nave.png', 'imagenes/fondo.png'];
var preloader;
//Definición de funciones

function loadMedia(){
	preloader=new PreloadJS();
	preloader.onProgress=progesoCarga;
	cargar();
}
function cargar(){
	while(imagenes.length>0){
		var imagen=imagenes.shift();
		preloader.loadFile(imagen);
	}
}

function progesoCarga(){
	console.log(parseInt(preloader.progress*100)+"%");
	if(preloader.progress==1){
		var interval=window.setInterval(frameLoop,1000/55);
		fondo=new Image();
		fondo.src='imagenes/fondo.png';
		imgNave=new Image();
		imgNave.src='imagenes/nave.png';
		imgEnemigo=new Image();
		imgEnemigo.src='imagenes/enemigo.png';
	}
}
/*function loadMedia(){

	fondo=new Image();
	fondo.src='imagenes/fondo.png';
	fondo.onload=function(){
		var intervalo=window.setInterval(frameLoop, 1000/55);
	}
	
}*/






function dibujarEnemigos(){
	for(var i in enemigos){
		var enemigo=enemigos[i];
		ctx.save();
		if(enemigo.estado=='vivo') ctx.fillStyle='red';
		if(enemigo.estado=='muerto') ctx.fillStyle='black';
		//ctx.fillRect(enemigo.x, enemigo.y, enemigo.width, enemigo.height);
		ctx.drawImage(imgEnemigo,enemigo.x, enemigo.y, enemigo.width, enemigo.height);
		ctx.restore();
	}

}function dibujarDisparosEnemigos(){
	for(var i in disparosEnemigos){
		var disparo=disparosEnemigos[i];
		ctx.save();
		ctx.fillStyle='yellow'
		ctx.fillRect(disparo.x, disparo.y, disparo.width, disparo.height);
		ctx.restore();
	}
}
function moverDisparosEnemigos(){
	for(var i in disparosEnemigos){
		var disparo=disparosEnemigos[i];
		disparo.y +=3;
	}
	disparosEnemigos=disparosEnemigos.filter(function(disparo){
		return disparo.y <canvas.height;
	});

}
function actualizaEnermigos(){
	function agregarDisparosEnemigos(enemigo){
		return {
			x:enemigo.x,
			y:enemigo.y,
			width:10,
			height:33,
			contador:0
		}
	}
	if(juego.estado=='iniciando'){
		for(var i=0; i<10;i++){
			enemigos.push({
				x:10+(i*50),
				y:10,
				width:40,
				height:40,
				estado:'vivo',
				contador:0
			});
		}
		juego.estado='juagndo';

	}
	for(var i in enemigos){
		var enemigo=enemigos[i];
		if(!enemigo) continue;
		if(enemigo && enemigo.estado=='vivo'){
			enemigo.contador++;
			enemigo.x+=Math.sin(enemigo.contador*Math.PI / 90)*5;

			if(aleatorio(0,enemigos.length*10)==4){
				disparosEnemigos.push(agregarDisparosEnemigos(enemigo));
			}
		}
		if(enemigo &&enemigo.estado=='hit'){
			enemigo.contador++;
			if(enemigo.contador>=20){
				enemigo.estado='muerto';
				enemigo.contador=0;
			}
		}
	}
	enemigos=enemigos.filter(function(enemigo){
		if(enemigo && enemigo.estado!='muerto') return true;
		return false;
	});
}









function dibujarFondo(){
	ctx.drawImage(fondo, 0, 0);
}
function dibujarNave(){
	ctx.save();
	//ctx.fillStyle='white';
	//ctx.fillRect(nave.x, nave.y, nave.width, nave.height);
	ctx.drawImage(imgNave,nave.x, nave.y, nave.width, nave.height);
	ctx.restore();
}




function agregarEventosTeclado(){
	agregarEvento(document,'keydown', function(e){
		//Ponemos en true la tecla presionada
		teclado[e.keyCode]=true;
		//console.log(e.keyCode);
	});
	agregarEvento(document,'keyup', function(e){
		//Ponemos en  falso la tecla que dejó de ser presionada
		teclado[e.keyCode]=false;
	});

	function agregarEvento(elemento, nombreEvento, funcion){
		if(elemento.addEventListener){
			elemento.addEventListener(nombreEvento, funcion, false);
		}else if(elemento.attachEvent){
			elemento.attachEvent(nombreEvento, funcion);
		}
	}
}
function moverNave(){
	if(teclado[37]){
		//movimiento a la izquierda
		nave.x -=6;
		if(nave.x<0) nave.x=0;
	}
	if(teclado[39]){
		var limite=canvas.width-nave.width;
		//movimiento a derecha
		nave.x +=6;
		if(nave.x>limite) nave.x=limite;
	}
	if(teclado[32]){
		//disparos
		if(!teclado.fire){
			fire();
			teclado.fire=true;
		}

	}
	else{
			teclado.fire=false;
		}

}






//Esta funcion se encarga de mover el disparo
function moverDisparos(){
	for(var i in disparos){
		var disparo=disparos[i];
		disparo.y -= 2;
	}
	disparos = disparos.filter(function(disparo){
		return disparo.y > 0;
	})
}
//Esta función se encraga de meter los disparos en el array disparos y ya depaso crea el objeto json disparo
function fire(){
	disparos.push({
		x: nave.x + 20,
		y: nave.y - 10,
		width: 10,
		height: 30
	});
}
function dibujarDisparos(){
	ctx.save();
	ctx.fillStyle='white';
	for(var i in disparos){
		var disparo=disparos[i];
		ctx.fillRect(disparo.x, disparo.y, disparo.width, disparo.height);
		//console.log(disparo);
	}
	ctx.restore();
}








function hit(a,b){
	var hit=false;
	//Colisiones horizontales
	if(b.x + b.width >= a.x && b.x < a.x + a.width){
		//Colisiones verticales
		if(b.y +b.height >= a.y && b.y <  a.y + a.height){
			hit=true;
		}
	}
	//Colision de a con b
	if(b.x <= a.x && b.x + b.width >= a.x + a.width){
		//Colisiones verticales
		if(b.y <= a.y && b.y + b.height >= a.y + a.height){
			hit=true;
		}
	}
	//Colision de b con a
	if(a.y <= b.x && a.x +a.width >= b.x + b.width){
		if(a.y <= b.y && a.y + a.height >= b.y + b.height){
			hit =true;
		}
	}


	return hit;
}
function verificarContacto(){
	for(var i in disparos){
		var disparo=disparos[i];
		for(j in enemigos){
			var enemigo=enemigos[j];
			if(hit(disparo, enemigo)){
				enemigo.estado='hit';
				enemigo.contador=0;
				//console.log('hubo contacto');
			}
		}
	}
}


function aleatorio(inferior, superior){
	var posibilidades=superior-inferior;
	var a=Math.random()*posibilidades;
	a=Math.floor(a);
	return parseInt(inferior)+a;
}

function frameLoop(){
	moverNave();
	actualizaEnermigos();
	moverDisparos();
	dibujarFondo();
	verificarContacto();
	dibujarEnemigos();
	dibujarDisparosEnemigos();
	moverDisparosEnemigos();
	dibujarDisparos();
	dibujarNave();
}


window.addEventListener('load', init);
function init(){
	loadMedia();
	agregarEventosTeclado();
}