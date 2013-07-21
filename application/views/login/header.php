<!doctype html>
<html lang="es">
	<head>
		<title><?php echo $title ?> - Tutorial de CodeIgniter 2</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
			
		<link rel="stylesheet" type="text/css" href="<?php  echo base_url("bootstrap/css/bootstrap.css"); ?>">
		<link href="<?php  echo base_url("bootstrap/css/bootstrap-responsive.css"); ?>" rel="stylesheet">
		<style type="text/css">

      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: rgb(224, 224, 224);
      }

      .container-fluid {
        max-width: 80%;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .container-fluid .container-fluid-heading,
      .container-fluid .checkbox {
        margin-bottom: 10px;
      }
      .container-fluid input[type="text"],
      .container-fluid input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
      }

      .span3{
        background-color: rgba(254, 254, 254, 0.95);
        padding: 2%;
        margin: 2%;
        border-radius: 5px; 
      }

    </style>
	</head>
<body>
    <div class="navbar navbar-fixed-top navbar-inverse">
      <div class="navbar-inner">
        <div class="container">

          <a class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="icon-bar"></span>
            <span class="icon-user icon-white"></span>
          </a>

          <a class="brand" href="#">Project name</a>

          <div class="nav-collapse navbar-responsive-collapse collapse">
            <ul class="nav">
              <li class="divider-vertical active"><a href="#">Inicio</a></li>
            </ul>

            <form class="navbar-search pull-right">
              <input type="text" class="search-query" placeholder="Search">
            </form>

            <ul class="nav pull-right">
              <li class="divider-vertical"><a href="#"><i class="icon-user icon-white"></i> Entrar</a></li>
            </ul>
          </div>
            
        </div>
      </div>
    </div>



