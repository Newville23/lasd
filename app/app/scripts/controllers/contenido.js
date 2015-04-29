angular.module('Dirapp')
  .controller('ContenidoCtrl', function ($scope, $http, $mdSidenav, $mdDialog, $mdToast, $stateParams, Docente) {
    'use strict';

    var idClase = $stateParams.idclase;
    Docente.contenido.query({idclase: idClase}, function(data){
    	console.log(data);
    	$scope.Logros = data;
    });
    
    $http.get('scripts/Json/contenido.json').success(function (data){
        
        //$scope.Logros = data.contenido;
        $scope.Evaluaciones = data.calificaciones;
        console.log(data.contenido);
        
    });
});