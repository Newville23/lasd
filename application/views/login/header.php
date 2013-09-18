<!doctype html>
<html lang="es">
	<head>
		<title><?php echo $title ?> - Tutorial de CodeIgniter 2</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
			
		<link rel="stylesheet" type="text/css" href="<?php  echo base_url("bootstrap/css/bootstrap.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("font-awesome/css/font-awesome.min.css"); ?>">
		<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/lasd.css"); ?>">
    <script src="<?php  echo base_url("bootstrap/js/jquery.js"); ?>"></script>
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
    <div class="navbar navbar-fixed-top navbar-inverse">
      <div class="navbar-inner">
        <div class="container-fluid">

          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
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

                <li class="dropdown visible-desktop">
                    <div class="btn-group">
                        <button class="dropdown-toggle btn btn-primary" data-toggle="dropdown"><i class="icon-user icon-white"></i> 
                        Entrar <span class="caret"></span></button>
                    
                      <ul class="dropdown-menu pull-right">
                          <li class="nav-header"><h4>Iniciar sesión</h4></li>
                          <li class="divider"></li>
                          
                          <li>
                              <div class="">
                                <div class="span3">

                                    <div id="errorvalidation2" class="oculto">
                                      <div class="alert alert-error">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>   
                                      </div>
                                   </div>

                                    <div class="main">
                                      <?php echo form_open('login/loginajax', array('class' => 'form-horizontal', )) ?>

                                        <span class="control-group">
                                            <input type="text"  id="usuario" name="usuario" placeholder="Usuario" value="<?php echo $this->input->post('usuario'); ?>" >
                                        </span>

                                        <span class="control-group">
                                            <input type="password"  id="pass" placeholder="Password" name="pass" >
                                        </span>

                                        <button class="btn btn-primary" type="submit" >Enviar </button>
                                        
                                      </form>
                                    </div>

                                </div>
                              </div>
                          </li>
                      </ul
                    </div>
                </li>

            </ul>

<!--             <form class="navbar-search pull-right">
              <input type="text" class="search-query" placeholder="Search">
            </form> -->

          </div>
            
        </div>
      </div>
    </div>



