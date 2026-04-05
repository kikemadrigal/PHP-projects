function Personaje(x, y, width, height, ip){
	this.ip=ip;
	this.x=x;
	this.y=y;
	this.xStart =x;
	this.yStart =y;
	this.servidorx=x;
	this.servidory=y;
	this.width=width;
	this.height=height;
	this.vx=0;
	this.vy=0;
	//this.x=x+this.vx;
	//this.y= y+this.vy
	this.direccion=1;
	this.contador=0;
	this.avanzar=function(){
		
		//console.log("velocidad x: "+this.x);
		//if(this.x>=canvas.width) this.x=canvas.width-this.width;
		 this.x+=4;
	}
	this.retroceder=function(){
		
		//if(this.x<20 || this.servidorx<20) this.x=20;
		 this.x-=4;
	}
	this.saltar=function(){
			this.y -=4;
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