<?php 

session_start();
session_unset();
session_destroy();

// if(substr_count($_SERVER["HTTP-ACCEPT-ENCODING"], "gzip")){
// 	ob_start("ob_gzhandler");
// }else{
// 	ob_start();
// 	echo "No tienes permiso GZIP";
// }
error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);
date_default_timezone_set('America/Mexico_City');

$data = json_decode(file_get_contents("http://appmovil.odm.com.mx/odm-api/api/origenes"),true);

$dia = date("d");
$mes = date("m");
$year = date("Y");

// echo $fecha1 = $dia."/".$mes."/".$year;

$fechform1 = $year."-".$mes."-".$dia;
// print_r($hoy);
require ('conexion.php');


// CONSULTA ORIGEN  
	$query = "SELECT id_p, origen, value FROM Origen ORDER BY id_p";
	$resultado=$mysqli->query($query);

// CONSULTA PARA TARJETAS PROMO 

	$query2 = "SELECT id_tarj, card_header, origen, destino, oricomp, destcomp, precio, viajeRedondo, ahorro, precioNormal, descripcion, link FROM TarjPromo ";
	$resultado2=$mysqli->query($query2);

?>
<!DOCTYPE html>
<html lang="es-MX">
<head>

	<script type="text/javascript" async>
		setTimeout(function(){
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		  ga('create', 'UA-56739058-1', 'auto', {'allowLinker': true});
		  ga('require', 'linker');
		  ga('linker:autoLink', ['https://venta.odm.com.mx:30700/odm'] );
		  ga('send', 'pageview');

		},500);
	  
	</script>

	<!-- Google Tag Manager -->
<script>
	setTimeout(function(){
			(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-TD3ZZ93');
	},500);
	
</script>
<!-- End Google Tag Manager -->

	<!-- <script type="text/javascript" src="http://cssrefresh.frebsite.nl/js/cssrefresh.js"></script> -->

<!-- <script type="text/javascript" async>
setTimeout(function(){
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-56739058-1', 'auto', {'allowLinker': true});
  ga('require', 'linker');
  ga('linker:autoLink', ['https://venta.odm.com.mx:30700/odm'] );
  ga('send', 'pageview');

},500);
  
</script>	 -->

 <!-- Google Tag Manager -->
<!-- <script>
	setTimeout(function(){
			(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','GTM-TD3ZZ93');
	},500);
	
</script> -->
<!-- End Google Tag Manager -->

<!-- Google Tag Manager -->
<!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KKGND9J');</script> -->
<!-- End Google Tag Manager -->

 			<meta charset="UTF-8">



 			
		  	<meta name="description" content="Compra tus boletos de autobús en internet o en tu celular y obten un 10% de descuento en viaje sencillo más un 10% en tu viaje de regreso al comprar viaje redondo"/>
		  	<meta name="keywords" content="Compra tus boletos de autobús, venta de boletos de autobús, boletos de autobús a guadalajara, boletos de autobús a monterrey, boletos de autobús a torreon, boletos de autobús a Aguascalientes, boletos de autobús a ciudad de mexico, boletos de autobús a Durango, boletos de autobús a Guanajuato, boletos de autobús a jalisco, boletos de autobús a Querétaro, boletos de autobús a Tamaulipas, boletos de autobús a Veracruz, boletos de autobús a Zacatecas">
		  	<meta name="generator" content="2015.1.2.344"/>

		  	<meta property="og:title" content="Omnibus de México | Boletos de Autobús" />
			<meta property="og:type" content="website" />
			<meta property="og:image" content="https://odm.com.mx/imgFace/sevenEleven.jpg" />
			<meta property="og:image" content="https://odm.com.mx/imgFace/reserva.jpg" />
			<meta property="og:image" content="https://odm.com.mx/imgFace/reserva2.jpg" />
			<meta property="og:image:width" content="526" />
			<meta property="og:image:height" content="275" />
			<meta property="og:url" content="https://odm.com.mx/" />
			<meta property="og:description" content="Compra tus boletos de autobus en internet y obtén un 10% de descuento en tu compra, más un 10% en tu viaje de regreso al comprar tu viaje redondo. Sujeto a cambios en rutas y horarios sin previo aviso" />

			<meta name="google-site-verification" content="kyZLmfamB8m_WJP959dFuzELltvuF5ovgZvRkbkl70w" />


 			<noscript id="deferred-styles">
		      <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"/>
		    </noscript>
 			<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" > -->
 			
			
			<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
			
		    <link rel="stylesheet" type="text/css" href="css3/estilos.css"/>
		    <!-- <link rel="stylesheet" type="text/css" href="css3/cabpie.css"/> -->
		   

			<!-- NO SE TOCA CALENDARIO -->
			<!-- <link rel="stylesheet" id="compiled.css-css" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/compiled-4.8.10.min.css?ver=4.8.10" type="text/css" media="all"> -->
			<!-- ///////// -->

			<!-- <link rel="stylesheet" href="css3/bootstrap.min.css"> -->
			

		<script type="text/javascript" src="js3/jQuery v3.4.1.js"></script>
		<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
		<!-- ///////////////////// -->
		
		<noscript id="deferred-styles2">
		      <link rel="stylesheet" type="text/css" href="css3/bootstrap.min.css"/>
		</noscript>

		
		<noscript id="deferred-styles3">
		      <link rel="stylesheet" type="text/css" href="css3/select2.css"/>
		</noscript>
		
		<noscript id="deferred-styles4">
		      <link rel="stylesheet" type="text/css" href="css3/calendario.css"/>
		</noscript>

		<!-- /////////////// -->
		<!-- <link rel="stylesheet" href="css3/select2.css"> -->
		<!-- <link rel="stylesheet" href="css3/calendario.css"> -->
		<script async src="js3/select2.js"></script>
		<script async src="js3/calcomplem2.js"></script>
		



		<link rel="shortcut icon" href="images/pagmaestra-favicon.ico">
  			
	<title>Omnibus de México | Boletos de Autobús</title>


	<!-- //////// OCULTAR CALL IMAGEN ////////// -->


	<script>
		$(document).ready(function(){
			var ventana_ancho2 = $(window).width();
					  var ventana_alto2 = $(window).height();
					 
			var scrTop = $(window).scrollTop();

					  if (ventana_ancho2 <= 767) {

						console.log(ventana_ancho2);
						console.log(scrTop);
						
						$('.startToky').hide();

					}
					// if (ventana_ancho2 <= 500) {

					// 	$('#prueba2').
					// }
		})
	</script>


	<!-- /////////////////////////////////////// -->
	
			<script type="text/javascript">
				document.onselectstart = function() {return false;}
				// document.onmousedown = function() {return false;}
			</script>
					


	<!-- /////////// RENDERIZAR SEGUN EL DISPOSITIVO /////// -->
			<script async src="js3/varrenderizado.js"></script>

<!-- /////////////////////////////////////////////////////////////////////// -->
<script async src="js3/tarjetapromo.js"></script>
			
		
			<style>
				.ui-datepicker table {
				    width: 100%;
				    font-size: .8em;
				    border-collapse: collapse;
				    margin: 0 0 .4em;
				}
				.ui-datepicker-div{
					max-width: 100%;
				}
				.login{
					position: relative;
					top: -20px;
					left: 20px;
					background-color: white;
					width: 500px;

				}
				.login, ul, li, a{

					color: #0b5996;
					text-decoration: none;

				}
				.login, ul, li, a:hover{

					color: #737577;
					text-decoration: none;

				}
				#travel a{

					color: #fff;
					text-decoration: none;

				}
				#travel a:hover{

					color: red;
					text-decoration: none;

				}
				.bg-light {
				    background-color: #fff!important;
				}
				#prueba2, .bg-light{
					border-bottom: solid 7px #003368;
					position: fixed;
					width: 100%;
					z-index: 50;
					top: 0px;
					background-color: #ffffff!important;
				}
				div .meshim_widget_components_chatButton_Button .button_bar {
				    min-width: 180px;
				    *width: 180px;
				    max-width: 300px;
				    height: 30px;
				    color: #ffffff;
				    background: red;
				    box-shadow: chatButtonShadow;
				}

				div .meshim_widget_components_chatButton_ButtonBar .favicon {
				    position: absolute;
				    height: 100%;
				    left: 0;
				    vertical-align: text-top;
				    text-align: center;
				    padding-top: 8px;
				    width: 36px;
				    background: #2e3b64;
				    color: #ffffff;
				}
				#adultos, #menor, #inapam, #estudiantes, #profesores{
				    text-align-last: center;
				    display: inline-block;
				    width: 40px;
				    height: 40px;
				    padding: 0px 0px 0px 0px;
				    line-height: 1.5;
				    color: #495057;
				    vertical-align: middle;
				   background: #fff;
				    background-size: 8px 10px;
				    border: 1px solid #ced4da;
				    border-radius: 50px;
				    -webkit-appearance: none;
				    -moz-appearance: none;
				    appearance: none;
				}
				#fecharegreso2{
					font-size: 20px;
				}
				#adultos, #estudiantes, #profesores, #inapam, #menor, #fechasalida1, #fecharegreso, #cbx_municipio{
				      border-color: #fff;
				  }
				#adultos, #estudiantes, #profesores, #inapam, #menor, #fechasalida1, #fecharegreso, #cbx_municipio:focus{

					box-shadow: inset 0 0 0 0rem rgba(255, 255, 255, 0.25);
				}
				.select2-selection__rendered{

					color: black;
					font-weight: bold;
				}
				.select2-dropdown{

					margin-top: 5px;
				}
				.ui-datepicker .ui-datepicker-header{
					max-width: 103%;
					position: relative;
				    padding: .2em 0;
				    left: -4px;
				    width: 318px;
				    border-radius: 0px;
				    top: -4px;
				    background-color: #073d7d;
				    color: white;
				    z-index: 60;
				}
				.ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight {
				    border: 1px solid #1484c9;
				    background: #7f7c7c;
				    color: #fff;
				    padding: 8px 0px 8px 0px;
				    border-radius: 100px;
				}
				#cursor{

					cursor: hand;
				}
				#cuadroloader{
		          display: none;
		          position: absolute;
		          top: 50%;
		          left: 50%;
		          transform: translate(-50%, -50%);
		          width: 100px;
		          z-index: 50;

		        }
		         #reservar{
		        	font-weight: 900;
				    /*height: 100px;*/
				    border-color: white;
				    border-style: solid;
				    border-width: 2px;
				    font-size: small;

		        }
		        #msjAdulto, #msjMenor, #msjInapam, #msjEstud, #msjProfe{
		        	display: none;
					text-align: left; 
					margin: 11px;
					font-size: large;

		        }
			</style>


			<!-- <script>
					$(document).ready(function(){
						/////// ADULTO
					  $("#coorAdul").hover(function(){
					    //$(this).css("background-color", "yellow");
					    $('#msjAdulto').css('display', 'block');
					    }, function(){
					    //$(this).css("background-color", "pink");
					    $('#msjAdulto').css('display', 'none');
					  });
					  ///////// MENOR
					  $("#coorMenor").hover(function(){
					    //$(this).css("background-color", "yellow");
					    $('#msjMenor').css('display', 'block');
					    }, function(){
					    //$(this).css("background-color", "pink");
					    $('#msjMenor').css('display', 'none');
					  });
					  ///////// INAPAM
					  $("#coorInapam").hover(function(){
					    //$(this).css("background-color", "yellow");
					    $('#msjInapam').css('display', 'block');
					    }, function(){
					    //$(this).css("background-color", "pink");
					    $('#msjInapam').css('display', 'none');
					  });
					  ///////// ESTUDIANTE
					  $("#coorEstu").hover(function(){
					    //$(this).css("background-color", "yellow");
					    $('#msjEstud').css('display', 'block');
					    }, function(){
					    //$(this).css("background-color", "pink");
					    $('#msjEstud').css('display', 'none');
					  });
					  ///////// PROFESOR
					  $("#coorProf").hover(function(){
					    //$(this).css("background-color", "yellow");
					    $('#msjProfe').css('display', 'block');
					    }, function(){
					    //$(this).css("background-color", "pink");
					    $('#msjProfe').css('display', 'none');
					  });
					});
			</script> -->
						
			

