	<div class="row hidden-xs" style="margin-top: 100px">
		<div class="col-md-12">

			<div id="myCarousel" class="carousel slide">
				<ol class="carousel-indicators">
			    	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			    	<li data-target="#myCarousel" data-slide-to="1"></li>
			    	<li data-target="#myCarousel" data-slide-to="2"></li>
			    	<li data-target="#myCarousel" data-slide-to="3"></li>
			 	</ol>
			  <!-- Carousel items -->
			  	<div class="carousel-inner" style="background-color: rgba(0, 0, 0, 0.5);">
			    	<div class="active item">
			    		<i style="font-size: 20em; color: #fff" class="fa fa-twitter"></i>
			    	</div>
			    	<div class="item">
			    		<i style="font-size: 20em; color: #fff" class="fa fa-cogs"></i>
			    	</div>
			    	<div class="item">
			    		<i style="font-size: 20em; color: #fff" class="fa fa-github-alt"></i>
			    	</div>
			    	<div class="item">
			    		<i style="font-size: 20em; color: #fff" class="fa fa-spinner fa-spin"></i>
			    	</div>
			  	</div>
			  <!-- Carousel nav -->
			  	<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
			  	<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
			</div>

		</div>
	</div>


	<div class="content visible-xs">

		<div class="row" style="margin-top: 15%;">
			
		    <h2 class="text-center">Iniciar Sesión</h2>
			
			<div id="errorvalidation">

		    <?php if (isset($error) && !empty($error)): ?>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo $error; ?>
				</div>
			<?php endif; ?>
			</div>
			
			<div class="col-md-12">
			<?php echo form_open('') ?>

			    <div class="form-group">
			        <input type="text" id="usuario" class="form-control input-lg" name="usuario" placeholder="Usuario" value="<?php echo $this->input->post('usuario'); ?>" />

			        <input type="password" id="pass" class="form-control input-lg" placeholder="Password" name="pass" >
			    </div>
				 
			    <!-- <input class="btn btn-primary col-md-12" type="submit" value="Enviar" > -->
			    <div class="form-group">
			    	<button class="btn btn-primary form-control input-lg" type="submit" >Enviar </button>
			    </div>
			</form>
			</div>
			
		</div>
	</div>