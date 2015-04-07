angular.module('SerFlugel', ['ngResource'])
.factory('Contenido',['$http', function ContenidoFactory($http){
	return {
		all: function () {
			return $http.get('http://localhost:3000/0.0.1/docente/contenido.json?idclase=4');
		}
	};
}])
.factory('ContenidoR',['$resource', function ContenidoFactory($resource){
	return $resource('http://localhost:3000/0.0.1/docente/contenido.json');
}])

.controller('testCotroller', ['$scope', 'Contenido', function ($scope, Contenido) {
	Contenido.all().success(function(data, status, headers, config) {
		$scope.test = data;
		console.log($scope.test);
  	}).error(function(data, status, headers, config) {
  		console.log(data);
  	});	
}])
.controller('test2Cotroller', ['$scope', 'ContenidoR', function ($scope, ContenidoR) {
	var data = ContenidoR.get({idclase: 4})
	console.log(data);
}]);