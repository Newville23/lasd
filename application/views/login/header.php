<!doctype html>
<html lang="es">
	<head>
		<title><?php echo $title ?> - Flügel</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
			
		<link rel="stylesheet" type="text/css" href="<?php  echo base_url("bootstrap/css/bootstrap.css"); ?>">
        <link rel="stylesheet" href="<?php echo base_url("font-awesome/css/font-awesome.min.css"); ?>">
		<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/lasd.css"); ?>">
        <script src="<?php  echo base_url("bootstrap/js/jquery.js"); ?>"></script>
        <script src="<?php  echo base_url("bootstrap/js/datepicker/bootstrap-datepicker.js"); ?>"></script>
    
        <style type="text/css">

          body {
            padding-bottom: 40px;
            background-color: rgb(224, 224, 224);
            background: url("//4.bp.blogspot.com/_MHnA5hJubcU/THAhOpwz67I/AAAAAAAADSI/LS_mN4sd-p0/s1600/finlandia.jpg")
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

            <ul class="nav navbar-nav">
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



