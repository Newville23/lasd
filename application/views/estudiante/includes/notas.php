			<table class="table table-hover table-striped table-bordered">	
				<thead>
					<tr>
						<th>Fecha</th>
						<th>Tipo de evaluación</th>
						<th>Detalle</th>
						<th>Peso</th>
						<th>Nota</th>
					</tr>
				</thead>
				<tbody>

					<?php foreach ($notas as $key => $value): ?>
					<tr>
						<td></td>
						<td><?php echo $value['tipo_evaluacion']; ?></td>
						<td><?php echo $value['concepto']; ?></td>
						<td><?php echo $value['ponderacion']; ?>%</td>
						<td><?php echo $value['nota']; ?></td>
					</tr>
					<?php endforeach; ?>

				</tbody>
			</table>

			<?php if (!empty($notas)): ?>
			<canvas id="myChart" width="600" height="400"></canvas>
			<script>

				$( document ).ready(function() {
				    //Get context with jQuery - using jQuery's .get() method.
					var ctx = $("#myChart").get(0).getContext("2d");
					//This will get the first returned node in the jQuery collection.
					var myNewChart = new Chart(ctx);					

					var data = {
						labels : ["Nota1","Nota2","nota3","nota4"],
						datasets : [
							{
								fillColor : "rgba(151,187,205,0.5)",
								strokeColor : "rgba(151,187,205,1)",
								data : [
										<?php 
											foreach ($notas as $value) {
												echo $value['nota'] . ',';
											}
										 ?>
								 		0]
								// data : [2,4.4,3.1,5,0]
							}
						]
					}
					var options = {
						barShowStroke : true,
						barValueSpacing : 10,
						barDatasetSpacing : 30
					}

					new Chart(ctx).Bar(data, options);
				});

			</script>
			<?php endif; ?>