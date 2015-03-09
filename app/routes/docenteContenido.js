var express = require('express');
var mysql = require('mysql');

var rutasLogin = express.Router();

//----------------------------------------------
var pool = mysql.createPool({
	connectionLimit : 100,
	host     : 'localhost',
	user     : 'root',
	password : '12345'
});
//----------------------------------------------

rutasLogin.route('/')
.get(function(req, res){

	var Clase_numero = req.query.clasenumero;

	if (Clase_numero) {
		var querya = "select * from lasd3.Clase_indicador " +
			"where Clase_numero = " + Clase_numero + " " +
			"order by periodo, fecha_vencimiento, datetime_creacion";

		pool.query(querya, function(err, rows, fields) {
			if (err){res.status(400).json(err);return;}
			res.json(rows);
		});
	}else{
		res.status(400).json({status: '400'});
	}


});

module.exports = rutasLogin;