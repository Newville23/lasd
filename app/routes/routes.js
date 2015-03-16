module.exports = function(app, pool) {

	var contenido = new Contenido(pool);
	
	app.get('/docente/contenido.json', contenido.getContenido);
	app.get('/docente/notas.json', contenido.getNotas);

	app.get('/docente/estudiante.json', contenido.getEstudiantes);
	//app.get('docente/listaEstudiantes.json', contenido.getListaEstudiantes);
}

function Contenido (pool) {
	//Obtiene los datos del contenido y calificaciones por el id de la clase
	this.getContenido = function(req, res) {
		"use strict";

		//var Clase_numero = pool.escape(req.query.clasenumero);
		var Clase_numero = req.query.clasenumero ? pool.escape(req.query.clasenumero) : null;
		var data = {};
		
		if (Clase_numero) {

			var contenidoIndicadoresQuery = "SELECT id AS id_indicador, CAST(Clase_numero AS CHAR) Clase_numero, contenido, periodo, estado, " +
			"fecha_vencimiento, datetime_creacion, datetime_modificacion " +
			"FROM lasd3.Clase_indicador WHERE Clase_numero = " + Clase_numero;

			var Calificaciones = "SELECT CAST(id AS CHAR) as id_calificacion, id_indicador, tipo_evaluacion, " + 
			"concepto, ponderacion, Clase_numero, Clase_Materia_id, datetime_creacion " + 
			"FROM lasd3.Calificacion WHERE Clase_numero = " + Clase_numero;
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

	this.getNotas = function (req, res) {
		"use strict";

		var Clase_numero = req.query.clasenumero ? 'AND Calificacion.Clase_numero = ' + pool.escape(req.query.clasenumero) : '';
		var indicador_id = req.query.indicadorid ? 'AND Clase_indicador.id = ' + pool.escape(req.query.indicadorid) : '';
		var estudiante_id = req.query.estudianteid ? 'AND Estudiante.identificacion = ' + pool.escape(req.query.estudianteid) : '';

		var notasQuery = "SELECT CAST(Calificacion.Clase_numero AS CHAR) Clase_numero , CAST(Calificacion_id AS CHAR) Calificacion_id, Clase_indicador.id as indicador_id, " +
						"identificacion as estudiante_id, periodo, nota, tipo_evaluacion, " +
						"concepto, ponderacion FROM lasd3.Calificacion " +
							"join lasd3.Agregar_notas " +
							"on Agregar_notas.Calificacion_id = Calificacion.id " +
							"join lasd3.Estudiante " +
							"on Estudiante.identificacion = Agregar_notas.Estudiante_identificacion " +
							"join lasd3.Clase_indicador " +
							"on Calificacion.id_indicador = Clase_indicador.id " +
						"WHERE 1 ";

		if (Clase_numero || indicador_id || estudiante_id) {
			var where = Clase_numero + ' ' + indicador_id + ' ' + estudiante_id;
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

	this.getEstudiantes = function (req, res) {
		"use strict";
		
		var Curso_codigo = req.query.cursocodigo ? pool.escape(req.query.cursocodigo) : null;

		var query = "SELECT Estudiante_identificacion, tipo_identificacion, nombre, apellido, fecha_nacimiento, tipo_sangre FROM lasd3.Matricula " +
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