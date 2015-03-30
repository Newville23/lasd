angular.module('Servapp',[])

.factory('Datos',['$http', function ($http){

	var todoDatos = {};

	todoDatos.contenido={};

	todoDatos.profesores=
		$http.get('js/Json/contenido.json').success(function(data){
			return data;
		});
	

	return todoDatos;

}]);