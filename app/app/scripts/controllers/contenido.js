angular.module('Dirapp')
  .controller('ContenidoCtrl', ['$scope', '$mdDialog', '$stateParams', 'Docente', function ($scope, $mdDialog, $stateParams, Docente) {
    'use strict';

    var idClase = $stateParams.idclase;
    $scope.logro = {};

    Docente.contenido.query({idclase: idClase}, function(logros){
    	console.log(logros);
    	$scope.Logros = logros;

        Docente.calificaciones.query({idclase: idClase}, function(evaluaciones){
            $scope.evaluaciones = evaluaciones;
            console.log(evaluaciones);
        });
    });

    $scope.saveLogro = function(){
      $scope.logro.idclase = idClase;
      Docente.contenido.save($scope.logro, function(log){
        var logro = {
            id_indicador: log.insertId,
            id_clase: log.data.idclase,
            contenido: log.data.contenido,
            periodo: log.data.periodo,
            fecha_vencimiento: log.data.fechavencimiento
        };
        console.log(logro);
        $scope.Logros.push(logro);
      });
    };
}]);
