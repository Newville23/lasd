angular.module('SerFlugel', ['ngResource'])

.factory('Config', function () {
	return {
		version : "0.2.1",
		ip: location.hostname,
		port: location.port
	};
})
.factory('Docente',['$resource', 'Config', function ContenidoFactory($resource, Config){
	return {
		listaClases : $resource('http://' + Config.ip + ':' + Config.port + '/' +  Config.version + '/docente/listaclases.json'),
		contenido : $resource('http://' + Config.ip + ':' + Config.port + '/' +  Config.version + '/docente/contenido.json', {}, { update: {method: 'PUT'}}),
		calificaciones: $resource('http://' + Config.ip + ':' + Config.port + '/' +  Config.version + '/docente/calificaciones.json', {}, { update: {method: 'PUT'}}),
		notas: $resource('http://' + Config.ip + ':' + Config.port + '/' + Config.version +'/docente/notas.json', {}, { update: {method: 'PUT'}}),
		estudiantes: $resource('http://' + Config.ip + ':' + Config.port + '/' + Config.version +'/docente/estudiante.json', {}, { update: {method: 'PUT'}}),
		asistencia: $resource('http://' + Config.ip + ':' + Config.port + '/' + Config.version + '/docente/asistencia.json')
	}
}])
.factory('Usuario',['$resource', 'Config', function ContenidoFactory($resource, Config){
	return {
		login : $resource('http://' + Config.ip + ':' + Config.port + '/' +  Config.version + '/usuario/login.json'),
		logout : $resource('http://' + Config.ip + ':' + Config.port + '/' +  Config.version + '/usuario/logout.json')
	}
}])
.factory('Coordinador',['$resource', 'Config', function ContenidoFactory($resource, Config){
	return {
		estudiantes : $resource('http://' + Config.ip + ':' + Config.port + '/' +  Config.version + '/coordinador/estudiante.json')
	}
}])

.controller('testCotroller', ['$scope', 'Docente', function ($scope, Docente) {

	// Datos GET
	var query = {idclase: '13775731636734635'};
	Docente.contenido.query(query, function(data){
		console.log(data);
	}, function(data){
		console.log(data); // Error
	});

	var query = {idclase: '13775731636734635', idindicador: '35', idcalificacion: '13996916046293832'};
	Docente.notas.query(query, function(data){
		console.log(data);
	}, function(data){
		// Error
		console.log(data);
	});

}]);
