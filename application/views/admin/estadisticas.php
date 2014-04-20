<div class="container" style="margin-top: 5%;">
	<div class="row">
		
		<?php $this->load->view('admin/includes/menu-admin'); ?>

		<div class="col-md-10 col-md-offset-2" style="margin-top: 2%;">
           
				<div class="" style="border-radius: 5px">

					<div class="row">
						<div class="col-md-4 col-sm-4">
							<form class="">
                                <div class="input-group input-group-lg">
                                    <input type="search" class="form-control" placeholder="Buscar colegios">
                                    <span class="btn disabled input-group-addon"><i class="fa fa-search"></i></span>
                                </div>
                            </form>
						</div>
						<div class="col-md-4 col-sm-4">
                            <form class="">
    							<div class="form-group input-group-lg">
                                    <select name="tipo_identificacion" required id="" class="form-control" >
                                        <option value="Esta semana">Esta semana</option>
                                        <option value="La semana Pasada">La semana Pasada</option>
                                        <option value="Este mes">Este mes</option>
                                        <option value="El mes pasado">El mes pasado</option>
                                        <option value="Este trimestre">Este trimestre</option>
                                        <option value="Trimestre pasado">Trimestre pasado</option>
                                        <option value="Este año">Este año</option>
                                        <option value="El año pasado">El año pasado</option>
                                        <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
                                    </select>
                                </div>
                            </form>
						</div>

                        <div class="col-md-4 col-sm-4 hidden-xs" style="font-size: 0.15em;">
                            <div class="input-daterange input-group input-group-lg" id="datepicker">
                                <input type="text" class="input-sm form-control" name="start" />
                                <span class="input-group-addon">-</span>
                                <input type="text" class="input-sm form-control" name="end" />
                            </div>
                            <script>
                                $('.input-daterange').datepicker({
                                    format: "yyyy-mm-dd",
                                    todayBtn: "linked",
                                    language: "es",
                                    autoclose: true,
                                    todayHighlight: true
                                });
                            </script>
                            
                        </div>
					</div>
                    
                    <div class="row bloquePegadoDown" style="border-radius: 4px; margin-bottom: 12px;">
                        <div class="col-md-3 col-xs-3 bloque-left">
                            <div class="targeta-fecha">
                                <div>Promedio</div>
                                <div class="fontSize5">3.7</div>
                                <small class="text-danger">10% <span class="glyphicon glyphicon-arrow-down"></span></small>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-3 bloque-left">
                            <div class="targeta-fecha">
                                <div>lorem</div>
                                <div class="fontSize5">1400</div>
                                <small class="text-danger">10% <span class="glyphicon glyphicon-arrow-down"></span></small>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-3 bloque-left">
                            <div class="targeta-fecha">
                                <div>lorem</div>
                                <div class="fontSize5">1400</div>
                                <small class="text-success">10% <span class="glyphicon glyphicon-arrow-up"></span></small>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-3 bloque-left">
                            <div class="targeta-fecha">
                                <div>lorem</div>
                                <div class="fontSize5">1400</div>
                                <small class="text-danger">10% <span class="glyphicon glyphicon-arrow-down"></span></small>
                            </div>
                        </div>
                    </div>

					<div class="row bloquePegadoDown" style="border-radius: 6px">
						<div class="col-md-3">
							
							<ul class="nav nav-pills nav-stacked">
							  <li class=""><a href="#notas" data-toggle="tab">Notas</a></li>
							  <li class=""><a href="#ProgresoClases" data-toggle="tab">Progreso clases</a></li>
							  <li class="active"><a href="#Inasistencias" data-toggle="tab">Inasistencias</a></li>
							  <li class=""><a href="#settings" data-toggle="tab">Recursos</a></li>
							</ul>
						</div>

						<div class="col-md-9">
							<!-- Tab panes -->
							<div class="tab-content">
							  <div class="tab-pane" id="notas">
							  		<div id="containerMaterias" style="min-width: 50%; height: 400px; margin: 0 auto"></div>
							  		<div class="alert alert-info fontSize1" style="padding: 10px;">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>¡Ayuda!:</strong> Mide las notas de los estudiantes por:
                                    </div>
                                    <div class="btn-group btn-group-justified">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default col-xs-6">Colegios</button>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default col-xs-6">Grados</button>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default col-xs-6">Materia</button>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default col-xs-6">Area</button>
                                        </div>
                                    </div>
                              </div>
							  <div class="tab-pane" id="ProgresoClases">
									<div id="containerhome" style="min-width: 50%; height: 400px; margin: 0 auto"></div>
							  		
                                    <div class="alert alert-info fontSize1" style="padding: 10px;">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>¡Ayuda!:</strong> Mide Progreso del contenido por:
                                    </div>

							         <div class="btn-group btn-group-justified">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">Colegios</button>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">Grados</button>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">Materia</button>
                                        </div>
                                    </div>
                              </div>
							  <div class="tab-pane active" id="Inasistencias">
									<div id="containerInasistencias" style="min-width: 50%; height: 400px; margin: 0 auto"></div>
									
                                    <div class="alert alert-info fontSize1" style="padding: 10px;">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <strong>¡Ayuda!:</strong> Mide las Inasistencias por:
                                    </div>

                                    <div class="btn-group btn-group-justified">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default col-xs-6">Colegios</button>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default col-xs-6">Grados</button>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default col-xs-6">Materia</button>
                                        </div>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default col-xs-6">Area</button>
                                        </div>
                                    </div>
							  		
							  </div>
							  <div class="tab-pane" id="settings">
							  		COORDINADORES: Modulo estadístico para caracterizar salones, cursos, jornadas, por, tema, materia, área, mes, periodo, semestre y año. Identificar tendencias académicas negativas.
							  </div>
							</div>
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

