angular.module('Dirapp')
  .controller('ContenidoCtrl', ['$scope', '$mdDialog', '$stateParams', 'Docente', function ($scope, $mdDialog, $stateParams, Docente) {
    'use strict';

    var idClase = $stateParams.idclase;
    Docente.contenido.query({idclase: idClase}, function(logros){
    	console.log(logros);
    	$scope.Logros = logros;

        Docente.calificaciones.query({idclase: idClase}, function(evaluaciones){
            $scope.evaluaciones = evaluaciones;
            console.log(evaluaciones);
        });
    });
}]);
