var express = require('express'),
 	app = express(),
 	mysql = require('mysql'),
 	routes = require('./routes/routes')
 	cors = require('cors'),
 	port = 3000;

var pool = mysql.createPool({
	connectionLimit:100, host:'localhost', user:'root', password:'12345', database: 'lasd3', multipleStatements: true
});

var http = require('http').Server(app);

app.use(cors());
app.use(express.static(__dirname + '/app'));
app.use('/old', express.static(__dirname + '/app_old'));
app.use('/bower_components', express.static(__dirname + '/bower_components'));

routes(app, pool);

http.listen(port, function(){
	console.log('Listen on Port ' + port);
});