var moment = require('moment');

module.exports = function(app, pool) {

	var contenido = new Contenido(pool);
	
	app.get('/docente/contenido.json', contenido.getContenido);
	app.get('/docente/notas.json', contenido.getNotas);

	app.get('/docente/estudiante.json', contenido.getEstudiantes);
	//app.get('docente/listaEstudiantes.json', contenido.getListaEstudiantes);
}

function Contenido (pool) {
	// Devuelve los datos de indicadores de logros y las calificaciones de los estudiantes, de una clase especifica.
	this.getContenido = function(req, res) {
		"use strict";

		//var Clase_numero = pool.escape(req.query.clasenumero);
		var id_clase = req.query.idclase ? pool.escape(req.query.idclase) : null;
		var data = {};
		
		if (id_clase) {

			var contenidoIndicadoresQuery = "SELECT id AS id_indicador, CAST(Clase_numero AS CHAR) id_clase, contenido, periodo, estado, " +
			"fecha_vencimiento, datetime_creacion, datetime_modificacion " +
			"FROM lasd3.Clase_indicador WHERE Clase_numero = " + id_clase;

			var Calificaciones = "SELECT CAST(id AS CHAR) as id_calificacion, id_indicador, tipo_evaluacion, " + 
			"concepto, ponderacion, CAST(Clase_numero AS CHAR) id_clase, Clase_Materia_id, datetime_creacion " + 
			"FROM lasd3.Calificacion WHERE Clase_numero = " + id_clase;
			var query = contenidoIndicadoresQuery + ';' + Calificaciones;

			pool.query(query, function(err, rows, fields) {
				
				if (err){
					return res.status(500).json({error: '500'});
				}else if(rows[0].length == 0){
					return res.status(404).json({error: '404'});
				}

				data.contenido = rows[0];
				data.calificaciones = rows[1];
				return res.json(data);
			});
		}else{
			return res.status(400).json({status: '400'});
		}
	}

	// Devuelve los datos de las notas de los estudiantes dada una id de una clase o un id de indicador.
	this.getNotas = function (req, res) {
		"use strict";

		var id_clase = req.query.idclase ? 'AND Calificacion.Clase_numero = ' + pool.escape(req.query.idclase) : '';
		var id_indicador = req.query.idindicador ? 'AND Clase_indicador.id = ' + pool.escape(req.query.idindicador) : '';
		var id_estudiante = req.query.idestudiante ? 'AND Estudiante.identificacion = ' + pool.escape(req.query.idestudiante) : '';

		var notasQuery = "SELECT CAST(Calificacion.Clase_numero AS CHAR) id_clase , CAST(Calificacion_id AS CHAR) id_Calificacion, Clase_indicador.id as id_indicador, " +
						"identificacion as id_estudiante, periodo, nota, tipo_evaluacion, " +
						"concepto, ponderacion FROM lasd3.Calificacion " +
							"join lasd3.Agregar_notas " +
							"on Agregar_notas.Calificacion_id = Calificacion.id " +
							"join lasd3.Estudiante " +
							"on Estudiante.identificacion = Agregar_notas.Estudiante_identificacion " +
							"join lasd3.Clase_indicador " +
							"on Calificacion.id_indicador = Clase_indicador.id " +
						"WHERE 1 ";

		if (id_clase || id_indicador || id_estudiante) {
			var where = id_clase + ' ' + id_indicador + ' ' + id_estudiante;
			var query = notasQuery + where;

			pool.query(query, function(err, rows, fields) {
				if (err){
					return res.status(500).json({error: '500'});
				}else if(rows.length == 0){
					return res.status(404).json({error: '404'});
				}
				return res.json(rows);
			});

		}else{
			return res.status(400).json({status: '400'});
		}	
	}

	//Devuelve la lista de los estudiantes con los datos, además de la asistencia, 
	//dada la id de la clase y la fecha. Si no se especifica la fecha, se toma la actual.
	this.getEstudiantes = function (req, res) {
		"use strict";

		var id_clase = req.query.idclase ? pool.escape(req.query.idclase) : null;
		var fecha = req.query.fecha ? pool.escape(req.query.fecha) : pool.escape(moment().format('YYYY-MM-DD'));

		var query = "SELECT CAST(Clase_numero AS CHAR) AS id_clase, Materia_id AS id_materia, Profesor_identificacion AS id_profesor, " +
							"Clase.Curso_codigo AS id_curso, Estudiante.tipo_identificacion, " +
							"Matricula.Estudiante_identificacion AS id_estudiante, nombre, apellido, " +
					        "fecha_nacimiento, tipo_sangre, " +
					        "Asistencia.id AS id_asistencia, Asistencia AS asistencia, datetime_creacion, Observacion as observacion " +
					    "FROM lasd3.Clase " +
					    "JOIN lasd3.Matricula " +
					        "ON Clase.Curso_codigo = Matricula.Curso_codigo " +
					    "LEFT JOIN lasd3.Asistencia " +
					        "ON Asistencia.Clase_numero = Clase.numero AND Matricula.Estudiante_identificacion = Asistencia.Estudiante_identificacion " +
					            "AND cast(fecha AS date) = " + fecha + " " +
					    "JOIN  lasd3.Estudiante " +
					        "ON Estudiante.identificacion = Matricula.Estudiante_identificacion " +
					    "JOIN lasd3.Usuario " +
					        "ON Usuario.id = Estudiante.Usuario_id " +
					"WHERE Clase.numero = " + id_clase + " ORDER BY nombre, apellido";
		
		if (id_clase) {
			pool.query(query, function(err, rows, fields) {
				if (err){
					return res.status(500).json({error: '500'});
				}else if(rows.length == 0){
					return res.status(404).json({error: '404'});
				}
				return res.json(rows);
			});
		}else{
			return res.status(400).json({status: '400'});
		}
	}

	this.getEstudiantesByCurso = function (req, res) {
		"use strict";
		
		var Curso_codigo = req.query.cursocodigo ? pool.escape(req.query.cursocodigo) : null;

		var query = "SELECT Estudiante_identificacion AS id_estudiante, tipo_identificacion, nombre, apellido, fecha_nacimiento, tipo_sangre FROM lasd3.Matricula " +
						"JOIN lasd3.Estudiante " +
						"ON Estudiante.identificacion = Matricula.Estudiante_identificacion " +
						"JOIN lasd3.Usuario " +
						"ON Usuario.id = Estudiante.Usuario_id " +
						"WHERE Curso_codigo = " + Curso_codigo;
		
		if (Curso_codigo) {
			pool.query(query, function(err, rows, fields) {
				if (err){
					return res.status(500).json({error: '500'});
				}else if(rows.length == 0){
					return res.status(404).json({error: '404'});
				}
				return res.json(rows);
			});
		}else{
			return res.status(400).json({status: '400'});
		}
	}
}