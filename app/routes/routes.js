module.exports = function(app, pool) {

	var contenido = new Contenido(pool);
	
	app.get('/contenido.json', contenido.getContenido);
}

function Contenido (pool) {
	//Obtiene los datos del contenido y calificaciones por el id de la clase
	this.getContenido = function(req, res) {
		"use strict";

		var Clase_numero = pool.escape(req.query.clasenumero);
		var data = {};
		
		if (Clase_numero && Clase_numero != 'NULL') {

			var contenidoIndicadoresQuery = "SELECT id AS id_indicador, CAST(Clase_numero AS CHAR) Clase_numero, contenido, periodo, estado, " +
			"fecha_vencimiento, datetime_creacion, datetime_modificacion " +
			"FROM lasd3.Clase_indicador WHERE Clase_numero = " + Clase_numero;

			var Calificaciones = "SELECT CAST(id AS CHAR) as id_calificacion, id_indicador, tipo_evaluacion, " + 
			"concepto, ponderacion, Clase_numero, Clase_Materia_id, datetime_creacion " + 
			"FROM lasd3.Calificacion WHERE Clase_numero = " + Clase_numero;
			var query = contenidoIndicadoresQuery + ';' + Calificaciones;

			pool.query(query, function(err, rows, fields) {
				if (err){return res.status(400).json({error: '500'});}
				data.contenido = rows[0];
				data.calificaciones = rows[1];
				return res.json(data);
			});
		}else{
			return res.status(400).json({status: '400'});
		}
	}
}