angular.module('Dirapp')
.controller('LandingCtrl', ['$scope', '$mdDialog', '$location', 'Usuario', function($scope, $mdDialog, $location, Usuario) {
    'use strict';

    Usuario.login.get(function (data) {
        if (data.login === true) {
            if (data.userData.rol == "admin") {
                $location.path("/admin");
            }else if(data.userData.rol == "profesor") {
                $location.path("/Docente");
            }
        }
    },function(data){
        console.log(data);
    });

    $scope.showAdvanced = function(ev) {
            $mdDialog.show({
                controller: LoginCtrl,
                templateUrl: 'views/landing/loginForm.html',
                targetEvent: ev,
            })
            .then(function(answer) {
                //$scope.alert = 'You said the information was "' + answer + '".';
                console.log(answer);
            }, function() {
                //$scope.alert = 'You cancelled the dialog.';
                console.log('You cancelled the dialog.');
            });
    };


}])
.controller('logoutCtrl', ['$scope', '$location', 'Usuario', function ($scope, $location, Usuario) {
    $scope.logout = function () {
        Usuario.logout.save(function(data){
            if (!data.login) {
                $location.path("/login");
            }
        });
    };
}]);

function LoginCtrl($scope, Usuario, $location, $mdDialog) {
    $scope.form = {};
    $scope.userAlert = false;
    $scope.passAlert = false;

    $scope.setLoginForm = function () {
        $scope.userAlert = false;
        $scope.passAlert = false;
        //Enviar a API
        // Validar el tipo de usuario (Docente, admin, etc)
        Usuario.login.save($scope.form, function(data){
            console.log(data);
            $mdDialog.hide();
            if (data.login && data.userData) {
                if (data.userData.rol == "admin") {
                    $location.path("/admin");
                }else if (data.userData.rol == "profesor") {
                    $location.path("/Docente");
                }
            }
        }, function (err) {
          console.log(err);
            if (err.data.noUsuario) {
              console.log('El usuario no existe');
              $scope.userAlert = true;
            }else if (err.data.invalid_password) {
              $scope.passAlert = true;
              console.log(err.data.invalid_password);
            }
        });
    };

    $scope.hide = function() {
        $mdDialog.hide();
    };
    $scope.cancel = function() {
        $mdDialog.cancel();
    };
    $scope.answer = function(answer) {
        $mdDialog.hide(answer);
    };
}