<script>
$(function () {
    $('#containerInasistencias').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Porcentaje Ausentismo Grado 8'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: [
                'Ene',
                'Feb',
                'Mar',
                'Abr',
                'May',
                'Jun',
                'Jul',
                'Ago'
            ]
        },
        yAxis: {
            min: 0,
            title: {
                text: '% de Inasistencias'
            },
            max:100
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color} %;padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: '8A',
            data: [91.24, 89.56, 84.67, 75.7, 74.4, 78.49, 88.50, 93.48]
        },{
            name: '8B',
            data: [83.6, 78.8, 98.5, 93.4, 96.0, 84.5, 95.0, 94.3]
        },{
            name: '8C',
            data: [78.9, 68.8, 69.3, 71.4, 87.0, 88.3, 89.0, 79.6]

        }]
    });
});

$(function () {
        $('#containerMaterias').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Promedio por materias'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [
                    'Matematicas',
                    'Sociales',
                    'Biologia',
                    'Fisica',
                    'Quimica',
                    'Español',
                    'Economia',
                    'Etica',
               ]
            },
            yAxis: {
                min: 0,
                max: 5,
                title: {
                    text: 'Promedio'
                }
            },
            tooltip: {
                    valueSuffix: ''
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Materia',
                data: [3.9, 4.8, 3.3, 3.0, 2.8, 4.3, 5.0, 4.6]
    
            }]
        });
    });

	$(function () {
        $('#containerhome').highcharts({
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Monthly Average Temperature'
            },
            subtitle: {
                text: 'Source: WorldClimate.com'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Temperature'
                },
                labels: {
                    formatter: function() {
                        return this.value +'°'
                    }
                }
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                name: 'Tokyo',
                marker: {
                    symbol: 'square'
                },
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, {
                    y: 26.5,
                    marker: {
                        symbol: 'url(http://www.highcharts.com/demo/gfx/sun.png)'
                    }
                }, 23.3, 18.3, 13.9, 9.6]
    
            }, {
                name: 'London',
                marker: {
                    symbol: 'diamond'
                },
                data: [{
                    y: 3.9,
                    marker: {
                        symbol: 'url(http://www.highcharts.com/demo/gfx/snow.png)'
                    }
                }, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
            }]
        });
    });
    

    

</script>