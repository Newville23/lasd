<div class="row-fluid bloquePegadoUp">
	<div class="">
		<h4 class="text-success"><i class="icon-puzzle-piece icon-large"></i>
			<?php echo ' Nombre de Materia'//$ProfesorFromClase['nombre']; //nombre profesor ?></h4>
	</div>
</div>

<div class="row-fluid bloquePegadoDown">
	<div class="tabbable">

		<ul class="nav nav-tabs">
		 	<li class=""><a href="#contenido" data-toggle="tab">Contenido</a></li>
			<li class=""><a href="#foro" data-toggle="tab">Foro</a></li>
			<li class=""><a href="#trabajos" data-toggle="tab">Trabajos</a></li>
			<li class="active"><a href="#notas" data-toggle="tab">Notas</a></li>
		</ul>

		<div class="tab-content">

			<div class="tab-pane" id="contenido">
				<p>Seccion numero 1
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, consequatur, rerum laboriosam voluptatibus quasi non provident repudiandae accusantium odit eligendi architecto tempora fuga explicabo officiis vel corporis assumenda ipsa nihil exercitationem dolorem veritatis quidem debitis enim suscipit quisquam libero quos eum mollitia et dolorum quia corrupti dicta soluta magni consequuntur aperiam adipisci reprehenderit! Ipsam sed qui accusantium vel esse dolore explicabo architecto eos in facilis. Perspiciatis, enim sunt eius iure maiores ipsum laudantium corrupti quibusdam minus. Odit, voluptate, eos, tempora eveniet explicabo rem quo tenetur delectus officia maiores asperiores quam iusto pariatur ipsum ducimus qui labore doloribus dolore nulla inventore.
				</p>
			</div>

			<div class="tab-pane" id="foro">
				<div class="bloque-top">

					<?php echo form_open('', array('class' => 'form-horizontal')) ?>
								
						<div class="control-group">
							<p Class="muted"><i class="icon-pencil icon-2x"></i><span> Crea un nuevo foro de discución</span></p>				
							<textarea name="tituloforo" id="tituloforo" required class="textprincipal input-block-level text-info fontSize3 bordersize1" cols="30" rows="1" placeholder="Escribe un titulo o idea principal..."></textarea>
						</div>

						<div class="control-group">
							<textarea name="cuerpoforo" id="cuerpoforo" class="input-block-level fontSize3 bordersize1" cols="30" rows="5" placeholder="Desarrolla la pregunta.."></textarea>	
						</div>

						<div class="btn-group btn-foro" id="">
							<button id="enviarforo" class="btn btn-primary btn-large" type="submit"><i class="icon-ok icon-white"></i> Enviar</button>
							<button id="" class="btn btn-large cancelarforo" type="reset"><i class="icon-remove"></i></button>
						</div>		
									
					</form>

					<?php // carga la lista de los temas de los foros
					$this->load->view('profesor/includes/foro'); ?>

				</div>
			</div>

			<div class="tab-pane" id="trabajos">
				<p>Lorem ipsum dolor sit ametusamus saepe a explicabo voluptas soluta aliquam enim dolorem qui ab quis neque consequatur cum nihil earum rerum fugiat molestias itaque temporibus. Dolores, sapiente, quibusdam, consectetur veniam sequi aut atque amet laboriosam nulla illum tempora corrupti tenetur optio velit aliquid. Libero, animi, sed, ipsa quam minus reiciendis perferendis fugiat consequatur aliquid qui asperiores iusto saepe eum cum id pariatur quod itaque sunt praesentium nemo nisi blanditiis optio sit voluptatum amet aperiam voluptatem incidunt! Provident, deserunt, vel adipisci veniam cum non aliquam sint cupiditate repudiandae molestias magnam nesciunt dignissimos facilis id delectus qui quis et a minima animi illum blanditiis fuga recusandae nostrum incidunt labore ipsum veritatis error modi expedita asperiores sequi perspiciatis assumenda. Officiis, libero, aliquam, alias nostrum incidunt facere deserunt pariatur consequuntur praesentium mollitia officia quis error eveniet dolor perferendis tempora ex delectus impedit quam debitis dolores maiores quisquam minima nemo natus iusto amet reiciendis est rerum porro sapiente itaque animi quos? Quibusdam consequatur molestias porro quae provident vel saepe laborum? Non, sequi, voluptate, vel sunt iure earum rerum laborum aut beatae eos sit est. Commodi, quisquam, voluptate, sed excepturi ut tempore laboriosam et aperiam cupiditate provident nam dolore asperiores molestiae perspiciatis ipsa ab at voluptates modi laudantium nulla qui expedita sit reprehenderit iure ad voluptatem eligendi illum. Quia, suscipit id qui magnam rerum consequatur optio voluptatum possimus nulla consequuntur! Magni, tenetur, necessitatibus, possimus, a nesciunt quisquam iusto exercitationem dicta itaque perspiciatis adipisci nihil deleniti tempore nisi vero. Ab, voluptas, aliquam placeat nemo debitis corporis pariatur provident nisi praesentium saepe similique deserunt fuga modi rem sunt cum sit temporibus laudantium vitae ratione voluptates molestiae delectus iste illo labore exercitationem fugiat a officiis ex. Aperiam, quas enim odit suscipit at quaerat itaque animi id quisquam reiciendis praesentium quidem amet fuga ab ratione aliquid repellendus earum error! Et, aut optio necessitatibus nulla ex dignissimos in debitis quod distinctio voluptatibus tempore vero consequuntur consectetur quisquam excepturi nam provident odio eum voluptatum harum iste quam quas quo nisi repudiandae porro libero quae at exercitationem beatae esse perspiciatis animi eveniet nesciunt quibusdam velit assumenda? Natus, odio dolorum voluptatibus ipsa dolore tenetur in sequi obcaecati nesciunt expedita vitae animi aliquid itaque perspiciatis dignissimos illum blanditiis eaque fugiat odit repellendus qui quod vel et architecto dicta. Possimus, provident, eius velit ullam veritatis labore error et numquam quo officiis autem quas corporis atque delectus odit! Atque, fugit, earum, sit minus aperiam facere veritatis sed tempora rem quaerat magnam esse veniam quis deleniti dolores ipsam at necessitatibus voluptatibus incidunt voluptatem fugiat blanditiis nobis unde recusandae placeat quia obcaecati assumenda qui itaque repudiandae ex molestias eveniet optio inventore praesentium nulla mollitia!</p>
			</div>

			<div class="tab-pane active" id="notas">
				<?php // Carga el bloque de las tablas para configurar y calificar
				$this->load->view('profesor/includes/notas') ?>
			</div>
		</div>
	</div>
</div>