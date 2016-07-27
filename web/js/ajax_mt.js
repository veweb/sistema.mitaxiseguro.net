$(document).ready(function(){
  $("#preguntas").change(function(){
  	var idpreg = $(this).find("option:selected").val();

  	
  	 var pathname = 'http://sistema.mitaxiseguro.net/index.php/mensajeria/pregselect';
  	 var parametros = {
                "idpreg" : idpreg
        };
     var pathname2 = 'http://sistema.mitaxiseguro.net/index.php/mensajeria/respselect';
  	 var parametros2 = {
                "idresp" : idpreg
        };   
  	$.ajax({	
                data:  parametros,
                url:   pathname,
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                	
                        $("#pregunta").html(response.substr (1, response.length -2));
                }
        });
        
       $.ajax({
                data:  parametros2,
                url:   pathname2,
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#respuesta").html(response.substr (1, response.length -2));
                }
        });
  	 
  	
  });
});