'use strict';

/**
 * @ngdoc function
 * @name estudianteApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the estudianteApp
 */
angular.module('estudianteApp')
  .controller('MainCtrl', function ($scope, $mdDialog, $mdSidenav) {

    $scope.toggleLeft = function() {
    $mdSidenav('left').toggle()
                      .then(function(){
                          $log.debug('toggle left is done');
                      });
  };
  



    var cursos = [
        {name: 'Ingles', grado: '9B'},
        {name: 'Ingles', grado: '10A'},
        {name: 'Ingles', grado: '11D'}

    ];

    $scope.cursos  =  cursos;

	 var tabs = [
	      { title: 'Contenido', content: 'Tabs will become paginated if there isnt enough room for them.'},
	      { title: 'Foro', content: 'You can swipe left and right on a mobile device to change tabs.'},
	      { title: 'Estudiantes', content: 'You can bind the selected tab via the selected attribute on the md-tabs element.'},
	      { title: 'Trabajos', content: 'You can bind the selected tab via the selected attribute on the md-tabs element.'},
        { title: 'Mensajes', content: 'You can bind the selected tab via the selected attribute on the md-tabs element.'}
	    ];
	      $scope.tabs  =  tabs;

        $scope.iconMenu = {name: 'bower_components/material-design-icons/navigation/svg/production/ic_menu_36px.svg', color: '#777'};

   $scope.close = function() {
     $mdSidenav('left').close();

  };

  });
