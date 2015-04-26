'use strict';

//Controlador del dialogo nueva asistencia /
function Dialogasistencia($scope, $mdDialog) {

    $scope.save = function(estudiantes) {
       $mdDialog.hide(estudiantes);
    };

    $scope.hide = function() {
      $mdDialog.hide();
    };

    $scope.cancel = function() {
      $mdDialog.cancel();
    };
}

angular.module('Dirapp')
  .controller('EstudiantesCtrl', function ($scope, $mdSidenav, $mdDialog, $mdToast, $stateParams, Docente) {
    'use strict';

    $scope.checked = true; // variable que inabilita el form
    $scope.asist = true;
    $scope.estudiantes = {};

    $scope.idClase = $stateParams.idclase;
    Docente.estudiantes.query({idclase: $scope.idClase}, function(data){
        $scope.estudiantes = data;
        //console.log(data);
    }, function(data){      
        console.log(data); // Error
    });

    $scope.infoRight = function(name) {
        $mdSidenav('info').toggle()
        .then(function(){    
            $scope.name = name;
        });
    };

    $scope.save = function(ev) {
        $mdDialog.show({
            controller: Dialogasistencia,
            templateUrl: 'views/estudiantes/dialogos/nasist.html',
            targetEvent: ev,
        })
        .then(function(estudiantes) {
                //Aqui se debe ejecutar el post a la DB, Agrgando fecha al objeto a envíar
        });             
    }
                
    // Toast para la toma de asistencia //
    
    $scope.toastPosition = {  bottom: false, top: true, left: false, right: true }; 
      
    $scope.getToastPosition = function() {
        return Object.keys($scope.toastPosition)
          .filter(function(pos) { return $scope.toastPosition[pos]; })
          .join(' ');
    };

    $scope.asisToast = function() {
        if ($scope.asist === true) {

            $mdToast.show(
                $mdToast.simple()
                .content('Ahora puede tomar la asistencia!')
                .position($scope.getToastPosition())
                .hideDelay(1500)
            );
        };
    };

});

