function Personaje(context, src , x, y, width, height){
	this.xStart =x;
	this.yStart =y;
	
	this.width=width;
	this.height=height;
	this.vx=0;
	this.vy=0;
	this.x=x+this.vx;
	this.y= y+this.vy
	this.direccion=1;
	this.contador=0;
	var imagen = new Image();
	imagen.src=src;
	this.dibujarPersonaje=function(){
		context.save();
		context.drawImage(imagen, this.x, this.y);	
		context.restore();
		return context;
	}
	this.avanzar=function(){
		this.x+=6;
		//console.log("velocidad x: "+this.x);
		if(this.x>=canvas.width-this.width) this.x=canvas.width-this.width;
	}
	this.retroceder=function(){
		this.x-=6;
		if(this.x<0) this.x=0;
	}
	this.saltar=function(){
			this.y -=10;
	}
	this.aplicarGravedad=function(gravedad, valorRebote){
		this.y+=gravedad;
		if(this.y+this.height>canvas.height){
			this.y=canvas.height-this.height;
		}
	}
	/*this.getX=function(){
		return this.x+=this.vx;
	}
	this.getY=function(){
		return this.y+=this.vy;	
	}*/

};