
  $(document).ready(function(){


  	function MostrarContenido(data){
  		$("#contenido").html(data);
  	}

  	function MostrarError(){
  		$("#contenido").html("SE CAYO LA RED.");
  	}

  	function CargarAjax(e){
  		var myId = $(this).attr("id");
  		$("nav ul li").removeClass("active");
  		$(".simplenav a").removeClass("active");
  		$(".social.text-center a").removeClass("active");
  		$(this).addClass("active");
  		$.ajax(
  			{
  				url: "index.php?action="+myId,
  				dataType: "html",
  				success: MostrarContenido,
  				error: MostrarError
  			}
  		);
  		e.preventDefault();
  	}

  	$("nav ul li").on("click",CargarAjax);
  	$(".simplenav a").on("click",CargarAjax);
  	$(".contacto").on("click",CargarAjax);

    
//Carga Tabla por categoria seleccionada
     $(document).on('change', '#getGenero', function() {
       event.preventDefault();
        $.get( "index.php?action=listarxGenero",{ valGenero: $(this).val() }, function(data) {
          console.log(data);
          $("#contenidoTabla").html(data);
          });
  });

  // //seleccion del genero para el actualizar
  // $(document).on('change', '#selGenero', function() {
  //   event.preventDefault();
  //   var valor = $("#selGenero option:selected").html();
  //   $("#generoMod").val(valor);
  //  });

  //  $(document).on('click', '#edGenero', function() {
  //    event.preventDefault();
  //    var nombre = $("#genero").text();
  //    alert(nombre);
  //    alert($("#genero").text());
  //    $("#generoSel").val(nombre);
  //  })


});
