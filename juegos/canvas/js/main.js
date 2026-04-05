var canvas, context;
var stage, fondo;
var keyboard=[];
var disparos=[];
var intv;
var personaje;
var gravedad=0.8;
var val_rebote=0;


function nivelUno(){
	canvas=document.getElementById("canvas");
	context=canvas.getContext("2d");
	canvas.height=600;
	canvas.width=800;
	fondo=new Image();
	fondo.src="imagenes/fondo.png";
	personaje=new Personaje(context, "imagens/nave.png",canvas.width/2, canvas.height/2);
	personaje2=new Personaje(context, "imagens/nave.png",100, 100);
}









function addKeyBoardEvents(){
	agregarEvento(document,'keydown', function(e){
		//Ponemos en true la tecla presionada
		keyboard[e.keyCode]=true;
		console.log(e.keyCode);
		
	});
	agregarEvento(document,'keyup', function(e){
		//Ponemos en  falso la tecla que dejó de ser presionada
		keyboard[e.keyCode]=false;
	});

	function agregarEvento(elemento, nombreEvento, funcion){
		if(elemento.addEventListener){
			elemento.addEventListener(nombreEvento, funcion, false);
		}else if(elemento.attachEvent){
			elemento.attachEvent(nombreEvento, funcion);
		}
	}
}

function moverPersonaje(){
	if(keyboard[37]) personaje.retroceder(); //si se presiona la tecla izquierda que retroceda
	if(keyboard[39]) personaje.avanzar();
	//if(keyboard[38]) personaje.y-=6;
	if(keyboard[38]) personaje.saltar();
	if(keyboard[40]) personaje.y+=6;
	if(keyboard[32]) fire();
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
	context=personaje.dibujarPersonaje();
	context=personaje2.dibujarPersonaje();
	moverPersonaje();
	//aplicarFuerzas();
	
	//context.drawImage(nave, personaje.x, personaje.y);
	dibujarDisparos();
	moverDisparos();
}
















nivelUno();
addKeyBoardEvents();
intv=setInterval(frameLoop,1000/55);