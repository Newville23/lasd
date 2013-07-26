<!doctype html>
<html lang="es">
	<head>
		<title><?php echo $title ?> - Tutorial de CodeIgniter 2</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
			
		<link rel="stylesheet" type="text/css" href="<?php  echo base_url("bootstrap/css/bootstrap.css"); ?>">
		<link href="<?php  echo base_url("bootstrap/css/bootstrap-responsive.css"); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url("bootstrap/css/lasd.css"); ?>">
		<style type="text/css">

      body {
        background: url("//d7mj4aqfscim2.cloudfront.net/images/landscapes/duo-land_mv_5b500a4f052f4985943c1cc44a06a7ff.jpg") 
      no-repeat bottom center fixed #bdddeb;
      }

      footer{
        position: fixed;
        bottom: 0;
        text-align: center;
      }

    </style>
	</head>
<body>
  <div class="navbar navbar-fixed-top navbar-inverse">
      <div class="navbar-inner">
        <div class="container">

          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-user icon-white"></span>
          </a>

          <a class="brand" href="<?php echo site_url('formularios#'); ?>">Project name</a>

          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Inicio</a></li>
              <li><a href="#">Hola</a></li>
              <li><a href="#">Hola</a></li>
            </ul>

            <form class="navbar-search pull-right">
              <input type="text" class="search-query" placeholder="Search">
            </form>

            <ul class="nav pull-right">

              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Configuración <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Ayuda</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo site_url('login/cerrar'); ?>">Cerrar Sesión</a></li>
                </ul>

              </li>

            </ul>
          </div>
            
        </div>
      </div>
    </div>


