function Enemigo(x,y){
	this.width=60;
	this.height=60;
	this.x=x;
	this.y=y;
	this.contador=0;
	this.aleatorio=function(inferior, superior){
		var posibilidades=superior-inferior;
		var random=Math.random()*posibilidades;
		random=Math.floor(random);
		return parseInt(inferior)+random;
	}
	this.mover=function(){

	}
	
}