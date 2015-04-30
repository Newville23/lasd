angular.module('Dirapp')
  .controller('ContenidoCtrl', ['$scope', '$mdDialog', '$stateParams', 'Docente', function ($scope, $mdDialog, $stateParams, Docente) {
    'use strict';

    var idClase = $stateParams.idclase;
    $scope.logro = {};

    Docente.contenido.query({idclase: idClase}, function(logros){
    	$scope.Logros = logros;

        Docente.calificaciones.query({idclase: idClase}, function(evaluaciones){
            $scope.evaluaciones = evaluaciones;
        });
    });

    $scope.saveLogro = function(id_indicador){
      
        if (id_indicador) {
            if (_.size($scope.logro)) {
                console.log($scope.logro);
            }

        }else{

            // POST logro
            $scope.logro.idclase = idClase;
            Docente.contenido.save($scope.logro, function(log){
                var logro = {
                    id_indicador: log.insertId,
                    id_clase: log.data.idclase,
                    contenido: log.data.contenido,
                    periodo: log.data.periodo,
                    fecha_vencimiento: log.data.fecha_vencimiento
                };
                $scope.Logros.push(logro);
                _.delay(function(){
                    $('#modalNewLogro').modal('hide');
                }, 1000);        
            });
        }
    };

    $scope.launchPostModal = function(){
        $scope.logro = {};
    };

    $scope.launchEditModal = function(id_indicador){
        //console.log(moment().format("ddd, hA"));
        $scope.logro = _.findWhere($scope.Logros, {id_indicador: id_indicador});
        if ($scope.logro.fecha_vencimiento) {
            $scope.logro.fecha_vencimiento = moment(new Date($scope.logro.fecha_vencimiento)).format("YYYY-MM-DD");
        }
    };
}]);
