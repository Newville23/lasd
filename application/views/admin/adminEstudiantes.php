<div class="container-fluid" style="margin-top: 5%;">
	<div class="row-fluid">
		
		<div class="barra-propiedades">
			<button class="btn btn-large btn-inverse btn-block hidden-desktop" id="boton-barra">
				<i class="icon-arrow-down icon-large"></i>
			</button>
			<div class="bp-envoltura">
				<ul class="unstyled">
					<li><i style="padding-right: 8px" class="icon-building icon-large"></i><a href="<?php echo site_url('admin/agregarInstitucion'); ?>"> Agregar Institución</a></li>
					<li><a href="<?php echo site_url('admin'); ?>"><i style="padding-right: 8px" class="icon-list-alt icon-large"></i> Formularios</a></li>
					<li class="active"><a href="<?php echo site_url('admin/adminEstudiantes'); ?>"><i style="padding-right: 8px" class="icon-user icon-large"></i> Estudiantes</a></li>
					<li><a href="#"><i style="padding-right: 8px" class="icon-th-list icon-large"></i> Propiedad</a></li>
					<li><a href="#"><i style="padding-right: 8px" class="icon-folder-open icon-large"></i> Propiedad</a></li>
					<li><a href="#"><i style="padding-right: 8px" class="icon-bar-chart icon-large"></i> Estadisticas</a></li>
					<li><a href="#"><i style="padding-right: 8px" class="icon-picture icon-large"></i> Propiedad</a></li>
				</ul>
			</div>
		</div>

		<div class="span9 offset2">
			<div class="bloquePegadoUp">
				<ul class="nav nav-pills fontSize2">
					<?php $this->load->view('admin/includes-estudiante/menu-cursos'); ?>
				</ul>
			</div>

				<div class="bloquePegadoDown">
					<?php //$this->load->view('estudiante/listaEstudiantes'); ?>

					<div class="row-fluid">
						<div class="span6 pull-left">
							<a href="#" class=""><i class="icon-plus icon-large"></i> Añadir estudiante nuevo</a>
						</div>
						<div class="span6">
							<form class="form-search">
								<div class="input-append pull-right">
									<input type="text" class="search-query" placeholder="Estudiante">
									<span class="btn disabled"><i class="icon-search"></i> Buscar</span>
								</div>
							</form>
						</div>
					</div>

					<?php for ($i=0; $i <10 ; $i++): ?>
						<div class="media well-white bloque-top marcador-borde-azul" style="margin: 0px;">
					  		<a class="pull-left" href="#">
					    		<img class="media-object img-rounded" data-src="holder.js/64x64" alt="64x64" style="width: 40px; height: 40px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACZ0lEQVR4Xu2Y3YupURTGHyMSEimfUS4MIheSKDf+efksH0W4QKLIx43PZJxZq5xmOs2Z037PTBNr33gbe693r2c9e/3M1q3X6yseeOhEAHGAHAHpAQ/cAyFNUCggFBAKCAWEAg+sgGBQMCgYFAwKBh8YAvLPkGBQMCgYFAwKBgWDD6yAYFArBlerFfr9Pg6HA6xWKxKJBMxm8ztP1et1bDYbxONxeL3eT/32FTE/eqkmB5xOJxSLRTgcDvj9fvR6PX6mRG9jPB5jNBrhfD7/kwBfEfNvimsSYDqdotvtIpvNcvWv1yt0Ot3v9+12O1SrVYTDYZ53cwCJMhgMkEqlWLBarcYCZTIZzOdzpZif2uqDCZoEoCQomUAggMViAaPRiEgkArvdzmJQYpSgx+NBqVR654BGo4Htdgufz8cOSafTsNlsLIxqTBUR/osAoVAITqcTnU4HLy8vyOfzGA6HXE2q6n6//0MAqni5XMbxeMTz8zOCwSDv/yaASsxvF2AymfC5z+VysFgs/Ex/KxQKqFQqnPjtSJAw9EzJkmPoO5pzuVy4f0SjUd6/lpjfLgBVj5qg2+1mK5MDnp6eWBCiAiVNg5JtNpvcC2ieXq/n3kBzqfLtdhvJZBIul4sdoRLTYDCo5K/9PmC5XLJtaePUCGOxGH++HXTW3/YAcspsNuPjQc5ptVp4xTE3U5PJBJWYStm/LtLUA1Rf+pPWiQBafwn+pGqq7EUcIA6QKzG5EpMrMZXueS9rhAJCAaGAUEAocC8dXSUPoYBQQCggFBAKqHTPe1kjFBAKCAWEAkKBe+noKnk8PAV+AdqfV5+BvqppAAAAAElFTkSuQmCC">
					  		</a>
					  		<div class="media-body">
					    		<div class="span4">
					    			<strong class="media-heading text-success"><?php echo 'Lennin Alonso Suescun Devia'//$estudiante['nombre'] .' '. $estudiante['apellido']; ?></strong>
					    			<br><a class="fontSize1" href="#"><i class="icon-envelope-alt"></i> Mensaje</a>
					    		</div>
					    		
							
								<div class="span4" style="border-bottom: solid 3px #dadada;">
									<span>TI: </span>11431243323
								</div>
								<div class="span4" style="border-bottom: solid 3px #dadada;">
									hola mundo
								</div>
							</div>

						</div>
					<?php endfor; ?>
				</div>
					
		</div>

		</div>
	</div>
</div>