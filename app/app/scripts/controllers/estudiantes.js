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

  .controller('estudianteAsistenciaListCtrl', ['$scope', function ($scope) {
      var x,y,top,left,down;

      $("#stuff").mousedown(function(e){
          e.preventDefault();
          down=true;
          x=e.pageX;
          left=$(this).scrollLeft();
      });

      $("#stuff").mousemove(function(e){
          if(down){
              var newX=e.pageX;
              $("#stuff").scrollLeft(left-newX+x);
          }
      });

      $("#stuff").mouseup(function(e){down=false;});
  }])

.controller('AsistenciaCtrl', ['$scope', '$stateParams', 'Docente', function($scope, $stateParams, Docente){

    $scope.idClase = $stateParams.idclase;
    $scope.meses = [];
    $scope.curMes = moment().month() + 1;
    for (var i = 0; i < $scope.curMes; i++) {
        $scope.meses.push([moment().month(i).format("MMMM"), i+1]);
    }

    // Dado un mes retorna las inasistencias del mes del año actual
    $scope.getFechaasistecia = function(mes){
        Docente.asistencia.query({idclase: $scope.idClase, mes: mes}, function(asistencia){
            $scope.asistencias = _.groupBy(asistencia, 'Estudiante_identificacion');
            $scope.fechas = _.keys(_.indexBy(asistencia, 'fecha')).sort().reverse();
        });
    };

    $scope.getCountAsis = function (list) {
        var count = _.countBy(list, function(obj) {
          return obj.Asistencia;
        });
        count.percent = count.no / (count.si + count.no)*100 || 0;
        return count;
    }

}])

.controller('CalificacionCtrl', ['$scope', '$stateParams', '$state', 'Docente', '$location', function($scope, $stateParams, $state, Docente, $location){
    var idClase = $stateParams.idclase;
    $scope.logroSW = 1;

    if ($stateParams.idcalificacion) {
      Docente.notas.query({idclase: idClase, idcalificacion:$stateParams.idcalificacion}, function (notas) {
          if (_.size(notas)) {
              var idindicador = notas[0].id_indicador;
              Docente.contenido.query({idclase: idClase, idindicador: idindicador}, function (logros) {
                  if (_.size(logros)) {
                      $scope.periodo = logros[0].periodo;
                      $scope.logros = logros;
                      $scope.logro = idindicador;
                      $scope.logroSW = 0;
                      $scope.notas = notas;
                      console.log(notas);
                      Docente.calificaciones.query({idclase: idClase, idindicador: idindicador}, function(evaluaciones){
                          $scope.evaluaciones = evaluaciones;
                      });
                  }
              });
          }
      });
    }

    $scope.getcontenido = function (periodo) {
        console.log(periodo);
        Docente.contenido.query({idclase: idClase, periodo: periodo}, function(logros){
            $scope.logros = logros;
            $scope.logro = null;
            $scope.logroSW = 0;
        });
    };

    $scope.getCalificaciones = function (logro) {
      Docente.calificaciones.query({idclase: idClase, idindicador: logro}, function(evaluaciones){
          $scope.evaluaciones = evaluaciones;
      });
    }

    $scope.changeCalificacion = function (idcalificacion) {

        Docente.notas.query({idclase: idClase, idcalificacion: idcalificacion}, function (notas) {
            $scope.notas = notas;
            $state.go('Docente.Estudiantes.calificaciones', {idcalificacion: idcalificacion}, {location:"replace", inherit:false});
            //var url = $location.$$path + '?idcalificacion=' + idcalificacion;
            //$location.search('idcalificacion', idcalificacion);
        });
    }

    $scope.saveNota = function (nota) {

        // validar si existe nota
        if (nota.fecha_creacion_nota || nota.saved) {
            var getParams = {idestudiante: nota.id_estudiante, idcalificacion: nota.id_calificacion};
            var post = {nota: nota.nota};
            Docente.notas.update(getParams, post, function (data) {
                console.log(data);
            });
        }else {
            var post = {
                idestudiante: nota.id_estudiante,
                idcalificacion : nota.id_calificacion,
                nota: nota.nota
            };
            Docente.notas.save(post, function(data){
                // si se creo se activa la bandera saved, para que se actualice en la proxima
                nota.saved = true;
                console.log('guardado');
                console.log(data);
            });
        }

    }

}]);

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
