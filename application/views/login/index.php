	<div class="row-fluid">
		<div class="span3 offset8">
			
		    <h2>Iniciar Sesión</h2>

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