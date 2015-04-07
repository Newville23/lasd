angular.module('SerFlugel', ['ngResource'])

.factory('Docente',['$resource', function ContenidoFactory($resource){
	return {
		contenido : $resource('http://localhost:3000/0.0.1/docente/contenido.json', {}, { update: {method: 'PUT'}
		}),
		calificaciones: $resource('http://localhost:3000/0.0.1/docente/calificaciones.json', {}, { update: {method: 'PUT'}
		}),
		notas: $resource('http://localhost:3000/0.0.1/docente/notas.json', {}, { update: {method: 'PUT'}
		})
	}
}])

.controller('testCotroller', ['$scope', 'Docente', function ($scope, Docente) {
	
	// Datos GET 
	var query = {idclase: '13775731636734635'};
	Docente.contenido.query(query, function(data){
		console.log(data);
	}, function(data){
		// Error
		console.log(data);
	});

	// // // Datos POST 
	// var datos = {
 //        "idclase": "13775731636734635",
 //        "contenido": "geodésica geodésica.",
 //        "periodo": "1",
 //        "fechavencimiento": "2015-05-12"
 //    };
 //    Docente.contenido.save(datos, function(data){
 //    	console.log(data);
 //    });

 //    // Datos PUT
 //    var datosUp = {
 //        "contenido": "es plana sino curva, geodésica (actualizacion 3)."
 //    };
    
 //    var contenido = new Docente.contenido(datosUp);
 //    contenido.$update({idcontenido: 4}, function(data){
 //    	console.log(data);
 //    });

		var query = {idclase: '13775731636734635', idindicador: '35', idcalificacion: '13996916046293832'};
	Docente.notas.query(query, function(data){
		console.log(data);
	}, function(data){
		// Error
		console.log(data);
	});
	
}]);