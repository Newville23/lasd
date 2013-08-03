	<div class="row-fluid hidden-desktop">
		<div class="span3 offset8">
			
		    <h2>Iniciar Sesión</h2>
			
			<div id="errorvalidation">

		    <?php if (isset($error) && !empty($error)): ?>
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo $error; ?>
				</div>
			<?php endif; ?>
			</div>

			<?php //echo validation_errors(); ?>
			
			
				<?php echo form_open('') ?>

				    <div class="control-group">
				        <input type="text" id="usuario" class="span12" name="usuario" placeholder="Usuario" value="<?php echo $this->input->post('usuario'); ?>" />

				        <input type="password" id="pass" class="span12" placeholder="Password" name="pass" >
				    </div>
				 
				    <!-- <input class="btn btn-primary span12" type="submit" value="Enviar" > -->
				    <button class="btn btn-primary span12" type="submit" >Enviar </button>
				</form>
			
		</div>
	</div>