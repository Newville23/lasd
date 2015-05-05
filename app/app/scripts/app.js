angular.module('CDapp',[
    'ui.router',
    'ngMaterial',
    'ngMessages',
    'ngCookies',
    'Dirapp',
    'Servapp',
    'SerFlugel'
    ])

.config(function($mdThemingProvider) {
    $mdThemingProvider.theme('top')
    .primaryPalette('grey', {
      'default': '100', // by default use shade 400 from the gray palette for primary intentions
      'hue-1': '800', // use shade 100 for the <code>md-hue-1</code> class
      'hue-2': '700', // use shade 600 for the <code>md-hue-2</code> class
      'hue-3': '300' // use shade A100 for the <code>md-hue-3</code> class
    })
    .accentPalette('blue');
})

.config(function($stateProvider, $urlRouterProvider) {

    // For any unmatched url, redirect to /state1
    $urlRouterProvider.otherwise("/Docente/");
      //
    // Now set up the states
    $stateProvider
    // Rol de Doncente que cuenta con un parametro para cada clase
    .state('Home', {
        url: "/Docente/",
        templateUrl: "views/todo.html",
        controller: "soloDatosCtrl"
    })
    .state('Docente',{
        url:"/Docente/{idclase:int}", // sólo caracteres alfanuméricos
        templateUrl:"views/todo.html",
        controller: "soloDatosCtrl"
    })
    .state('login', {
        url: "/login",
        templateUrl: "views/landing/index.html",
        controller: "LandingCtrl"
    })
    .state('Test', {
        url: "/test",
        template: "<h1>test</h1>",
        controller: 'testCotroller'
    })
    .state('Test2', {
        url: "/test2",
        template: "<h1>test2</h1>",
        controller: 'test2Cotroller'
    })

    // estados anidaddos
    .state('Docente.Contenido', {
        url: "/Contenido",
        templateUrl: "views/contenido/index.html",
        controller: "ContenidoCtrl"
    })
    .state('Docente.Evaluaciones', {
        url: "/Evaluaciones",
        templateUrl: "views/Evaluaciones.html",
    })
    .state('Docente.Foro', {
        url: "/Foro",
        template: "<h3>Espacio Foro<h3/>"
    })
    .state('Docente.Estudiantes', {
        url: "/Estudiantes",
        templateUrl: "views/estudiantes/index.html",
        controller: 'EstudiantesCtrl'
    })
    .state('Docente.Trabajos', {
        url: "/Trabajos",
        template: "<h3>Espacio Trabajos<h3/>",
    })
    // Segundo anillo
    .state('Docente.Estudiantes.stat', {
        url: "/home",
        template: "<h3>Espacio Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod quidem quia fugit omnis dicta. Debitis, reiciendis tempora velit nesciunt non odio accusantium et iusto pariatur, voluptatum saepe quisquam recusandae error. Trabajos<h3/>",
    })
})
.controller('soloDatosCtrl',['$http','$scope','$mdSidenav','$timeout', '$mdBottomSheet','Datos', '$location', 'Usuario', 'Docente', function ($http,$scope,$mdSidenav,$timeout,$mdBottomSheet,Datos, $location, Usuario, Docente){
    // Valida que la sesion haya iniciado
    Usuario.login.get(function (data) {
        if (data.login == false) {
            $location.path("/login");
        }else {
            Docente.listaClases.query({idprofesor: data.userData.identificacion}, function (clases) {
                $scope.clases = clases;
            });
        }
    },function(data){
        console.log(data);
    });



    $scope.toggleSidenav = function(menuId) {
        $mdSidenav(menuId).toggle();
    };

    $scope.close = function() {
     $mdSidenav('left').close();
    };

    $scope.examenNotas = function(examen){
        $scope.calificar = examen;
    };

    $scope.valor = function(key){
        console.log(key);
    };

}]);
