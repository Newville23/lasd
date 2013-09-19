<div class="container" style="margin-top: 5%;">
	<div class="row">
		
		<div class="lennin"></div>
		<div class="barra-propiedades">
			<button class="btn btn-lg btn-inverse btn-block hidden-lg" id="boton-barra">
				<i class="icon-arrow-down icon-large text-muted"></i>
			</button>
			<div class="bp-envoltura">
				<?php $this->load->view('admin/includes/menu-admin'); ?>
			</div>
		</div>


		<div class="col-md-8 col-md-offset-2">

			<?php $this->load->view('admin/includes/forms/form-institucion');?>

		</div>
	</div>
</div>