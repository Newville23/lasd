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
					<tr>
						<td></td>
						<td>cuerpo</td>
						<td>Lorem ipsum dolor sit amet, conndi officiis cum ea velit veniam explicabo aut labore necessitatibus nam debitis laudantium!</td>
						<td>33%</td>
						<td>4</td>
					</tr>
					<tr>
						<td></td>
						<td>cuerpo</td>
						<td>cuerpo</td>
						<td>33%</td>
						<td>4</td>
					</tr>
					<tr>
						<td></td>
						<td>Lorem ipsum enda? Cupiditate, earum?</td>
						<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, dignissimos magni distinctio animi sit!</td>
						<td>33%</td>
						<td>4</td>
					</tr>
				</tbody>
			</table>

			<canvas id="myChart" width="600" height="400"></canvas>
			<script>

				$( document ).ready(function() {
				    //Get context with jQuery - using jQuery's .get() method.
					var ctx = $("#myChart").get(0).getContext("2d");
					//This will get the first returned node in the jQuery collection.
					var myNewChart = new Chart(ctx);					

					var data = {
						labels : ["January","February","March","April","May","June","July"],
						datasets : [
							{
								fillColor : "rgba(220,220,220,0.5)",
								strokeColor : "rgba(220,220,220,1)",
								pointColor : "rgba(220,220,220,1)",
								pointStrokeColor : "#fff",
								data : [65,59,90,81,56,55,40]
							},
							{
								fillColor : "rgba(151,187,205,0.5)",
								strokeColor : "rgba(151,187,205,1)",
								pointColor : "rgba(151,187,205,1)",
								pointStrokeColor : "#fff",
								data : [28,48,40,19,96,27,100]
							}
						]
					}

					new Chart(ctx).Line(data);
				});



			</script>