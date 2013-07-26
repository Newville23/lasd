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
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: rgb(224, 224, 224);
        background: url("//www.hostpaperz.com/wp-content/uploads/2013/06/3d-desktop-wallpaper-hd.jpg")
         no-repeat center fixed;
      }

      .span3{
        padding: 10px;
      }

    </style>
	</head>
<body>
    <div class="navbar navbar-fixed-top navbar-inverse">
      <div class="navbar-inner">
        <div class="container">

          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-user icon-white"></span>
          </button>

          <a class="brand" href="#">Project name</a>

          <div class="nav-collapse collapse">

            <ul class="nav">
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

            <ul class="nav pull-right">

              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-user icon-white"></i> Entrar <b class="caret"></b></a>
                
                <ul class="dropdown-menu">
                    <li class="nav-header"><h4>Iniciar sesión</h4></li>
                    <li class="divider"></li>
                    
                    <li>
                        <div class="row">
                          <div class="span3">

                              <?php if (isset($error)): ?>
                              <div class="alert alert-error">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <?php echo $error; ?>
                              </div>
                            <?php endif; ?>

                            <?php echo validation_errors(); ?>

                            <?php echo form_open('') ?>

                                <div class="control-group">
                                    <input type="text" id="usuario" name="usuario" placeholder="Usuario" value="<?php echo $this->input->post('usuario'); ?>" />

                                    <input type="password" id="pass" placeholder="Password" name="pass" >
                                </div>
                             
                                    <input class="btn btn-primary" type="submit" value="Enviar" >
                            </form>
                          </div>
                        </div>
                    </li>
                </ul
              </li>

            </ul>

            <form class="navbar-search pull-right">
              <input type="text" class="search-query" placeholder="Search">
            </form>

          </div>
            
        </div>
      </div>
    </div>



