<!DOCTYPE html>
<html lang="es">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="description" property="og:description" content="Sistema de gestión basado en la excelencia, permite caracterizar totalmente a las Instituciones, de acuerdo a los indicadores académicos de interés, la verificación en tiempo real de estos y apoya el proceso de formación de los estudiantes." />
		<meta name="keywords" content="flügel, flugel, iflugel, iflügel, iflugel, educación, volemos juntos, gestión, Cluster, music videos" />

		<link rel="stylesheet" type="text/css" href="<?php  echo base_url("bootstrap/css/bootstrap.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("font-awesome/css/font-awesome.min.css"); ?>">
		<link rel="stylesheet" href="<?php //echo base_url("bootstrap/css/lasd.css"); ?>">
		<link rel="stylesheet" type="text/css" href="<?php  echo base_url("bootstrap/css/custom.css"); ?>">
	<title>Flügel</title>
	
	<!-- Favicons -->
        <link rel="icon" href="<?php  echo base_url("bootstrap/img/images/favicon64.ico"); ?>" sizes="64x64 32x32 24x24 16x16" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php  echo base_url("bootstrap/img/images/apple-touch-icon-144-precomposed.png"); ?>">
        <link rel="shortcut icon" href="<?php  echo base_url("bootstrap/img/images/favicon.ico"); ?>">

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<script src="<?php  echo base_url("bootstrap/js/jquery.js"); ?>"></script>
	<script src="<?php  echo base_url("bootstrap/js/datepicker/bootstrap-datepicker.js"); ?>"></script>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style type="text/css">
		body{
			background-color: #FFF;
			font-family: "Open Sans",Helvetica,Arial,sans-serif;
			perspective: 1px;
		}
		.navbar-default{
			background-color: #FFF;
			box-shadow: 0 0 6px rgba(0, 0, 0, 0.26);

		}

		header .container ul{
			margin-top: 10px;
		}
		.navbar-default .navbar-nav>li>a {
			color: #204C86;
		}

		.btn{

			border: solid 4px white;
			border-radius: 4px;
			color: white;
			font: 1.5em "Open Sans", Helvetica, Arial, sans-serif;
			height: 70px;
			padding: 18px 18px 18px 18px;
			margin-top: 40px;
			margin-right: 1000px;
			font-weight: bold;
			text-decoration: none;
			width: 250px;

		}

		.btn-azul{

			border: solid 4px #204C86 ;
			border-radius: 4px;
			color: #204C86 ;
			font: 1.5em "Open Sans", Helvetica, Arial, sans-serif;
			height: 50px;
			padding: 4px;
			margin-top: 40px;
			margin-right: 1000px;
			font-weight: bold;
			text-decoration: none;
			width: 250px;

		}

		.btn:hover, .btn-azul:hover{
			background-color: #204C86 !important;
			border-color: #204C86 !important;
			color: #FFF !important;
			-webkit-transition: background-color 0.5s ease,color 0.5s ease;
			-moz-transition: background-color 0.5s ease,color 0.5s ease;
			-o-transition: background-color 0.5s ease,color 0.5s ease;
			transition: background-color 0.5s ease,color 0.5s ease;
		}

		.navbar-nav>li>a{

			border: solid 2px #204C86;
			border-radius: 4px;
			color: #204C86;
			height: 40px;
			padding: 8px 18px 8px 18px;
			margin-top: 4px;
			font-weight:bold;
			width: 100px;

			
		}

		.navbar-nav>li>a:hover{
			background-color: #204C86 !important;
			color: #FFF !important;
			-webkit-transition: background-color 0.5s ease,color 0.5s ease;
			-moz-transition: background-color 0.5s ease,color 0.5s ease;
			-o-transition: background-color 0.5s ease,color 0.5s ease;
			transition: background-color 0.5s ease,color 0.5s ease;
		}   

	


	</style>
  </head>
  <body>
	<header>
	
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="margin-top: 18px; margin-bottom: 18px;">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<h1><a id="min" class="navbar-brand" href="#" style="margin-top: 10px; margin-bottom: 10px;">Flügel Project</a></h1>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li ><a class="text-center" data-toggle="modal" data-target=".bs-example-modal-sm" href="#">Ingresar</a></li>
						
					</ul>   


				</div>
			</div>
					
		</nav>

	</header>

	<div id="start" class="container-fluid">
		<div class="container" style=" margin-bottom: 30px;">
			<h2>Volemos Juntos</h2>
			<p id="start-p" class=" col-md-6 col-sm-12" style="padding-left: 0px;">Obtén reportes precisos y confiables de tu plantel educativo en tiempo real, y has que tu progreso en la educación sea productivo. </p>
			
			<p><a class="btn" href="#">Empieza ahora</a></p>
			
		</div>
			
	</div>

	<section  class="exp container-fluid">
		<div class="container">
			<div class="col-md-9 col-md-offset-2">
				<h2 class="text-center">No pierdas ningún progreso de tu institución</h2>
				<p class="text-center">Infórmate, evalúa y comunica desde cualquier lugar los logros obtenidos por tu plantel educativo</p>
			</div>	
		</div>	

	</section>  

	
	<section id="devices" class="container-fluid">

		<div class="container">
			<div class=" col-md-6">
				<img id="devices-1" src="<?php  echo base_url("bootstrap/img/LandingFlugel/devices.png"); ?>">
			</div>

			<div id="devices-2"  class="col-md-5 col-md-offset-1">
				<h2>Integra tu plataforma a cualquier dispositivo</h2>

				<p>Con Flügel sigue minuto a minuto el progreso de las clases y cursos que conforman tu institución. Úsala desde cualquier dispositivo móvil o tablet.</p>               
			</div>
		</div>
		
	</section>

	<section  class=" exp container-fluid">
		<div class="container">
			<div class="col-md-8 col-md-offset-2">
				<h2 class="text-center">Flügel se preocupa por el camino que ellos quieren formar</h2>
				<p class="text-center">Fomenta el trabajo en equipo en tu plantel educativo. Desarrolla, crea e innova de la mano de un grupo de trabajo sólido y amigable; entre padres, estudiantes y maestros </p>
			</div>	
		</div>	

	</section>  

	<section id="node" class="container-fluid">

		<div class="container">
			<div class=" col-md-6">
				<img id="node-1" style="height: 390px;width: 360px;" src="<?php  echo base_url("bootstrap/img/LandingFlugel/node.png"); ?>">
			</div>

			<div id="node-2"  class="col-md-5 col-md-offset-1">
				<h2>Relaciónate fácil y de inmediato</h2>

				<p>Mantén informado a tu grupo de trabajo acerca del progreso del contenido por asignaturas y el registro de indicadores que representen el desarrollo en la formación académica. Vincula y desvincula docentes, estudiantes y acudientes en espacios de cooperación que incentiven la excelencia académica.</p>               
			</div>
		</div>
		
	</section>


	
	<footer>
		<div id="footer" class="container-fluid ">
			<div class="container">
				<div class="col-md-4">

				<h2>Footer</h2>
				<p style="margin-bottom: 100px; margin-top: 40px;">Nuestro principal interés es brindar una red de cooperación académica, con el fin de alcanzar la excelencia.</p>
				<p >&copy; 2014 Flügel Project, Inc.</p>
				</div>
			</div>
		

		</div>

	</footer>
	
	<!-- Modal de Login --> 
	<div class="modal fade in bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title text-center">Iniciar sesión</h4>
				</div>
				<div class="modal-body">

					<div id="errorvalidation2" class="hidden">
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>   
                        </div>
                    </div>
					
					<div class="main">
						<?php echo form_open('login/loginajax', array('class' => '' )) ?>
							<div class="form-group">
								<label >Usuario</label>
								<input type="text" class="form-control" name="usuario" value="<?php echo $this->input->post('usuario'); ?>" placeholder="Ingrese su usuario">
							</div>
							<div class="form-group">
								<label >Clave</label>
								<input type="password" class="form-control" name="pass" placeholder="Ingrese su clave">
							</div>
							<div class="form-group">
								<label class="col-sm-2 control label"><a href="#">¿Olvido su contraseña?</a></label>

							</div>
							<button type="submit" class="btn-azul btn-default form-control">Acceder</button>
						</form>
					</div>

				</div>
				
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!-- End modal Login -->