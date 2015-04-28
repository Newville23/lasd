'use strict';

/* Services */

angular.module('estadisticaServices', ['ngResource'])
.factory('Notas', ['$resource',
  function($resource){
    return $resource('json/notas.json', {}, {
      GET: {method:'GET', isArray:true}
    });
  }]);