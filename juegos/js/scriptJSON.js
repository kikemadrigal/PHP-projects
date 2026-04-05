$(document).ready(function() {
    	$('#actualizarResultados').click(function(){
			$.ajax({
				url:'ip.php',
				dataType:"json",
				success: function(data){
					//$.each(data,function(index){
						//var name=data[index].name;
						
						//var jugadores=data[index].jugadores;
						$('#respuesta').append('<h2>Name: '+data+' </h2>');
						/*$.each(jugadores, function(_index){
								$('#respuesta').append('<p>Jugador'+ jugadores[_index].nombre+' - Puntos '+jugadores[_index].puntos+ '</p>')
							}) */
					//})	
				}//Fin de success
				
			})	//Fin de ajax
			
		
		
		
		})
});