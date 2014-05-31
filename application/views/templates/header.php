<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Flügel -  <?php echo $title ?></title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="description" property="og:description" content="Sistema de gestión basado en la excelencia, permite caracterizar totalmente a las Instituciones, de acuerdo a los indicadores académicos de interés, la verificación en tiempo real de estos y apoya el proceso de formación de los estudiantes." />
        <meta name="keywords" content="flügel, flugel, iflugel, iflügel, iflugel, educación, volemos juntos, gestión, Cluster, music videos" />

		<link rel="stylesheet" href="<?php  echo base_url("bootstrap/css/bootstrap.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("font-awesome/css/font-awesome.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("bootstrap/css/lasd.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("bootstrap/css/boxstyles.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("bootstrap/css/summernote.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("bootstrap/css/datepicker/datepicker3.css"); ?>">
        
        <!-- Favicons -->
        <link rel="icon" href="<?php  echo base_url("bootstrap/img/images/favicon64.ico"); ?>" sizes="64x64 32x32 24x24 16x16" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php  echo base_url("bootstrap/img/images/apple-touch-icon-144-precomposed.png"); ?>">
        <link rel="shortcut icon" href="<?php  echo base_url("bootstrap/img/images/favicon.ico"); ?>">

        <script src="<?php  echo base_url("bootstrap/js/jquery.js"); ?>"></script>
        <script src="<?php  echo base_url("bootstrap/js/datepicker/bootstrap-datepicker.js"); ?>"></script>
        <script src="<?php  echo base_url("bootstrap/js/highcharts.js"); ?>"></script>

        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-51348382-1', 'iflugel.co');
          ga('send', 'pageview');

        </script>
    	
        <style type="text/css">

            body {
                background: url("//trello-attachments.s3.amazonaws.com/5325166619555a642af24408/536ac179282d995e6799ac8b/1440x700/9c46ded5a54d5180946c46509224b256/fondo1.1.png") 
                no-repeat bottom center fixed #bdddeb;
                padding-top: 70px;
            }

            footer{
                position: fixed;
                bottom: 0;
                text-align: center;
            }

        </style>
	</head>

<body data-spy="scroll" data-target="#nav-ejemplo" data-offset="100">
  
    <nav class="navbar navbar-inverse navbar-static-top navbar-fixed-top" role="navigation">

        <div class="container-fluid">

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" >
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-bars fa-inverse fa-lg"></span>
                </button>

                <a class="navbar-brand" href="<?php echo site_url($linkIndex); ?>">Flügel Project</a>

            </div>    
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?php echo site_url($linkIndex); ?>">Inicio</a></li>
                    <li class="hidden"><a href="<?php echo site_url('box/box'); ?>">ShareBox</a></li>

                </ul>

                <ul class="nav navbar-nav navbar-right visible-lg">

                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-cog fa-lg"> </i> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-wrench"></i> Ayuda</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('login/cerrar'); ?>"><i class="fa fa-off"></i> Cerrar Sesión</a></li>
                    </ul>
                  </li>

                </ul>

                <ul class="nav navbar-nav navbar-left hidden-lg">
                  <li><a href="#"><i class="fa fa-wrench"></i> Ayuda</a></li>
                  <li><a href="<?php echo site_url('login/cerrar'); ?>"><i class="fa fa-off"></i> Cerrar Sesión</a></li>
                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        
    </nav>