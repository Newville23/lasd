'use strict';

//Controlador del dialogo nueva asistencia /
function Dialogasistencia($scope, $mdDialog) {

    $scope.save = function() {
       $mdDialog.hide(true);
    };

    $scope.hide = function() {
      $mdDialog.hide();
    };

    $scope.cancel = function() {
      $mdDialog.cancel();
    };
}

angular.module('Dirapp')
  .controller('EstudiantesCtrl', function ($scope, $mdSidenav, $mdDialog, $mdToast, $stateParams, Docente, $state) {
    'use strict';

    $scope.$on('$viewContentLoaded', 
        function(event){                
            if ($state.current.url == '/Estudiantes') {
                $state.go('Docente.Estudiantes.lista')
            };
        }
    );

    $scope.checked = true; // variable que inabilita el form
    $scope.asist = true;
    $scope.estudiantes = {};

    $scope.idClase = $stateParams.idclase;
    Docente.estudiantes.query({idclase: $scope.idClase}, function(data){
        $scope.estudiantes = data;
    }, function(data){      
        console.log(data); // Error
    });

    $scope.infoRight = function(name) {
        $mdSidenav('info').toggle()
        .then(function(){    
            $scope.name = name;
        });
    };

    // Modal de envío de asistensia
    $scope.save = function(ev) {
        $mdDialog.show({
            controller: Dialogasistencia,
            templateUrl: 'views/estudiantes/dialogos/nasist.html',
            targetEvent: ev,
        })
        .then(function(sw) {
            if (sw) {
                var getParams = {idclase : $scope.idClase, numeroEstudiantes: _.size($scope.estudiantes)};
                var asistencia = _.map($scope.estudiantes, function(obj){ return _.pick(obj, 'id_estudiante', 'asistencia')});
                Docente.asistencia.save(getParams, asistencia,function(data){
                    console.log(data);
                });
            };            
        });             
    }

    //Moda para perfil del estudiante
    $scope.showStudentProfile = function (ev, idEstudiante) {
        $mdDialog.show({
            controller: DialogStudentProfile,
            templateUrl: 'views/estudiantes/dialogos/modalestudiante.html',
            targetEvent: ev,
            locals: { idEstudiante: idEstudiante }
        })
        .then(function(answer) {
                //$scope.alert = 'You said the information was "' + answer + '".';
                console.log(answer);
        }, function() {
                //$scope.alert = 'You cancelled the dialog.';
                console.log('You cancelled the dialog.');
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

})
//Controlador del perfil del estudiante
function DialogStudentProfile($scope, $mdDialog, $stateParams, idEstudiante, Coordinador) {

    $scope.cancel = function() {
      $mdDialog.cancel();
    };
   
    Coordinador.estudiantes.query({idestudiante: idEstudiante}, function(data){
        if (_.size(data)) {
            $scope.estudiante = data[0];
            console.log(data);
        }       
    }, function(data){      
        console.log(data); // Error
    });
}

