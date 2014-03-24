<div class="container container2">
	<div class="row" style="margin-left: 2px;">

		<div class="col-md-3 col-md-offset-1 fontSize3" id="menu">

			<?php $this->load->view('profesor/includes/menu'); ?>

		</div>

		<div class="col-md-6 col-md-offset-1" id="">

					<div class="row margen-bottom2">
							
							<a href="#">
								<div class="">
									<span>Progreso Notas</span>
									<div class="progress" style="height: 15px;">
										<div class="progress-bar progress-bar-warning" style="width: 40%;">
									    	<span class="sr-only">20% Complete (warning)</span>
									    </div>

										<div class="progress-bar progress-bar1" style="width: 15%">
											<span class="sr-only">20% Complete (warning)</span>
										</div>

										<div class="progress-bar progress-bar-success" style="width: 5%">
											<span class="sr-only">10% Complete (danger)</span>
										</div>
									</div>
								</div>
							</a>

							<a href="#">
								<div class="">
									<span>Progreso del Contenido</span>
									<div class="progress" style="height: 15px;">
										<div class="progress-bar progress-bar-danger" style="width: 30%;">
									    	<span class="sr-only">20% Complete (warning)</span>
									    </div>

										<div class="progress-bar progress-bar1" style="width: 20%">
											<span class="sr-only">20% Complete (warning)</span>
										</div>

										<div class="progress-bar progress-bar-success" style="width: 10%">
											<span class="sr-only">10% Complete (danger)</span>
										</div>
									</div>
								</div>
							</a>
							
							<a href="#">
								<div class="">
									<span>Asistencias a clase</span>
									<div class="progress" style="height: 15px;">

										<div class="progress-bar progress-bar1" style="width: 30%">
											<span class="sr-only">20% Complete (warning)</span>
										</div>

										<div class="progress-bar progress-bar-success" style="width: 10%">
											<span class="sr-only">10% Complete (danger)</span>
										</div>
									</div>
								</div>
							</a>
						</div>
			<div class="row">
				<?php foreach ($clase as $value): ?>
				<a class="Matbar2" href="<?php echo site_url("profesor/clase/" . $value['numero']); ?>">
					<p><strong><span class="fontSize3"><?php echo $value['nombre_curso'] .'º '. $value['indice']; ?></span></strong><br>
					  <small><?php echo $value['nombre']; ?></small>
					</p>
				</a>
				<?php endforeach; ?>
			</div>
		</div>

	</div>
</div>