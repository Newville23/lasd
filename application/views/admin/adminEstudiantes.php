<div class="container-fluid" style="margin-top: 5%;">
	<div class="row-fluid">
		
		<div class="barra-propiedades">
			<button class="btn btn-large btn-inverse btn-block hidden-desktop" id="boton-barra">
				<i class="icon-arrow-down icon-large"></i>
			</button>
			<div class="bp-envoltura">
				<?php $this->load->view('admin/includes/menu-admin'); ?>
			</div>
		</div>

		<div class="span9 offset2">
			<div class="bloquePegadoUp">
				<ul class="nav nav-pills fontSize2">
					<?php $this->load->view('admin/includes-estudiante/menu-cursos'); ?>
				</ul>

				<div class="accordion" id="accordion2" style="margin-bottom: 0">
					<div class="accordion-group">

						<div class="accordion-heading nav" style="margin-bottom: 0">
							<a class="accordion-toggle Matbar" style="margin-bottom: 0" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
								Filtros
							</a>
						</div>
						<div id="collapseOne" class="accordion-body collapse">
							<div class="accordion-inner">
								<?php $this->load->view('admin/includes/filtros-estudiantes'); ?>
							</div>
						</div>

					</div>
				</div>

			</div>

				<div class="bloquePegadoDown">

					<div class="row-fluid">
						<div class="span6 pull-left">
								<a 
									id="#<?php //echo $value['id_time']; ?>" 
									class=""
									href=#"<?php //echo site_url('foro/foroModal/' . $value['Materia_id'] . '/' . $numeroClase . '/' . $value['id_time']); ?>" title="" 
									data-target="#myModal" data-toggle="modal"><i class="icon-plus icon-large"></i> Añadir estudiante nuevo</a>
						</div>
						<div class="span6">
							<form class="form-search">
								<div class="input-append pull-right">
									<input type="text" class="search-query" placeholder="Nombre del estudiante">
									<span class="btn disabled"><i class="icon-search"></i> Buscar</span>
								</div>
							</form>
						</div>
					</div>

					<?php 
						for ($i=0; $i <10 ; $i++){
							$this->load->view('admin/includes-estudiante/lista-estudiantes');
						}
					 ?>
				</div>
					
		</div>

		</div>
	</div>
</div>

<!-- Modal Agregar Estudiante -->
<div id="myModal" class="modal hide modal-correccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header" style="background-color: rgba(221, 221, 221, 0.3);">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large text-error"></i></button>
		  <h5 class="muted text-center" id="myModalLabel">Agregar estudiante</h5>
	</div>
	<div class="modal-body" id="">
		<div class="row-fluid">
			<?php $this->load->view('admin/includes/form-estudiantes'); ?>
		</div>
	</div>

</div>

<!-- Modal del Perfil de estudiante -->

<div id="modalPerfil" class="modal hide modal-correccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header" style="background-color: rgba(221, 221, 221, 0.3);">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large text-error"></i></button>
		  <h5 class="muted text-center" id="myModalLabel">Perfil de estudiante</h5>
	</div>
	<div class="modal-body" id="">
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam, cum excepturi nobis animi fugit aut ad quis expedita. Excepturi, autem ea quaerat ducimus accusamus? Voluptatum voluptatibus reiciendis accusantium asperiores provident.</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, soluta praesentium unde qui eaque sed? Voluptas, nemo, nulla, totam aliquid libero sed incidunt minus dolores vitae eaque voluptatibus error obcaecati rerum ducimus unde temporibus cumque iste omnis quaerat at quidem quia est quas eos facere dignissimos numquam deleniti. Sit, ipsum illum dignissimos optio accusamus doloribus laborum tempore eveniet molestiae aut quaerat aperiam nihil praesentium id nam nesciunt culpa. Explicabo, facere blanditiis aspernatur nam magni odio perferendis soluta itaque illo ab exercitationem nobis mollitia ipsa architecto quas necessitatibus quasi molestias nesciunt tenetur pariatur tempore vel animi fuga hic voluptatibus placeat alias ut reprehenderit impedit? Dolore, eveniet, impedit facilis repellendus ad quos porro sequi laboriosam consequatur reiciendis exercitationem beatae aliquam alias iure odio perferendis quo! Odio cumque voluptates quibusdam placeat pariatur? Blanditiis, ipsa, labore, facilis facere magnam aperiam consequatur odit ratione molestias odio saepe est consequuntur corporis quia illo tenetur inventore fugiat accusamus tempore soluta dolores architecto expedita quasi impedit excepturi assumenda at ex eos libero error! Sed, beatae, nisi praesentium rerum quod ipsum dolorum natus similique exercitationem nihil dolores culpa voluptate aspernatur iure necessitatibus! Sapiente, ipsa, deleniti, quod sunt eius accusantium soluta exercitationem autem nostrum perspiciatis suscipit sed aperiam! Provident, similique minus facere vitae dolor molestiae deleniti nemo ducimus ratione assumenda? Fuga, magni incidunt at autem dicta repellendus ratione facere nihil dignissimos dolores. Corporis, quaerat repudiandae quisquam sed possimus veritatis debitis quos officiis inventore atque doloremque ipsa quas non molestias ex animi illo alias distinctio cupiditate asperiores. Quam, amet, officia a quidem ullam rerum inventore dolorem ducimus iusto facilis nostrum porro ipsam dicta exercitationem possimus omnis impedit maiores voluptas debitis reiciendis obcaecati consequatur eaque nam enim modi quis doloribus sint vitae qui deleniti et voluptatibus repellat totam! Id, odit fugiat repellat. Accusamus, fugit, suscipit alias odit obcaecati asperiores libero inventore. Omnis.</p>
	</div>

</div>