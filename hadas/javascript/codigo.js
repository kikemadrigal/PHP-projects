function irA(menu){
		url = menu.options[menu.selectedIndex].value;
		window.open(url)
}
function ver(image){
document.getElementById('image').innerHTML = "<img src='"+image+"'>" 
}
function abrepdf(){	
	alert('encontrado');
	//window.location='../diccionario/android/drawables.doc';	
} 
step=0;
function autoImgFlip() {
	if (step < 3) step++;
	else step=0;
	if (step==0)a.src="imagenes/hada1.jpg";
	if (step==1){
		a.src="objetos/imagendos.jpg";
		setTimeout("autoImgFlip()", 3000);
	}
	if (step==2)a.src="objetos/imagentres.jpg";
	if (step==3)a.src="objetos/imagencuatro.jpg";
}


document.addEventListener('click', musicPlay);
document.addEventListener('focus', musicPlay);
document.addEventListener('load', musicPlay);
function musicPlay() {
	console.log("reproduciendo musica");
    document.getElementById('audio').play();
    document.removeEventListener('click', musicPlay);
}