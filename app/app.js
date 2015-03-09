var express = require('express');

var app = express();

var http = require('http').Server(app);

app.use(express.static(__dirname + '/app'));
app.use('/bower_components', express.static(__dirname + '/bower_components'));

var docenteContenido = require('./routes/docenteContenido');
app.use('/contenido', docenteContenido);

var port = 3000;
http.listen(port, function(){
	console.log('Listen on Port ' + port);
});