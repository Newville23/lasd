var express = require('express');
var mysql = require('mysql');
var underscore = require('underscore');

var rutasLogin = express.Router();

//----------------------------------------------
var pool = mysql.createPool({
	connectionLimit : 100,
	host     : 'localhost',
	user     : 'root',
	password : '12345',
	multipleStatements: true
});
//----------------------------------------------

rutasLogin.route('/')
.get(function(req, res){
	getContenido (req, res);
});

//Obtiene los datos del contenido y calificaciones por el id de la clase
function getContenido (req, res) {
	
	var Clase_numero = mysql.escape(req.query.clasenumero);
	var data = {};
	
	if (Clase_numero && Clase_numero != 'NULL') {

		var contenidoIndicadoresQuery = "SELECT id AS id_indicador, CAST(Clase_numero AS CHAR) Clase_numero, contenido, periodo, estado, " +
		"fecha_vencimiento, datetime_creacion, datetime_modificacion " +
		"FROM lasd3.Clase_indicador WHERE Clase_numero = " + Clase_numero;

		var Calificaciones = "SELECT * FROM lasd3.Calificacion WHERE Clase_numero = " + Clase_numero;
		var query = contenidoIndicadoresQuery + ';' + Calificaciones;

		pool.query(query, function(err, rows, fields) {
			if (err){res.status(400).json({error: '500'});return;}
			data.contenido = rows[0];
			data.calificaciones = rows[1];
			res.json(data);
		});
	}else{
		res.status(400).json({status: '400'});
	}
}

module.exports = rutasLogin;