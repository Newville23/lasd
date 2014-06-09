<div class="container" style="">
	<div class="row">
		
	<?php $this->load->view('admin/includes/menu-admin'); ?>

		<div class="col-md-10 col-md-offset-2 col-md-clear">

			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
						 	Docentes
						 </a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in">
					<div class="panel-body">
						<?php echo form_open('admin/docentesLista/' . $datos['Institucion_rut']) ?>
							<div class="row">
								<div class="hidden col-md-4" style="margin-top: 25px;">
										<a 
											id="#<?php //echo $value['id_time']; ?>" 
											class=""
											href=#"<?php //echo site_url('foro/foroModal/' . $value['Materia_id'] . '/' . $numeroClase . '/' . $value['id_time']); ?>" title="" 
											data-target="#myModal" data-toggle="modal"><i class="fa fa-plus fa-lg"></i> Añadir docente nuevo</a>
								</div>

								<div class="col-md-8 col-md-clear col-md-offset-4">
									<div class="input-group pull-right" style="margin: 20px;">
										<input type="search" name="busquedaUser" class="form-control input-lg busquedaUser" placeholder="Escribe el nombre o la identificación del docente">
										<span class="btn disabled input-group-addon"><i class="fa fa-lg fa-search"></i> </span>
									</div>
								</div>
							</div>

							<div class="busquedaUserResul col-md-12 col-sm-12 col-xs-12 col-md-clear">
										
							</div>

						</form>
					</div>
				</div>	
			</div>	

		</div>
	</div>
</div>

<!-- Modal Agregar Estudiante -->
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      	<div class="modal-content modal-correccion">

	        <div class="modal-header">
	         	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times fa-lg text-error"></i></button>
	         	<h4 class="modal-title text-muted">Agregar docente</h4>
	        </div>

	        <div class="modal-body">
	        	<div class="row">
					<?php $this->load->view('admin/includes/forms/form-profesor'); ?>
				</div>
	        </div>

      	</div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal del Perfil deL DOCENTE -->

<div class="modal" id="modalPerfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      	<div class="modal-content modal-correccion">

	        <div class="modal-header">
	         	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times fa-lg text-error"></i></button>
	         	<h4 class="modal-title text-muted">Perfil de estudiante</h4>
	        </div>

	        <div class="modal-body">
	        	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam, cum excepturi nobis animi fugit aut ad quis expedita. Excepturi, autem ea quaerat ducimus accusamus? Voluptatum voluptatibus reiciendis accusantium asperiores provident.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, soluta praesentium unde qui eaque sed? Voluptas, nemo, nulla, totam aliquid libero sed incidunt minus dolores vitae eaque voluptatibus error obcaecati rerum ducimus unde temporibus cumque iste omnis quaerat at quidem quia est quas eos facere dignissimos numquam deleniti. Sit, ipsum illum dignissimos optio accusamus doloribus laborum tempore eveniet molestiae aut quaerat aperiam nihil praesentium id nam nesciunt culpa. Explicabo, facere blanditiis aspernatur nam magni odio perferendis soluta itaque illo ab exercitationem nobis mollitia ipsa architecto quas necessitatibus quasi molestias nesciunt tenetur pariatur tempore vel animi fuga hic voluptatibus placeat alias ut reprehenderit impedit? Dolore, eveniet, impedit facilis repellendus ad quos porro sequi laboriosam consequatur reiciendis exercitationem beatae aliquam alias iure odio perferendis quo! Odio cumque voluptates quibusdam placeat pariatur? Blanditiis, ipsa, labore, facilis facere magnam aperiam consequatur odit ratione molestias odio saepe est consequuntur corporis quia illo tenetur inventore fugiat accusamus tempore soluta dolores architecto expedita quasi impedit excepturi assumenda at ex eos libero error! Sed, beatae, nisi praesentium rerum quod ipsum dolorum natus similique exercitationem nihil dolores culpa voluptate aspernatur iure necessitatibus! Sapiente, ipsa, deleniti, quod sunt eius accusantium soluta exercitationem autem nostrum perspiciatis suscipit sed aperiam! Provident, similique minus facere vitae dolor molestiae deleniti nemo ducimus ratione assumenda? Fuga, magni incidunt at autem dicta repellendus ratione facere nihil dignissimos dolores. Corporis, quaerat repudiandae quisquam sed possimus veritatis debitis quos officiis inventore atque doloremque ipsa quas non molestias ex animi illo alias distinctio cupiditate asperiores. Quam, amet, officia a quidem ullam rerum inventore dolorem ducimus iusto facilis nostrum porro ipsam dicta exercitationem possimus omnis impedit maiores voluptas debitis reiciendis obcaecati consequatur eaque nam enim modi quis doloribus sint vitae qui deleniti et voluptatibus repellat totam! Id, odit fugiat repellat. Accusamus, fugit, suscipit alias odit obcaecati asperiores libero inventore. Omnis.</p>
	 	    </div>

      	</div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->