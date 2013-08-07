<div class="container-fluid" style="margin-top: 5%;">

	<div class="row-fluid">
		
		<div class="span4 offset1 well bloque" id="menu">
			<div class="row-fluid">

				<div class="span6 well fontSize2">

					<div class="row-fluid">
						<div class="span12 Matbar Matbar-selected" id="">
							<div class="notificacion">3</div>
							<div>Materias</div>
						</div>
					</div>

					<div class="row-fluid">
						<div class="span12 Matbar" id="">Profesores</div>
					</div>

					<div class="row-fluid">
						<div class="span12 Matbar" id="">
							<div class="notificacion">32</div>
							Mensajes
						</div>
					</div>

					<div class="row-fluid">
						<div class="span12 Matbar" id="">Horario</div>
					</div>

				</div>

				<div class="span6 well" id="materias2">

					<div class="row-fluid text-center">
						<?php foreach ($clase as $value): ?>
						<a href="<?php echo site_url("estudiante/materia/" . $value['numero']); ?>"
							 class="Matbar <?php if ($value['numero'] == $numeroClase) echo "Matbar-selected"; ?>">
							<p><?php echo $value['materia']; ?></p>
						</a>
						<?php endforeach; ?>

					</div>
				</div>
			</div>
		</div>

		<div class="span6 well-margin-botton">
			<div class="row-fluid bloquePegadoUp">
				<div class="">
					<div class="media">
						<a class="pull-left" href="#">
					   		<img class="media-object img-polaroid" data-src="holder.js/64x64" alt="64x64" style="width: 40px; height: 40px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACZ0lEQVR4Xu2Y3YupURTGHyMSEimfUS4MIheSKDf+efksH0W4QKLIx43PZJxZq5xmOs2Z037PTBNr33gbe693r2c9e/3M1q3X6yseeOhEAHGAHAHpAQ/cAyFNUCggFBAKCAWEAg+sgGBQMCgYFAwKBh8YAvLPkGBQMCgYFAwKBgWDD6yAYFArBlerFfr9Pg6HA6xWKxKJBMxm8ztP1et1bDYbxONxeL3eT/32FTE/eqkmB5xOJxSLRTgcDvj9fvR6PX6mRG9jPB5jNBrhfD7/kwBfEfNvimsSYDqdotvtIpvNcvWv1yt0Ot3v9+12O1SrVYTDYZ53cwCJMhgMkEqlWLBarcYCZTIZzOdzpZif2uqDCZoEoCQomUAggMViAaPRiEgkArvdzmJQYpSgx+NBqVR654BGo4Htdgufz8cOSafTsNlsLIxqTBUR/osAoVAITqcTnU4HLy8vyOfzGA6HXE2q6n6//0MAqni5XMbxeMTz8zOCwSDv/yaASsxvF2AymfC5z+VysFgs/Ex/KxQKqFQqnPjtSJAw9EzJkmPoO5pzuVy4f0SjUd6/lpjfLgBVj5qg2+1mK5MDnp6eWBCiAiVNg5JtNpvcC2ieXq/n3kBzqfLtdhvJZBIul4sdoRLTYDCo5K/9PmC5XLJtaePUCGOxGH++HXTW3/YAcspsNuPjQc5ptVp4xTE3U5PJBJWYStm/LtLUA1Rf+pPWiQBafwn+pGqq7EUcIA6QKzG5EpMrMZXueS9rhAJCAaGAUEAocC8dXSUPoYBQQCggFBAKqHTPe1kjFBAKCAWEAkKBe+noKnk8PAV+AdqfV5+BvqppAAAAAElFTkSuQmCC">
						</a>
						<div class="media-body">
					   		<h4 class="media-heading text-success"><?php echo $ProfesorFromClase['nombre']; //nombre profesor ?></h4>
					   		<p>Docente.</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row-fluid bloquePegadoDown">
				<div class="tabbable">

					<ul class="nav nav-tabs">
					 	<li class=""><a href="#contenido" data-toggle="tab">Contenido</a></li>
						<li class="active"><a href="#foro" data-toggle="tab">Foro</a></li>
						<li class=""><a href="#trabajos" data-toggle="tab">Trabajos</a></li>
						<li class=""><a href="#notas" data-toggle="tab">Notas</a></li>
					</ul>

					<div class="tab-content">
						<div class="tab-pane" id="contenido">
							<p>Seccion numero 1
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit, consequatur, rerum laboriosam voluptatibus quasi non provident repudiandae accusantium odit eligendi architecto tempora fuga explicabo officiis vel corporis assumenda ipsa nihil exercitationem dolorem veritatis quidem debitis enim suscipit quisquam libero quos eum mollitia et dolorum quia corrupti dicta soluta magni consequuntur aperiam adipisci reprehenderit! Ipsam sed qui accusantium vel esse dolore explicabo architecto eos in facilis. Perspiciatis, enim sunt eius iure maiores ipsum laudantium corrupti quibusdam minus. Odit, voluptate, eos, tempora eveniet explicabo rem quo tenetur delectus officia maiores asperiores quam iusto pariatur ipsum ducimus qui labore doloribus dolore nulla inventore.
							</p>
						</div>
						<div class="tab-pane active" id="foro">
							<div class="well">

								<?php echo validation_errors(); ?>
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

								<ul class="unstyled">

									<?php foreach ($foros as $key => $value): ?>
									<li>
										<div class="media well well-white well2">
									  		<a class="pull-left" href="#">
									    		<img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 40px; height: 40px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACZ0lEQVR4Xu2Y3YupURTGHyMSEimfUS4MIheSKDf+efksH0W4QKLIx43PZJxZq5xmOs2Z037PTBNr33gbe693r2c9e/3M1q3X6yseeOhEAHGAHAHpAQ/cAyFNUCggFBAKCAWEAg+sgGBQMCgYFAwKBh8YAvLPkGBQMCgYFAwKBgWDD6yAYFArBlerFfr9Pg6HA6xWKxKJBMxm8ztP1et1bDYbxONxeL3eT/32FTE/eqkmB5xOJxSLRTgcDvj9fvR6PX6mRG9jPB5jNBrhfD7/kwBfEfNvimsSYDqdotvtIpvNcvWv1yt0Ot3v9+12O1SrVYTDYZ53cwCJMhgMkEqlWLBarcYCZTIZzOdzpZif2uqDCZoEoCQomUAggMViAaPRiEgkArvdzmJQYpSgx+NBqVR654BGo4Htdgufz8cOSafTsNlsLIxqTBUR/osAoVAITqcTnU4HLy8vyOfzGA6HXE2q6n6//0MAqni5XMbxeMTz8zOCwSDv/yaASsxvF2AymfC5z+VysFgs/Ex/KxQKqFQqnPjtSJAw9EzJkmPoO5pzuVy4f0SjUd6/lpjfLgBVj5qg2+1mK5MDnp6eWBCiAiVNg5JtNpvcC2ieXq/n3kBzqfLtdhvJZBIul4sdoRLTYDCo5K/9PmC5XLJtaePUCGOxGH++HXTW3/YAcspsNuPjQc5ptVp4xTE3U5PJBJWYStm/LtLUA1Rf+pPWiQBafwn+pGqq7EUcIA6QKzG5EpMrMZXueS9rhAJCAaGAUEAocC8dXSUPoYBQQCggFBAKqHTPe1kjFBAKCAWEAkKBe+noKnk8PAV+AdqfV5+BvqppAAAAAElFTkSuQmCC">
									  		</a>
									  		<div class="media-body">
									    		<h5 class="media-heading text-info">
									    			<a href="<?php echo site_url('estudiante/foro/' . $value['Materia_id'] . '/' . $numeroClase . '/' . $value['id_time']); ?>" title="" 
									    			data-target="#<?php echo $value['id_time']; ?>" data-toggle="modal"><?php echo $value['titulo']; ?></a>
									    		</h5>
									    		<p>
									    			<span class="voto"><?php echo $value['puntos']; ?></span> 
									    			<span class=""><i class="icon-thumbs-up-alt icon-large muted"></i></span>
									    			<span class="inforo"> hace 2 días por <a href="#">Juanita</a></span>
									    		</p>
									  		</div>
										</div>
									</li>
									<?php endforeach; ?>

								</ul>
							</div>
						</div>
						<div class="tab-pane" id="trabajos">
							<p>Lorem ipsum dolor sit ametusamus saepe a explicabo voluptas soluta aliquam enim dolorem qui ab quis neque consequatur cum nihil earum rerum fugiat molestias itaque temporibus. Dolores, sapiente, quibusdam, consectetur veniam sequi aut atque amet laboriosam nulla illum tempora corrupti tenetur optio velit aliquid. Libero, animi, sed, ipsa quam minus reiciendis perferendis fugiat consequatur aliquid qui asperiores iusto saepe eum cum id pariatur quod itaque sunt praesentium nemo nisi blanditiis optio sit voluptatum amet aperiam voluptatem incidunt! Provident, deserunt, vel adipisci veniam cum non aliquam sint cupiditate repudiandae molestias magnam nesciunt dignissimos facilis id delectus qui quis et a minima animi illum blanditiis fuga recusandae nostrum incidunt labore ipsum veritatis error modi expedita asperiores sequi perspiciatis assumenda. Officiis, libero, aliquam, alias nostrum incidunt facere deserunt pariatur consequuntur praesentium mollitia officia quis error eveniet dolor perferendis tempora ex delectus impedit quam debitis dolores maiores quisquam minima nemo natus iusto amet reiciendis est rerum porro sapiente itaque animi quos? Quibusdam consequatur molestias porro quae provident vel saepe laborum? Non, sequi, voluptate, vel sunt iure earum rerum laborum aut beatae eos sit est. Commodi, quisquam, voluptate, sed excepturi ut tempore laboriosam et aperiam cupiditate provident nam dolore asperiores molestiae perspiciatis ipsa ab at voluptates modi laudantium nulla qui expedita sit reprehenderit iure ad voluptatem eligendi illum. Quia, suscipit id qui magnam rerum consequatur optio voluptatum possimus nulla consequuntur! Magni, tenetur, necessitatibus, possimus, a nesciunt quisquam iusto exercitationem dicta itaque perspiciatis adipisci nihil deleniti tempore nisi vero. Ab, voluptas, aliquam placeat nemo debitis corporis pariatur provident nisi praesentium saepe similique deserunt fuga modi rem sunt cum sit temporibus laudantium vitae ratione voluptates molestiae delectus iste illo labore exercitationem fugiat a officiis ex. Aperiam, quas enim odit suscipit at quaerat itaque animi id quisquam reiciendis praesentium quidem amet fuga ab ratione aliquid repellendus earum error! Et, aut optio necessitatibus nulla ex dignissimos in debitis quod distinctio voluptatibus tempore vero consequuntur consectetur quisquam excepturi nam provident odio eum voluptatum harum iste quam quas quo nisi repudiandae porro libero quae at exercitationem beatae esse perspiciatis animi eveniet nesciunt quibusdam velit assumenda? Natus, odio dolorum voluptatibus ipsa dolore tenetur in sequi obcaecati nesciunt expedita vitae animi aliquid itaque perspiciatis dignissimos illum blanditiis eaque fugiat odit repellendus qui quod vel et architecto dicta. Possimus, provident, eius velit ullam veritatis labore error et numquam quo officiis autem quas corporis atque delectus odit! Atque, fugit, earum, sit minus aperiam facere veritatis sed tempora rem quaerat magnam esse veniam quis deleniti dolores ipsam at necessitatibus voluptatibus incidunt voluptatem fugiat blanditiis nobis unde recusandae placeat quia obcaecati assumenda qui itaque repudiandae ex molestias eveniet optio inventore praesentium nulla mollitia!</p>
						</div>
						<div class="tab-pane" id="notas">
							<p>Seccion numero 4</p>
						</div>
					</div>

				</div>
			</div>

		</div>

	</div>
</div>


<!-- --------------------------------------  Modal del foro  --------------------------------------------------- -->
		<?php foreach ($foros as $key => $value): ?>
		<div id="<?php echo $value['id_time']; ?>" class="modal modal-correccion hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				  <button type="button" class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i> </button>
				  <!-- <h5 class="muted">Foro de discución de la materia</h5> -->
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer">
				  <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				  <button class="btn btn-primary">Editar</button>
			</div>
		</div>
		<?php endforeach; ?>