<!-- Facebook Pixel Code -->
<!-- <script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '320605981652997');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=320605981652997&ev=PageView&noscript=1"
/></noscript> -->
<!-- End Facebook Pixel Code -->


<!-- <script>
				// setTimeout(function(){
				// $( function() {
					setTimeout(function(){

						$( "#fechasalida1" ).datepicker({

								dateFormat: 'dd/mm/yy',
								minDate: 0,
								monthNames: ['Enero', 'Febreo', 'Marzo',
							'Abril', 'Mayo', 'Junio',
							'Julio', 'Agosto', 'Septiembre',
							'Octubre', 'Noviembre', 'Diciembre'],
							dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa']

							});

							$( "#fecharegreso" ).datepicker({

								dateFormat: 'dd/mm/yy',
								minDate: 0,
								monthNames: ['Enero', 'Febreo', 'Marzo',
							'Abril', 'Mayo', 'Junio',
							'Julio', 'Agosto', 'Septiembre',
							'Octubre', 'Noviembre', 'Diciembre'],
							dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa']

							});


					},3000);
					

				// } );

			// },500);
</script> -->

<!-- Facebook Pixel Code -->
<script>
    setTimeout(function(){

		! function(f, b, e, v, n, t, s) {
	    if (f.fbq) return;
	    n = f.fbq = function() {
	        n.callMethod ?
	            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
	    };
	    if (!f._fbq) f._fbq = n;
	    n.push = n;
	    n.loaded = !0;
	    n.version = '2.0';
	    n.queue = [];
	    t = b.createElement(e);
	    t.async = !0;
	    t.src = v;
	    s = b.getElementsByTagName(e)[0];
	    s.parentNode.insertBefore(t, s)
	}(window, document, 'script',
	    'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '320605981652997');
	fbq('track', 'PageView');


	}, 5000);
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=320605981652997&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
			
			
</head>



<body id="cursor">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TD3ZZ93"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->




<!-- Google Tag Manager (noscript) -->
<!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KKGND9J"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
<!-- End Google Tag Manager (noscript) -->


<!-- Google Tag Manager (noscript) -->
<!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TD3ZZ93"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
<!-- End Google Tag Manager (noscript) -->


	<!--/////////////// NAV ////////////////////// -->
<nav id="prueba2" class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
  <div>
  	<a href="index.php">
  		<img class="img-fluid rounded mx-auto d-block img1" style="width: 69%; width: 50%" src="imagen/logoODM.webp" alt="">
  	</a>
  </div>
  
  <!-- <img class="img-fluid rounded mx-auto d-block"  src="https://odm.com.mx/images/marquesina.jpg" alt=""> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto" style="margin: auto;">
      <li class="nav-item">
        <a class="nav-link" style="width: 120px;" href="cobertura.php"><i class="fas fa-bus"></i> Cobertura <!-- <span class="sr-only">(current)</span> --></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="width: 160px" href="puntosgoogle.php"><i class="fas fa-map"></i> Puntos de venta</a>
      </li>
	
	  <li class="nav-item">
        <!-- <a class="nav-link" href="#"><i class="far fa-handshake"></i> Servicios</a> -->
        <a class="nav-link" style="width: 109px;" href="servicios.php"><i class="far fa-handshake"></i> Servicios</a>
      </li>

      <li class="nav-item">
		  <a id="factura" href="https://venta.odm.com.mx/FacturacionElectronica/IndexFacturaElec.html" class="nav-link"><i class="fas fa-file-alt"></i> Facturación</a>
	  </li>

    </ul>
    <form style="display: none;" id="login" class="form-inline my-2 my-lg-0 ">
     

	  <ul class="nav navbar-nav navbar-right" style="padding-bottom: 100px;">
      <li style="margin-right: 10px;"><a href="#"><span class="fas fa-user"></span> Sign</a></li>
      
      <li><a href="#"><span class="fas fa-sign-in-alt"></span> Login</a></li>
    </ul>
    </form>
  </div>
</nav>


<!-- <div style="z-index: 60; position: fixed;">
<img style="height: 40px;" src="imagen/numerocetac.svg" alt="">
</div> -->


<!-- <img class="imagen2" src="imagen/bushd.jpg" alt="Car" style="width:100%">
 -->
		
		<!-- ////////////////// CUADRO DE VENTAS  /////////////////////////////////////--> 


<!-- ////////////////// CUADRO DE VENTAS  /////////////////////////////////////--> 


<!-- <section style="background: linear-gradient(45deg, black, transparent);" class="contenedor-main row"> -->
<section  class="contenedor-main row colordiv">	

	<!-- <img class="imagen2" src="imagen/fondocuadro.png" alt="Car" style="width:100%; height: 100%;"> -->

			<aside id="cuadro1" class="col-md-12  align-self-center colordiv">
				
				<!--///////// INICIO PREGUNTA ////////////// -->
				<!-- <img class="imagen2" src="imagen/fondo3_Mesa de trabajo 1.png" alt="Car" style="width:100%; height: 96%;"> -->


					<div class="container mt-5 viajar">
						<div class="row">
							<div class="col-md-12 col-lg-12" style="text-align: center;">
								<a href="tel:8007656636">
									<img style="height: 55px;" src="imagen/telefono4-01.png" alt="">
								</a>
							</div>
							<!-- <div class="col-md-6 col-lg-12">
								<h1>¿A donde quieres viajar?</h1>
							</div> -->
							
						</div>
					</div>
				<!-- /////// FIN PREGUNTA /////////////////// -->

				<div class="container mt-3 mb-3 cuadro2">
					<div id="coorCuadro" class="row">
						<img id="cuadroloader"  src="imagen/loading25.gif" alt="">
						<div id="coorCuadro2" class="col-lg-10 ">
						<form id="formulario" class="was-validated" method="post" action="https://venta.odm.com.mx/odm/PASO1/paso1.aspx" enctype="multipart/form-data" name="formulario">
							  <div class="form-row d-flex justify-content-between">
							    
								    <div id="intro1" class="col-md-4 col-lg-4 mb-3 mt-3">
								      <label for="validationServer01">ORIGEN</label>
								      <!-- <input type="text" class="form-control is-valid" id="origentext" name="origentext" placeholder="¿De Dónde Sale?" value="Aguascalientes C. Autobus" required> -->
								      <!-- <select class="selectpicker form-control is-valid" name="origentext" id="origentext" data-container="body" data-live-search="true" title="¿De Dónde Sale?" data-hide-disabled="true" required>

									
									</select> -->

									 <!-- <select style="height: 34px;" class="form-control is-valid" name="origencode" id="cbx_estado" data-placeholder="¿De Dónde Sale?" data-container="body" data-hide-disabled="true" data-live-search="true"> -->

									 	<!-- /////////////////////// -->
									 <!-- <select style="height: 34px; width: 100%;" name="origencode" id="cbx_estado">
											
											<option selected="selected" disabled>¿De Dónde Sales?</option>
											
										
									</select> -->

									<select style="height: 34px; width: 100%;" name="origencode" id="cbx_estado">
											
											<option selected="selected" disabled="">¿De Dónde Sales?</option>

											<?php  
												for ($i=0; $i < count($data) ; $i++) {
											?>
											<option value="<?php echo $data[$i]['origen']; ?>"><?php echo $data[$i]['value']; ?></option>
											<?php
												}
											?>
										
									</select>


									<!-- //////////////////////////// -->
									
									<!-- <select style="opacity: 0;" class="valores" id="origen">
						      			<option selected="selected" disabled>¿De Dónde Sales?</option> -->
						      			<!-- <option value="MEX">Ciudad de México</option> -->

						      		<!-- </select> -->
									
								     
								    </div>


								    <div id="intro2" class="col-md-4 col-lg-4 mb-3 mt-md-3">
								      <label for="validationServer02">DESTINO</label>
								      <!-- <input type="text" class="form-control is-valid" id="destinotext" name="destinotext" placeholder="¿A Dónde Va?" value="Mexico Central Norte" required>
								      <input type="hidden" value="MEX" name="destinocode" id="destinocode"> -->
								      <!-- <select class="selectpicker form-control is-valid" name="destinotext" id="destinotext" data-container="body" data-live-search="true" title="¿A Dónde Va?" data-hide-disabled="true" required>
									  </select> -->

									 <select style="opacity: 0; width: 100%;" name="destinocode" class="valores" id="cbx_municipio">
							      			<option selected="selected" disabled>¿A Dónde Viajas?</option>
							      			<!-- <option value="MTY">Monterrey Nuevo Leon</option> -->
							      	  </select>


								      
								    </div>

								    <div class="col-md-4 col-lg-4 mb-3 mt-md-3 focusfecha1">
								      <label for="validationServer02">SALIDA</label>
								      <!-- <input type="date" class="form-control is-valid" min="<?php echo date("Y-m-d");?>" id="fechasalida1" value="<?php echo date("Y-m-d");?>"  required> -->


								       <!-- <input type="text" class="form-control" name="fechasalida" id="fechasalida1" autocomplete="off" readonly="readonly" value="<?php echo date("d/m/Y");?>" required>   -->

								       <input type="text" class="form-control" name="fechasalida" id="fechasalida1" autocomplete="off" readonly="readonly" value="<?php echo date("d/m/Y");?>" required>  

								       <!-- <input type="text" id="date_range" name="date_range" class="form-control pull-right"> -->

								       <!-- <input id="datepicker" width="270" /> -->

								      <!-- <input type="text" class="form-control fechSalida" name="fechasalida" id="fechasalida1" autocomplete="off" readonly="readonly" value="<?php echo date("d/m/Y");?>" required>   -->
								      <!-- <br> -->
								      <!-- <input type="date" id="bday" name="bday" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"> -->
								      <!-- <input placeholder="Selected date" type="text" id="date-picker-example" class="form-control datepicker"> -->
								      <!-- <br> -->

								      <!-- <p>Date: <input type="text" id="datepicker"></p> -->

								       <!-- <input type="hidden" id="fechasalida2" name="fechasalida" value=""> -->




								        <!-- VARIABLES IMPORTANTEs -->
								        <!-- <input type="hidden" value="ACR" name="destinocode" id="destinos" /> -->
								        <input type="hidden" value="ODM" name="marca" id="marca" />
								        <input type="hidden" value="escritorio" name="version" id="version" />
								        <input type="hidden" value="_" name="reservacionText" id="reservacionText" />

								        <!-- ///////////////////// -->
								        <!-- ///////////////////// -->
								        <!-- ///////////////////// -->
								        <!-- ///////////////////// -->
								        <!-- ///////////////////// -->
								      
								    </div>
								
									
							  </div>
<!-- /////////////////////////////////////////////////// TIPO BOLETO ////////////////////// -->
 <div id="texto" class="form-row d-flex justify-content-between">
<!-- /////////. ADULTO. ////////// -->
		<div id="coorAdul" class="col-lg-1 col-md-1 col-sm-2 col-xs-3 d-flex order-2 order-lg-1 order-md-1 order-xs-1">

		 	<div style="padding-right: 0; padding-left: 0;" class="mr-lg-2 ml-lg-2 col-md-12">

				<label class="tamlabel" for="validationServer02">ADULTO</label>

		 		<select name="adultos" id="adultos"   class="custom-select selectam" required>
					<option value="0">0</option>
					<option value="1" selected>1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
				</select>

				

		 	</div>
		 	
		 	
		 </div>
<!-- ////////// MENOR. ///////// -->
		<div id="coorMenor" class="col-lg-1 col-md-1 col-sm-2 col-xs-3 d-flex order-3 order-lg-2 order-md-2 order-xs-2">

		 	<div style="padding-right: 0; padding-left: 0;" class="mr-lg-2 ml-lg-2 col-md-12">
		 	
		 		<label class="tamlabel" for="validationServer02">MENOR</label>
		 		<select name="menores" id="menor" class="custom-select selectam" required>
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
				</select>

				
				 	
		 	</div>
		 	
		</div>
<!-- ////////. INAPAM. /////////// -->
		<div id="coorInapam" class="col-lg-1 col-md-1 col-sm-2 col-xs-2 d-flex order-4 order-lg-3 order-md-3 order-xs-3">

		 	<div style="padding-right: 0; padding-left: 0;" class="mr-lg-2 ml-lg-2 col-md-12">

				<label class="tamlabel" for="validationServer02">INAPAM</label>
				<select name="senectud" id="inapam" class="custom-select selectam" required>
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
				</select>

				

		 	</div>
		 		
		</div>
<!-- ////////. ESTUDIANTE. /////////// -->
		<div id="coorEstu" class="col-lg-1 col-md-1 col-sm-2 col-xs-2 d-flex order-4 order-lg-3 order-md-3 order-xs-3">

		 	<div style="padding-right: 0; padding-left: 0;" class="mr-lg-2 ml-lg-2 col-md-12">

				<label class="tamlabel" for="validationServer02">ESTUDIANTE</label>
				<!-- <select name="senectud" id="inapam" class="custom-select selectam" required>
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
				</select> -->

				<select name="estudiantes" id="estudiantes" class="custom-select selectam" required>
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
				</select>

				

		 	</div>
		 		
		</div>
<!-- /////////. ESTUDIANTE. ////////// -->
<!-- ////////. PROFESOR. /////////// -->
		<div id="coorProf" class="col-lg-1 col-md-1 col-sm-2 col-xs-2 d-flex order-4 order-lg-3 order-md-3 order-xs-3">

		 	<div style="padding-right: 0; padding-left: 0;" class="mr-lg-2 ml-lg-2 col-md-12">

				<label class="tamlabel" for="validationServer02">PROFESOR</label>
				<!-- <select name="senectud" id="inapam" class="custom-select selectam" required>
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
				</select> -->

				<select name="profesores" id="profesores" class="custom-select selectam" required>
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
				</select>

				

		 	</div>
		 		
		</div>
<!-- /////////. PROFESOR. ////////// -->
<!-- /////////. ESTUDIANTE. ////////// -->
 	<div id="ocultar">
 	<!-- <div>	 -->
		<!-- <div class="col-lg-1 col-md-1 col-sm-2 col-xs-2 d-flex order-5 order-lg-4 order-md-4 order-xs-4">

		 	<div  class="mr-lg-2 ml-lg-2 col-md-12">

				<label class="tamlabel" for="validationServer02">ESTUDIANTES</label>
				<select name="estudiantes" id="estudiantes" class="custom-select selectam" required>
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
				</select>

		 	</div>
		 		
		</div> -->
<!-- ///////  PROFESOR. //////////// -->
		<!-- <div  class="col-lg-1 col-md-1 col-sm-2 col-xs-2 d-flex order-6 order-lg-5 order-md-6 order-xs-6">

		 	<div class="mr-lg-2 ml-lg-2 col-md-12">

				<label class="tamlabel" for="validationServer02">PROFESOR</label>
				<select name="profesores" id="profesores" class="custom-select selectam" required>
					<option value="0">0</option>
					<option value="1">1</option>
					<option value="2">2</option>
				</select>


		 	</div>
		 		
		</div> -->
	</div>
<!-- //////// VIAJE REDONDO /////////// -->

		<div class="col-lg-4 col-md-4 mb-3 order-1 order-lg-6 order-md-6 order-xs-1">
		 	
		 	<div style="padding-right: 0; padding-left: 0;" class="col-lg-12">

		 		

						<input type="checkbox" id="ritema" />

				<label for="ritema" id="fecharegreso2">Viaje redondo</label>
		 		<!-- <input style="display: none;" type="date" class="form-control is-valid" min="<?php echo date("Y-m-d");?>"  id="fecharegreso" value=""> -->
		 		<!-- <input type="text" style="display: none;" class="form-control" name="fecharegreso" id="fecharegreso" autocomplete="off" readonly="readonly" value="_" required>   -->

		 		<input type="text" style="display: none;" class="form-control" name="fecharegreso" id="fecharegreso" autocomplete="off" readonly="readonly" value="_" required>  
		 		<!-- <input type="hidden"  id="fecharegreso3" name="fecharegreso" value="_" /> -->

		 	</div>

		</div>
	

 </div>

 <div id="msjAdulto"><h6 style="font-size: small;">ADULTO: 12 años en adelante</h6></div>
 <div id="msjMenor"><h6 style="font-size: small;">MENOR: de 6 a 11 años</h6></div>
 <div id="msjInapam"><h6 style="font-size: small;">SENECTUD: Presentar documentación oficial</h6></div>
 <div id="msjEstud"><h6 style="font-size: small;">ESTUDIANTES: Presentar credencial vigente</h6></div>
 <div id="msjProfe"><h6 style="font-size: small;">PROFESORES: Presentar credencial vigente</h6></div>

<!-- /////////////// -->
<!-- ////////////// BOLETOS OCULTOS //////////// -->



<!-- /////////////////////////////////////////////////////////////// -->
							
							  

							</div>
							<div style="text-align: right;" id="coorBuscar" class="col-lg-2 align-self-center">
								<button class="btn btn-danger btn-block mb-3 mt-3" id="idboton" type="submit">Buscar Viaje</button>

								<button  class="btn btn-danger btn-block mb-1 mt-1" id="reservar">Reservar</button>
								<!-- <p align="right">SENECTUD: Presentar documentación oficial</p> -->
								<!-- <h6 align="right">INAPAM: <small>Presentar documentación oficial</small></h6> -->
								<div id="travel" style="margin: 0px 0px 15px 0px;">
									<a href="https://www.priceres.com.mx/omnibus-demexico/paquetes" target="_blanck">Autobús + Hotel
										<img src="imagen/pricetravel.jpg" width="115" alt="">
									</a>
								</div>
						</form>
							</div>
					</div>
				</div>
<!-- ////////////// FIN FORMULARIO VENTAS //////////////////// -->

				<div class="container">

					<!-- <div class="row cuadroage justify-content-end">
						<div class="columna col-6" align="right">
							<a href="https://www.priceres.com.mx/omnibus-demexico/paquetes" target="_blanck">
								<img src="imagen/pricetravel.jpg" width="115" style="" alt="">
							</a>
						</div>
						<div class="columna col-6"><a style="color: #fff;" href="http://venta.odm.com.mx/netScripts/request.aspx?APPNAME=Navegante&PRGNAME=AccesoEx&ARGUMENTS=-AAG" target="_blanck"> | AGENCIAS </a></div>
					</div>
 -->
						<div class="w-100"></div>

					<div class="row justify-content-center">
						<div class="columna cuadroage2 col-12" align="center">
							<img style="width: 500px; max-width: 100%;" class="card-img-top"  src="imagen/logoODMplus.svg" alt="Card image cap">
						</div>
						
					</div>
					
					<div align="center" class="row descuentos mt-5">
						<div class="col-lg-12">
							<h4 style="color: red;font-weight: bold; font-size: 30px;">10% 
								<small style="color: #fff; font-size: 19.2px;">de descuento viaje sencillo,</small>
								+ 10%<small style="color: #fff; font-size: 19.2px;"> en boleto de regreso al comprar viaje redondo.</small></h4>
						</div>
						<div class="col">
							<h4><small style="color: #fff;">Aplica en todas las rutas</small></h4>
						</div>
					</div>
						

					
				</div>

			</aside>
</section>


<div class="colordiv">
	
</div>



<!-- ///////////////////////////////////// IMAGENES 1 //////////////////////////////////// -->
		<!-- <section class="mt-5 mb-5">

			<div align="center" class="container">
			  <img  class="img-fluid" width="90%" src="imagen/imagen1.png" />
			</div>

		</section> -->
		<!-- <div id="page-loader"><span class="preloader-interior"></span></div> -->

		<div id="loader1" style="text-align: center;">
			<img src="imagen/loader.gif" alt="">
		</div>

	<div id="slider1" style="display: none;" class="mt-5 mb-5 bd-example colorslide1">
	  <div id="carouselExampleCaptions3" class="carousel slide" data-ride="carousel">
	    <ol class="carousel-indicators">
	      <li data-target="#carouselExampleCaptions3" data-slide-to="0" class="active"></li>
	      <li data-target="#carouselExampleCaptions3" data-slide-to="1"></li>
	      <li data-target="#carouselExampleCaptions3" data-slide-to="2"></li>
	      <li data-target="#carouselExampleCaptions3" data-slide-to="3"></li>
	      <li data-target="#carouselExampleCaptions3" data-slide-to="4"></li>
	      <li data-target="#carouselExampleCaptions3" data-slide-to="5"></li>
	      <li data-target="#carouselExampleCaptions3" data-slide-to="6"></li>
	    </ol>
	    <div style="text-align: center;" class="carousel-inner">
	      
	      <div  class="carousel-item active">
	        <a target="_blank" href="#">
	        	<img style="max-width: 600px; max-height: 800px;" src="imagen/landing/preventaVacacional.webp" class="img-fluid mx-auto d-block w-100 img17" alt="..."></a>
	        <div class="carousel-caption d-none d-md-block">
	          <!-- <h5>First slide label</h5>
	          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
	        </div>
	      </div>

	      <div  class="carousel-item">
	        <a target="_blank" href="#">
	        	<img style="max-width: 600px; max-height: 800px;" src="imagen/landing/todito_Cash_ODM.webp" class="img-fluid mx-auto d-block w-100 img18" alt="..."></a>
	        <div class="carousel-caption d-none d-md-block">
	          <!-- <h5>First slide label</h5>
	          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
	        </div>
	      </div>

	      <div class="carousel-item">
	        <a target="_blank" href="#">
	        	<img style="max-width: 600px; max-height: 800px;" src="imagen/landing/CJS_1.webp" class="img-fluid mx-auto d-block w-100 img3" alt="...">
	        </a>
	        <div class="carousel-caption d-none d-md-block">
	          <!-- <h5>Second slide label</h5>
	          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
	        </div>
	      </div>


	      <div class="carousel-item">
	        <a target="_blank" href="#">
	        	<img style="max-width: 600px; max-height: 800px;" src="imagen/landing/AGU_1.webp" class="img-fluid mx-auto d-block w-100 img3" alt="...">
	        </a>
	        <div class="carousel-caption d-none d-md-block">
	          <!-- <h5>Second slide label</h5>
	          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
	        </div>
	      </div>

	      <div class="carousel-item">
	        <a target="_blank" href="#">
	        	<img style="max-width: 600px; max-height: 800px;" src="imagen/landing/MEX_1.webp" class="img-fluid mx-auto d-block w-100 img4" alt="...">
	        </a>
	        <div class="carousel-caption d-none d-md-block">
	          <!-- <h5>Third slide label</h5>
	          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
	        </div>
	      </div>

	      <div class="carousel-item">
	        <a target="_blank" href="#">
	        	<img style="max-width: 600px; max-height: 800px;" src="imagen/landing/TRC_1.webp" class="img-fluid mx-auto d-block w-100 img5" alt="...">
	        </a>
	        <div class="carousel-caption d-none d-md-block">
	          <!-- <h5>Third slide label</h5>
	          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
	        </div>
	      </div>

	      <div class="carousel-item">
	        <a target="_blank" href="#">
	        	<img style="max-width: 600px; max-height: 800px;" src="imagen/landing/TAM_1.webp" class="img-fluid mx-auto d-block w-100 img6" alt="...">
	        </a>
	        <div class="carousel-caption d-none d-md-block">
	          <!-- <h5>Third slide label</h5>
	          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
	        </div>
	      </div>




	    </div>
	    <a class="carousel-control-prev" href="#carouselExampleCaptions3" role="button" data-slide="prev">
	      <!-- <span class="carousel-control-prev-icon " aria-hidden="true"></span> -->
	      <span class="fas fa-angle-left estilofrlecha"></span>
	      <!-- <i class="fas fa-angle-left"></i> -->
	      <!-- <i class="fas fa-angle-left"></i> -->
	      <span class="sr-only">Previous</span>
	    </a>
	    <a class="carousel-control-next" href="#carouselExampleCaptions3" role="button" data-slide="next">
	      <span class="fas fa-angle-right estilofrlecha" aria-hidden="true"></span>
	      <span class="sr-only">Next</span>
	    </a>
	  </div>
	</div>			
<!-- ///////////////////////// FIN IMAGENES 1 ///////////////////// -->



<!-- ////////////////////// INICIO TARJETAS PROMO ////////////// -->
		<div class="container">
			<div class="row lineapromo mb-5">
				<div align="center" class="col">
					<h2>Viajes más solicitados</h2>
				</div>
			</div>



			<div class="row">
				<div class="col">
					<div id="tarjprueba" class="card-deck">

	

						<!-- TARJETA BD -->
						<?php  

						while($row2 = $resultado2->fetch_assoc()) { 




						$contador++;
											
						$tarjeta = '<div class="card border-danger mb-3" style="min-width: 250px;">
							<div class="card-header">

								<h4 class="my-0 text-center">
											'.

								$row2['card_header'].


								'</h4>
							</div>
							<div class="card-body text-center">
								
								<h2>Precio por Internet</h2>



								<h3>'.

								$row2['precio'].

								'<span class="text-muted">mx</span>

								</h3>


								<h5 style="color: red;"><del>'.

								$row2['precioNormal'].

									'</del>
									<span class="text-muted">Precio normal</span>
								</h5>
								<ul class="list-unstyled">

									<li style="color: black; font-weight: bold; font-size: larger; margin: 0px 0px 5px 0px;" >Viaje redondo</li>
									<li style="font-size: larger;">'.$row2['viajeRedondo'].'</li>
									
									<li style="color: black; font-weight: bold;">ahorro</li>
									<li style="font-size: medium;">'.$row2['ahorro'].'</li>
	
								</ul>
								<input id="orgsig'.$contador.'" type="hidden" value="'.$row2['origen'].'" >
								<input id="orgcom'.$contador.'" type="hidden" value="'.$row2['oricomp'].'" >
								<input id="destsig'.$contador.'" type="hidden" value="'.$row2['destino'].'" >
								<input id="destcom'.$contador.'" type="hidden" value="'.$row2['destcomp'].'" >
							</div>
							<div class="card-footer bg-transparent" style="border-top: 0px;">
								<button id="tar_'.$contador.'" class="btn btn-outline-danger btn-lg btn-block tar">Comprar</button>

							</div>
						</div>';

						echo $tarjeta;
							
						}

						?>
						
				
							
						</div>


					</div>
				</div>
			</div>
		</div>
<!-- ////////////////////// FIN TARJETAS PROMO ////////////// -->

<!-- /////////////////// INICIO BLOG /////////////////////////-->
<div id="loader2" style="text-align: center;">
			<img src="imagen/loader.gif" alt="">
</div>

	<div id="slider2" style="display: none;" class="mt-5 mb-5 bd-example">
	  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
	    <ol class="carousel-indicators">
	      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
	      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
	      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
	      <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
	    </ol>
	    <div class="carousel-inner">
	      <div class="carousel-item active">
	        <a target="_blank" href="http://odmblog.com.mx/category/turismoexperiencias/"><img src="imagen/turismo.webp" class="d-block w-100 img7" alt="..."></a>
	        <div class="carousel-caption d-none d-md-block">
	          <!-- <h5>First slide label</h5>
	          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
	        </div>
	      </div>
	      <div class="carousel-item">
	        <a target="_blank" href="http://odmblog.com.mx/category/platillos-de-mexico/">
	        	<img src="imagen/gastronomia.webp" class="d-block w-100 img8" alt="...">
	        </a>
	        <div class="carousel-caption d-none d-md-block">
	          <!-- <h5>Second slide label</h5>
	          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
	        </div>
	      </div>
	      <div class="carousel-item">
	        <a target="_blank" href="http://odmblog.com.mx/category/eventos-culturales-de-mexico/">
	        	<img src="imagen/eventos.webp" class="d-block w-100 img9" alt="...">
	        </a>
	        <div class="carousel-caption d-none d-md-block">
	          <!-- <h5>Third slide label</h5>
	          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
	        </div>
	      </div>
	      <div class="carousel-item">
	        <a target="_blank" href="http://odmblog.com.mx/category/pueblos-magicos-de-mexico/">
	        	<img src="imagen/pueblos.webp" class="d-block w-100 img10" alt="...">
	        </a>
	        <div class="carousel-caption d-none d-md-block">
	          <!-- <h5>Third slide label</h5>
	          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
	        </div>
	      </div>
	    </div>
	    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
	      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	      <span class="sr-only">Previous</span>
	    </a>
	    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
	      <span class="carousel-control-next-icon" aria-hidden="true"></span>
	      <span class="sr-only">Next</span>
	    </a>
	  </div>
	</div>			
			
<!-- /////////////////// FIN BLOG /////////////////////////-->

<!-- /////////////////////////////////////////////////////////// -->


<!-- ///////////////////////////////////// IMAGENES 2 //////////////////////////////////// -->
		<!-- <section class="mb-5">

			<div align="center" class="container">
			  <img  class="img-fluid" width="70%" src="imagen/imagen2.png" />
			</div>

		</section> -->
<!-- ///////////////////////// FIN IMAGENES 2 ///////////////////// -->

<!-- ///////////////////////////////////// IMAGENES 3 //////////////////////////////////// -->
		<!-- <section class="mb-5">

			<div class="">
			  <img  class="img-fluid" width="100%" src="imagen/imagen3.png" />
			</div>

		</section> -->
<div id="loader3" style="text-align: center;">
			<img src="imagen/loader.gif" alt="">
</div>

<div id="slider3" style="display: none;" class="mt-5 mb-5 bd-example">
	  <div id="carouselExampleCaptions2" class="carousel slide" data-ride="carousel">
	    <ol class="carousel-indicators">
	      <li  data-target="#carouselExampleCaptions2" data-slide-to="0" class="active"></li>
	      <li  data-target="#carouselExampleCaptions2" data-slide-to="1"></li>
	      <li  data-target="#carouselExampleCaptions2" data-slide-to="2"></li>
	      <!-- <li  data-target="#carouselExampleCaptions2" data-slide-to="3"></li> -->
	    </ol>
	    <div class="carousel-inner">
	      <div class="carousel-item active">
	        <a target="_blank" href="https://tap.com.mx/"><img src="imagen/TAPbanner.webp" class="d-block w-100 img11" alt="..."></a>
	        <div class="carousel-caption d-none d-md-block">
	          <!-- <h5>First slide label</h5>
	          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
	        </div>
	      </div>
	      <div class="carousel-item">
	        <a target="_blank" href="https://noreste.com.mx/"><img src="imagen/NORESTEbanner.webp" class="d-block w-100 img12" alt="..."></a>
	        <div class="carousel-caption d-none d-md-block">
	          <!-- <h5>Second slide label</h5>
	          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
	        </div>
	      </div>
	      
	      <div class="carousel-item">
	        <a target="_blank" href="https://www.omnibusmexicanos.com.mx/"><img src="imagen/OMEXbanner.webp" class="d-block w-100 img13" alt="..."></a>
	        <div class="carousel-caption d-none d-md-block">
	          <!-- <h5>Third slide label</h5>
	          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
	        </div>
	      </div>

	      <!-- <div class="carousel-item">
	        <a target="_blank" href="https://panamericanas.com.mx/"><img src="imagen/PANAMERICANASbanner.webp" class="d-block w-100 img14" alt="..."></a>
	        <div class="carousel-caption d-none d-md-block">
	         
	        </div>
	      </div> -->
	    </div>
	    <a class="carousel-control-prev" href="#carouselExampleCaptions2" role="button" data-slide="prev">
	      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	      <span class="sr-only">Previous</span>
	    </a>
	    <a class="carousel-control-next" href="#carouselExampleCaptions2" role="button" data-slide="next">
	      <span class="carousel-control-next-icon" aria-hidden="true"></span>
	      <span class="sr-only">Next</span>
	    </a>
	  </div>
	</div>		

<!-- ///////////////////////// FIN IMAGENES 3 ///////////////////// -->

<!-- ///////////////////////////////////// IMAGENES 4 //////////////////////////////////// -->
		<section class="mt-5 mb-5">
			
			<div class="container lineapromo mb-5">
				<div class="row">
					<div align="center" class="col">
						<h2>Paga tus reservaciones en:</h2>
					</div>
				</div>
			</div>	

			<div id="divReserva" class="container">
			  <img  class="img-fluid img15" width="100%" src="imagen/ReservacionColor.webp" />
			</div>

		</section>
<!-- ///////////////////////// FIN IMAGENES 4 ///////////////////// -->




<!-- //////////////////////////////////////////////////// -->
	
	<footer >
			<div>
				<!-- <h4 align="center">Footer</h4> -->
				<!-- ////// INICIO PREGUNTAS ///////// -->
				<ul class="nav justify-content-center">
				  <li class="nav-item">
				    <a class="nav-link active" href="quienes-somos2.php">Quiénes somos</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="preguntas-frecuentes.php">Preguntas frecuentes</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="http://venta.odm.com.mx/netScripts/request.aspx?APPNAME=Navegante&PRGNAME=AccesoEx&ARGUMENTS=-AAG" target="_blanck">Agencias</a>
				  </li>
				  <li class="nav-item">
				    <a class="nav-link" href="contactanos.php">Contáctanos</a>
				  </li>
				</ul>
				<!-- ////// FIN PREGUNTAS ///////// -->

			</div>
			<!-- //////// REDES SOCIALES ////////// -->

			<div class="container mt-3" id="top">
				<div align="center" class="row">
					<div class="col">
						<ul>
							<li>
								<a href="https://www.facebook.com/OmnibusdeMexicoOficial/?fref=ts" target="_blank">
									<i class="fab fa-facebook redSocial2" style="size: 5px";" aria-hidden="true"></i>
								</a>
							</li>

							<li>
								<a href="https://twitter.com/omnibus_oficial" target="_blank">
									<i class="fab fa-twitter redSocial2" aria-hidden="true"></i>
								</a>
							</li>

							<li>
								<a href="https://www.instagram.com/omnibus_oficial/" target="_blank">
									<i class="fab fa-instagram redSocial2"></i>
								</a>
							</li>

							<li>
								<a href="https://www.youtube.com/channel/UCyQ_-uZqptGN2M45DNOl7CQ" target="_blank">
									<i class="fab fa-youtube redSocial2"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>

<!-- ////////////////// LOGO BLANCO ///////////////////////////// -->
			<div  align="center" class="container">
			  <img class="img16" width="25%" src="imagen/logoblanco.webp" />
			</div>
<!-- ////////////////// FIN LOGO BLANCO ///////////////////////////// -->

<!-- ///////////// CALL CENTER /////////////// -->
<div class="startToky">
	<img src="imagen/startToky.png">
</div>
<!-- ////////// FIN CALL CENTER ////////////// -->

<!-- ///////////// CALL CENTER /////////////// -->
<!-- <div  class="chat">
	<img src="imagen/chat.png">
</div> -->
<!-- ////////// FIN CALL CENTER ////////////// -->

<!-- ///////// INICIO MAPA DEL SITIO /////////-->

<div class="conteiner">
	<div class="row">
		<div class="col">
			<ul class="nav justify-content-center">
				  <li class="nav-item">
				    <a class="nav-link active" href="#">Mapa del sitio</a>
				  </li>
			</ul>
		</div>
	</div>
</div>
<!-- ///////// INICIO POLITICAS /////////-->
<div class="conteiner">
	<div class="row">
		<div class="col">
			<ul class="nav justify-content-center">
				  <li class="nav-item">
				    <a class="nav-link active" href="aviso-privacidad.php">Aviso de privacidad | Políticas de viaje</a>
				  </li>
			</ul>
		</div>
	</div>
</div>
<!-- ////////  -->
</footer>
<!-- ///////// INICIO DERECHOS /////////-->
<div class="conteiner divnegro">
	<div class="row">
		<div class="col">
			<ul class="nav justify-content-center">
				  <li class="nav-item">
				    <a class="nav-link active" href="#"> &copy; Omnibus de México todos los derechos reservados 2019.</a>
				  </li>
			</ul>
		</div>
	</div>
</div>



<!-- /////////////////////////////////////////////////////////////////////// -->

<script src="js3/aniviajeredondo2.js"></script>
<script src="js3/navocultomovil.js"></script>
<!-- //////////////////////////////////////////////////////////////////////// -->
	<script src="js3/sum.js"></script>
	<script src="js3/bootstrap.min.js"></script>
<!-- //////////////////////////////////////////////////////////////////////// -->
	<script src="js3/cargasliders.js"></script>
	<script src="js3/chatstartToky.js"></script>

<!-- /////////////////////////// -->

<script src="js3/cargacsspagespeed.js"></script>
<script src="js3/recargavueltapaso1.js"></script>

<!-- PIXEL GOOGLE ADS REMARKETING -->
 <script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 961617709;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/961617709/?guid=ON&amp;script=0"/>
</div>
</noscript>
<!-- ///////////////////////////////// -->

<script src="js3/cargaimgSafari.js"></script>
<!-- <script src="js3/cargaOrigenEstado.js"></script> -->

<script language="javascript">
	
			$("#cbx_estado").change(function () {

			var id_p = $(this).val();

			// alert(id_p);
			// $( ".zelect" ).remove();

			$("#cbx_estado option:selected").each(function () {
				
				id_estado = $(this).val();

							$.post("restMunicipio.php", { id_estado: id_estado }, function(data){
									$("#cbx_municipio").html(data);
									// $("#cbx_municipio").load('getMunicipio.php');
									});            
					});
				});
		
										
</script>


<script>
	setTimeout(function(){
		$("#cbx_estado").select2();
		$("#cbx_municipio").select2();

	},1000);
			
</script>

<script>


	setTimeout(function(){
		/////// ADULTO
		  $("#coorAdul").hover(function(){
			//$(this).css("background-color", "yellow");
			$('#msjAdulto').css('display', 'block');



			$('#msjMenor').css('display', 'none');
			$('#msjInapam').css('display', 'none');
			$('#msjEstud').css('display', 'none');
			$('#msjProfe').css('display', 'none');
			}, function(){
			//$(this).css("background-color", "pink");
			//$('#msjAdulto').css('display', 'none');
			$('#msjMenor').css('display', 'none');
			$('#msjInapam').css('display', 'none');
			$('#msjEstud').css('display', 'none');
			$('#msjProfe').css('display', 'none');
		  });
		  ///////// MENOR
		  $("#coorMenor").hover(function(){
			//$(this).css("background-color", "yellow");
			$('#msjMenor').css('display', 'block');

			$('#msjAdulto').css('display', 'none');
			//$('#msjMenor').css('display', 'none');
			$('#msjInapam').css('display', 'none');
			$('#msjEstud').css('display', 'none');
			$('#msjProfe').css('display', 'none');
			}, function(){
			//$(this).css("background-color", "pink");
			$('#msjAdulto').css('display', 'none');
			//$('#msjMenor').css('display', 'none');
			$('#msjInapam').css('display', 'none');
			$('#msjEstud').css('display', 'none');
			$('#msjProfe').css('display', 'none');
		  });
		  ///////// INAPAM
		  $("#coorInapam").hover(function(){
			//$(this).css("background-color", "yellow");
			$('#msjInapam').css('display', 'block');

			$('#msjAdulto').css('display', 'none');
			$('#msjMenor').css('display', 'none');
			//$('#msjInapam').css('display', 'none');
			$('#msjEstud').css('display', 'none');
			$('#msjProfe').css('display', 'none');
			}, function(){
			//$(this).css("background-color", "pink");
			$('#msjAdulto').css('display', 'none');
			$('#msjMenor').css('display', 'none');
			//$('#msjInapam').css('display', 'none');
			$('#msjEstud').css('display', 'none');
			$('#msjProfe').css('display', 'none');
		  });
		  ///////// ESTUDIANTE
		  $("#coorEstu").hover(function(){
			//$(this).css("background-color", "yellow");
			$('#msjEstud').css('display', 'block');

			$('#msjAdulto').css('display', 'none');
			$('#msjMenor').css('display', 'none');
			$('#msjInapam').css('display', 'none');
			//$('#msjEstud').css('display', 'none');
			$('#msjProfe').css('display', 'none');
			}, function(){
			//$(this).css("background-color", "pink");
			$('#msjAdulto').css('display', 'none');
			$('#msjMenor').css('display', 'none');
			$('#msjInapam').css('display', 'none');
			//$('#msjEstud').css('display', 'none');
			$('#msjProfe').css('display', 'none');
		  });
		  ///////// PROFESOR
		  $("#coorProf").hover(function(){
			//$(this).css("background-color", "yellow");
			$('#msjProfe').css('display', 'block');

			$('#msjAdulto').css('display', 'none');
			$('#msjMenor').css('display', 'none');
			$('#msjInapam').css('display', 'none');
			$('#msjEstud').css('display', 'none');
			}, function(){
			//$(this).css("background-color", "pink");
			$('#msjAdulto').css('display', 'none');
			$('#msjMenor').css('display', 'none');
			$('#msjInapam').css('display', 'none');
			$('#msjEstud').css('display', 'none');
			//$('#msjProfe').css('display', 'none');
		  });




	}, 5000)

</script>


<script type='application/ld+json'>
    {
      "@context": "http://schema.org/",
      "@type": "Organization",
      "address": {
        "@type": "PostalAddress",
        "addressCountry": "Mexico",
        "addressLocality": "Ciudad de México",
        "addressRegion": "CDMX",
        "postalCode": "07700",
        "streetAddress": "Av. Central 56"
      },
       "contactPoint": {
       "@type": "ContactPoint",
       "telephone": "+52-01-800-765-6636",
       "contactType": "customer support"
      },
      "foundingDate": "1948-03-03",
      "description": "Omnibus de México surgió por la iniciativa de Mexicanos Visionarios. Inició operaciones el tres de marzo de 1948 con la primera corrida que partió de Aguascalientes a la Ciudad de México. El 29 de enero de 1986, Omnibus de México, inició con la venta de boletos a través de un sistema llamado BOLEBUS, por medio del cual se dejaron de vender boletos escritos a mano y se incursionó en la venta de boletos vía sistema computarizado, siendo la compañía pionera en adoptar dicha tecnología. Es la primera empresa en alcanzar la certificación ISO 9001:2008 en el servicio de Transportación Foránea de Pasajeros en Primera Clase, así como en la ejecución de la Gestión de la Calidad, Viaje y Servicios de Operación, Seguimiento del Servicio y Administración de Recursos; siendo así la única empresa certificada en todos y cada uno de sus procesos para mantener una mejora continua que le permite ser líder en el ramo del autotransporte.",
      "name": "Omnibus de México",
      "sameAs": "https://odmblog.com.mx/2018/03/02/omnibus-mexico-celebra-70-aniversario/",
      "url": "https://odm.com.mx/",
      "logo": "https://odm.com.mx/logoODM_google.jpg"
    }
  </script>


<script>
				// setTimeout(function(){
				// $( function() {
					setTimeout(function(){

						$( "#fechasalida1" ).datepicker({

								dateFormat: 'dd/mm/yy',
								minDate: 0,
								monthNames: ['Enero', 'Febreo', 'Marzo',
							'Abril', 'Mayo', 'Junio',
							'Julio', 'Agosto', 'Septiembre',
							'Octubre', 'Noviembre', 'Diciembre'],
							dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa']

							});

							$( "#fecharegreso" ).datepicker({

								dateFormat: 'dd/mm/yy',
								minDate: 0,
								monthNames: ['Enero', 'Febreo', 'Marzo',
							'Abril', 'Mayo', 'Junio',
							'Julio', 'Agosto', 'Septiembre',
							'Octubre', 'Noviembre', 'Diciembre'],
							dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa']

							});


					},3000);
					

				// } );

			// },500);
</script>


</body>
</html>