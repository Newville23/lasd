angular.module('Dirapp')
.controller('docenteCtrl',['$scope','$mdSidenav', '$location', 'Usuario', 'Docente', '$state', function ($scope,$mdSidenav, $location, Usuario, Docente, $state){
    moment.locale('es');
    // Valida que la sesion haya iniciado
    Usuario.login.get(function (data) {
        if (data.login == false) {
            $location.path("/login");
        }else {
            var rol = data.userData.rol;
            if (rol == 'admin') {
                return $location.path("/admin");
            }else if (rol == 'profesor') {
                Docente.listaClases.query({idprofesor: data.userData.identificacion}, function (clases) {
                    $scope.clases = clases;
                });
            }
        }
    },function(data){
        console.log(data);
    });

    var currentIdClase = $state.params.idclase;
    $scope.routeChangeClass = function (idClass) {
        var splitUrl = location.hash.split(currentIdClase);
        return splitUrl[0] + idClass + splitUrl[1];
    }

    $scope.toggleSidenav = function(menuId) {
        $mdSidenav(menuId).toggle();
    };

    $scope.close = function() {
        $mdSidenav('left').close();
    };

    $scope.valor = function(key){
        console.log(key);
    };

}]);
