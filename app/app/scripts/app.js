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
    .dark()
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
        templateUrl: "views/home.html",
        controller: "soloDatosCtrl"
    })
    .state('Docente',{
        url:"/Docente/{idclase:int}", // sólo caracteres alfanuméricos
        templateUrl:"views/todo.html",
        controller: "soloDatosCtrl"
    })
    .state('admin', {
        url:"/admin",
        template: "admin"
    })
    .state('login', {
        url: "/login",
        templateUrl: "views/landing/index.html",
        controller: "LandingCtrl"
    })
    .state('configuracion',{
        url:"/configuracion",
        template: "<h2>Settings init</h2>"
    })
    .state('ayuda',{
        url:"/ayuda",
        template: "<h2>Help</h2>"
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
    .state('Docente.Estudiantes.lista', {
        url: "/lista",
        templateUrl: "views/estudiantes/lista.html",
    })
    .state('Docente.Estudiantes.asistencia', {
        url: "/asistencia",
        templateUrl: "views/estudiantes/asistencia.html",
        controller: 'AsistenciaCtrl'
    })
    .state('Docente.Estudiantes.calificaciones', {
        url: "/calificaciones?idcalificacion",
        templateUrl: "views/estudiantes/calificaciones.html",
        controller: 'CalificacionCtrl'
    })
})
.controller('soloDatosCtrl',['$scope','$mdSidenav', '$location', 'Usuario', 'Docente', '$state', function ($scope,$mdSidenav, $location, Usuario, Docente, $state){
    moment.locale('es');
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
