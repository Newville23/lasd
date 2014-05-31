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