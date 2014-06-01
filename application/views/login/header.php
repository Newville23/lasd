<!doctype html>
<html lang="es">
	<head>
		<title>Flügel -  <?php echo $title ?></title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="description" property="og:description" content="Sistema de gestión basado en la excelencia, permite caracterizar totalmente a las Instituciones, de acuerdo a los indicadores académicos de interés, la verificación en tiempo real de estos y apoya el proceso de formación de los estudiantes." />
		<meta name="keywords" content="flügel, flugel, iflugel, iflügel, iflugel, educación, volemos juntos, gestión, Cluster" />

		<link rel="stylesheet" type="text/css" href="<?php  echo base_url("bootstrap/css/bootstrap.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("font-awesome/css/font-awesome.min.css"); ?>">
		<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/lasd.css"); ?>">
        
        <!-- Favicons -->
        <link rel="icon" href="<?php  echo base_url("bootstrap/img/images/favicon64.ico"); ?>" sizes="64x64 32x32 24x24 16x16" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php  echo base_url("bootstrap/img/images/apple-touch-icon-144-precomposed.png"); ?>">
        <link rel="shortcut icon" href="<?php  echo base_url("bootstrap/img/images/favicon.ico"); ?>">

        <script src="<?php  echo base_url("bootstrap/js/jquery.js"); ?>"></script>
        <script src="<?php  echo base_url("bootstrap/js/datepicker/bootstrap-datepicker.js"); ?>"></script>

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
            padding-bottom: 40px;
            background-color: rgb(224, 224, 224);
            background: url("//www.todayonline.com/sites/default/files/styles/photo_gallery_image_lightbox/public/16254437.JPG?itok=ie_fot1Q")
             no-repeat center fixed;
          }

          .span3{
            padding: 10px;
          }
        
        </style>

	</head>
<body>
    <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation" style="background-color: rgba(10, 10, 10, 0.8);">
        
        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" >
                <span class="sr-only">Toggle navigation</span>
                <span class="fa fa-bars fa-inverse fa-lg"></span>
            </button>

            <a class="navbar-brand" href="#">Flügel Project</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">

            <ul class="hidden nav navbar-nav">
                <li>
                    <a href="#">hola</a>
                </li>
                <li>
                    <a href="#">hola</a>
                </li>
                <li class="active">
                    <a href="#">hola</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li href="#" class="dropdown hidden-xs navbar-form">
                    
                    
                    <button class="dropdown-toggle btn btn-primary" data-toggle="dropdown"><i class="fa fa-user icon-white"></i> 
                        Entrar <b class="caret"></b></button>
                    

                    <ul class="dropdown-menu" role="menu" style="padding: 20%; width: 260px;">
                        <li role="presentation" class="dropdown-header"><h4>Iniciar sesión</h4></li>
                        <li role="presentation" class="divider"></li>
                          
                        <li>
                            <div id="errorvalidation2" class="oculto">
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>   
                                </div>
                            </div>
                            
                            <div class="main">
                                <?php echo form_open('login/loginajax', array('class' => '' )) ?>
                                    
                                    <div class="form-group">
                                        <input class="form-control well2" type="text"  id="usuario" name="usuario" placeholder="Usuario" value="<?php echo $this->input->post('usuario'); ?>" >
                                        <input class="form-control well2" type="password"  id="pass" placeholder="Password" name="pass" >
                                        <button class="btn btn-primary form-control" type="submit" >Enviar </button>
                                    </div>

                                </form>
                            </div>

                        </li>
                        <li role="presentation" class="divider"></li>
                        <a tabindex="-1" href="#">¿Olvidaste tu contraseña?</a>
                    </ul>
                </li>

            </ul>

        </div>
    </nav>



