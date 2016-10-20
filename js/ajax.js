
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

  	$('body').on('click', '#mostrar', function(event){
  		event.preventDefault();
  		$("#aMostrar").toggle();
  	});

  	$('body').on('click',"#contenidotabla", function(event){
  			event.preventDefault();
  			$("#contenidotabla").append("<tr><td>" + titulo + "</td><td>" + autor + "</td></tr>"+ portada + "</td></tr>");
  	});

  });
