<div class="container-fluid" style="margin-top: 5%;">
	<div class="row-fluid">
		
		<div class="lennin"></div>
		<div class="barra-propiedades">
			<button class="btn btn-large btn-inverse btn-block hidden-desktop" id="boton-barra">
				<i class="icon-arrow-down icon-large"></i>
			</button>
			<div class="bp-envoltura">
				<?php $this->load->view('admin/includes/menu-admin'); ?>
			</div>
		</div>


		<div class="span8 offset2">

			<?php $this->load->view('admin/includes/forms/form-institucion');?>

		</div>
	</div>
</div>