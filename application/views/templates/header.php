<!DOCTYPE html>
<html lang="es">
	<head>
		<title><?php echo $title ?> - Athena Project</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<link rel="stylesheet" href="<?php  echo base_url("bootstrap/css/bootstrap.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("font-awesome/css/font-awesome.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("bootstrap/css/lasd.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("bootstrap/css/boxstyles.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("bootstrap/css/summernote.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("bootstrap/css/datepicker/datepicker3.css"); ?>">

        <script src="<?php  echo base_url("bootstrap/js/jquery.js"); ?>"></script>
        <script src="<?php  echo base_url("bootstrap/js/datepicker/bootstrap-datepicker.js"); ?>"></script>
        <script src="<?php  echo base_url("bootstrap/js/highcharts.js"); ?>"></script>
    	
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

<body data-spy="scroll" data-target="#nav-ejemplo" data-offset="100">
  
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" >
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="<?php echo site_url($linkIndex); ?>">Athena Project</a>

        </div>    
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo site_url($linkIndex); ?>">Inicio</a></li>
                <li><a href="<?php echo site_url('box/box'); ?>">ShareBox</a></li>
                <!-- <li><a href="#">Hola</a></li> -->
            </ul>

            <ul class="nav navbar-nav navbar-right visible-lg">

              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-cog icon-large"> </i> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="icon-wrench"></i> Ayuda</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo site_url('login/cerrar'); ?>"><i class="icon-off"></i> Cerrar Sesión</a></li>
                </ul>
              </li>

            </ul>

            <ul class="nav navbar-nav navbar-left hidden-lg">
              <li><a href="#"><i class="icon-wrench"></i> Ayuda</a></li>
              <li><a href="<?php echo site_url('login/cerrar'); ?>"><i class="icon-off"></i> Cerrar Sesión</a></li>
            </ul>

        </div><!-- /.navbar-collapse -->
            
    </nav>