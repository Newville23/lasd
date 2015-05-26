angular.module('Dirapp')
.controller('adminCtrl',['$scope','$mdSidenav', '$location', 'Usuario', 'Coordinador', '$state', function ($scope,$mdSidenav, $location, Usuario, Coordinador, $state){

    // Valida que la sesion haya iniciado
    Usuario.login.get(function (data) {
        if (data.login === false) {
            $location.path("/login");
        }else {
            var rol = data.userData.rol;
            if (rol == 'profesor') {
                return $location.path("/Docente");
            }else if (rol == 'admin') {
                Coordinador.cursos.query(function (cursos) {
                    $scope.cursos = cursos;
                    $scope.grados = _.keys(_.indexBy(cursos, 'nombre_curso'));
                    console.log(cursos);
                    console.log($scope.grados);
                });
            }
        }
    },function(data){
        console.log(data);
    });

}]);
