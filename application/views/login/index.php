	<div class="row hidden-sm" style="margin-top: 100px">
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
			    		<i style="font-size: 20em; color: #fff" class="icon-twitter"></i>
			    	</div>
			    	<div class="item">
			    		<i style="font-size: 20em; color: #fff" class="icon-cogs"></i>
			    	</div>
			    	<div class="item">
			    		<i style="font-size: 20em; color: #fff" class="icon-github-alt"></i>
			    	</div>
			    	<div class="item">
			    		<i style="font-size: 20em; color: #fff" class="icon-spinner icon-spin"></i>
			    	</div>
			  	</div>
			  <!-- Carousel nav -->
			  	<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
			  	<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
			</div>

		</div>
	</div>


	<div class="row visible-sm">

		<div class="col-md-3 col-md-offset-8">
			
		    <h2>Iniciar Sesión</h2>
			
			<div id="errorvalidation">

		    <?php if (isset($error) && !empty($error)): ?>
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo $error; ?>
				</div>
			<?php endif; ?>
			</div>

			<?php echo form_open('') ?>

			    <div class="control-group">
			        <input type="text" id="usuario" class="col-md-12" name="usuario" placeholder="Usuario" value="<?php echo $this->input->post('usuario'); ?>" />

			        <input type="password" id="pass" class="col-md-12" placeholder="Password" name="pass" >
			    </div>
				 
			    <!-- <input class="btn btn-primary col-md-12" type="submit" value="Enviar" > -->
			    <button class="btn btn-primary col-md-12" type="submit" >Enviar </button>
			</form>
			
		</div>
	</div>