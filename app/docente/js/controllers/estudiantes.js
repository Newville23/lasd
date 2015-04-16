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
  .controller('EstudiantesCtrl', function ($scope, $mdSidenav, $mdDialog, $mdToast) {


 $scope.infoRight = function(name) {


    $mdSidenav('info').toggle()
                        .then(function(){

                          $scope.name = name;
                        });
  };

	var estudiantes = [
	      {
	        face : '/images/yeoman.png',
	        nombre: 'david',
	        apellido: 'Min Li ',
			fecha_nacimiento: '0000-00-00',
			tipo_sangre: 'A+',
	        id_asistencia: '345584',
	        asistencia: 'si',
	        curso: '9B' //cambiar por id_curso
	      },
	      {
	        face : '/images/yeoman.png',
	        nombre: 'lennin',
	        apellido: 'Min Li',
	        fecha_nacimiento: '0000-00-00',
	        tipo_sangre: 'A+',
	        id_asistencia: '345584',
	        asistencia: 'si',
	        curso: '9B' //cambiar por id_curso
	      },
	      {
	        face : '/images/yeoman.png',
	        nombre: 'pedro',
	        apellido: 'Min Li ',
			fecha_nacimiento: '0000-00-00',
			tipo_sangre: 'A+',
	        id_asistencia: '345584',
	        asistencia: 'si',
	        curso: '9B' //cambiar por id_curso
	      },
	      {
	        face : '/images/yeoman.png',
	        nombre: 'pablo',
	        apellido: 'Min Li ',
	        fecha_nacimiento: '0000-00-00',
	        tipo_sangre: 'A+',
	        id_asistencia: '345584',
	        asistencia: 'si',
	        curso: '9B' //cambiar por id_curso
	      },
	      {
	        face : '/images/yeoman.png',
	        nombre: 'juan',
	        apellido: 'Min Li ',
			fecha_nacimiento: '0000-00-00',
			tipo_sangre: 'A+',
	        id_asistencia: '345584',
	        asistencia: 'si',
	        curso: '9B' //cambiar por id_curso
	      },
	       {
	        face : '/images/yeoman.png',
	        nombre: 'Danna',
	        apellido: 'Min Li ',
			fecha_nacimiento: '0000-00-00',
			tipo_sangre: 'A+',
	        id_asistencia: '345584',
	        asistencia: 'si',
	        curso: '9B' //cambiar por id_curso
	      }
	    ];
		    $scope.estudiantes = estudiantes;

		        $scope.checked = true; // variable que inabilita el form
			    $scope.asist = true;


			    $scope.save = function(ev) {
			    	    $mdDialog.show({
					     controller: Dialogasistencia,
					      templateUrl: 'html/estudiantes/dialogos/nasist.html',
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

