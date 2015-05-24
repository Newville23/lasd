angular.module('Dirapp')
  .controller('ContenidoCtrl', ['$scope', '$mdDialog', '$stateParams', '$state', 'Docente', function ($scope, $mdDialog, $stateParams, $state, Docente) {
    'use strict';

    var idClase = $stateParams.idclase;
    $scope.logro = {};
    $scope.evaluacion = {};

    Docente.contenido.query({idclase: idClase}, function(logros){
    	$scope.Logros = logros;

        Docente.calificaciones.query({idclase: idClase}, function(evaluaciones){
            $scope.evaluaciones = evaluaciones;
            //$('#areaConcepto').flexible();
        });
    });

    $scope.saveLogro = function(id_indicador){

        if (id_indicador) {
          // PUT
            if (_.size($scope.logro)) {
                var getParams = {idindicador : $scope.logro.id_indicador};
                var putlogro = _.pick($scope.logro, 'contenido', 'periodo', 'fecha_vencimiento');
                Docente.contenido.update(getParams, putlogro, function (log) {
                    var logro = _.findWhere($scope.Logros, {id_indicador: id_indicador});
                    logro.contenido = log.data.contenido;
                    logro.periodo = log.data.periodo;
                    logro.fecha_vencimiento = log.data.fecha_vencimiento;
                    _.delay(function(){
                        $('#modalNewLogro').modal('hide');
                    }, 500);
                });
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
                }, 500);
            });
        }
    };

    $scope.launchPostModal = function(){
        $scope.logro = {};
    };

    $scope.launchEditModal = function(id_indicador){
        $scope.logro = _.clone(_.findWhere($scope.Logros, {id_indicador: id_indicador}));
        if ($scope.logro.fecha_vencimiento) {
            $scope.logro.fecha_vencimiento = $scope.logro.fecha_vencimiento.substring(0, 10);
        }
    };

    $scope.showLogroFromCollapse = function(logro){
        $scope.logro= _.clone(logro);
        $scope.evaluacion = {};
    };

    $scope.saveEvaluacion = function (id_indicador) {
        var evaluacion = {
            idindicador : id_indicador,
            tipoeval: $scope.evaluacion.tipo_evaluacion,
            concepto: $scope.evaluacion.concepto,
            ponderacion: $scope.evaluacion.ponderacion,
            idclase: idClase
        };
        Docente.calificaciones.save(evaluacion, function (log) {
            $scope.evaluacion.id_indicador = id_indicador;
            $scope.evaluacion.id_clase = idClase;
            $scope.evaluacion.id_calificacion = log.data.idcalificacion;

            $scope.evaluaciones.push($scope.evaluacion);
            $scope.evaluacion = {};
        });
    };

    $scope.showEditEvaluacion = function(evaluacion){
        $scope.evaluacion = _.clone(evaluacion);
    };
    $scope.editEvaluacion = function() {
        var evaluacion = {
            "id_indicador" : $scope.evaluacion.id_indicador,
            "tipo_evaluacion": $scope.evaluacion.tipo_evaluacion,
            "concepto": $scope.evaluacion.concepto,
            "ponderacion": $scope.evaluacion.ponderacion,
            "Clase_numero": $scope.evaluacion.id_clase
        };
        var idcalificacion = {idcalificacion : $scope.evaluacion.id_calificacion};
        Docente.calificaciones.update(idcalificacion, evaluacion, function (log) {

            var logro = _.findWhere($scope.evaluaciones, {id_calificacion: $scope.evaluacion.id_calificacion});
            logro.tipo_evaluacion = log.data.tipo_evaluacion;
            logro.concepto = log.data.concepto;
            logro.ponderacion = log.data.ponderacion;

            _.delay(function(){
                $('#modalEditEvaluacion').modal('hide');
            }, 500);
        });
    };

    $scope.calificar2 = function(id_calificacion){
        var url = '/Docente/' + idClase + '/Estudiantes/calificaciones?idcalificacion=' + id_calificacion;
        console.log(url);
        $location.path(url);        
    };
    $scope.calificar = function(id_calificacion){
        //var url = 'Docente/10095/Estudiantes/calificaciones?idcalificacion=dsfsfdfdf';
        //console.log(url);
        $state.go('Docente.Estudiantes.calificaciones', {idcalificacion: id_calificacion});        
    };
}]);
