(function(){
	var app = angular.module('integracionSMS', []);

	app.factory('Fabrica', function(){
		var factDatos = {
			datos: datos
		};
		return factDatos;
	});

	app.controller('listaController', function($scope, Fabrica){
		this.usuarios = Fabrica.datos;		
	});

	app.controller('cuController', function(Fabrica){
		
		this.datosForm = {};
		this.swForm = false;
		this.boton = 'Agregar usuario';


		this.showForm = function(){
			//this.swForm = this.swForm || false;
			this.swForm = !this.swForm;
			this.boton = this.swForm ? 'Ocultar form' : 'Agregar usuario';
		};
		
		this.agregarUsuario = function(){

			if (typeof(this.datosForm.$$hashKey === 'string')) {
                
                var user = _.findWhere(Fabrica.datos, {CELULAR: this.datosForm.CELULAR});        
                var index = Fabrica.datos.indexOf(user);
                
                Fabrica.datos[index] = this.datosForm;
                this.datosForm = {};
                
                //Hide Modal.
                $('#modal-sms').modal('hide');

			}else{
				Fabrica.datos.unshift(this.datosForm);
				this.datosForm = {};
				this.showForm();
			}

			console.log(typeof(this.datosForm.$$hashKey));


		};

		this.editForm = function(idNumber){
			var user = _.clone(_.findWhere(Fabrica.datos, {CELULAR: idNumber}));
			this.datosForm = user;
		};
	});

	//app.controller('editController')

	app.directive('formCrud', function(){
		return{
			restrict: 'E',
			templateUrl: "htmls/form-crud.html"
		};
	});

	datos = [
	{
		"ID" : 1,
		"CELULAR" : "3002354374",
		"NOMBRE" : "ANAMARIA PEREIRA",
		"CARGO" : "COORDINADOR COC",
		"TIPO_CLIENTE" : "COC",
		"COD_CDE" : null,
		"REGIONAL" : null
	},
	{
		"ID" : 2,
		"CELULAR" : "3006139335",
		"NOMBRE" : "RONALD MAURICIO CORREA",
		"CARGO" : "COORDINADOR COC",
		"TIPO_CLIENTE" : "COC",
		"COD_CDE" : null,
		"REGIONAL" : null
	},
	{
		"ID" : 5,
		"CELULAR" : "3002043910",
		"NOMBRE" : "JORGE ROJAS",
		"CARGO" : "GERENTE DE TIENDAS",
		"TIPO_CLIENTE" : "DIR",
		"COD_CDE" : null,
		"REGIONAL" : null
	},
	{
		"ID" : 6,
		"CELULAR" : "3008030225",
		"NOMBRE" : "JESUS MENDOZA",
		"CARGO" : "COORDINADOR COC",
		"TIPO_CLIENTE" : "COC",
		"COD_CDE" : null,
		"REGIONAL" : null
	},
	{
		"ID" : 7,
		"CELULAR" : "3006875797",
		"NOMBRE" : "SANDRA TORRENEGRA",
		"CARGO" : "DIRECTORA DE TIENDAS",
		"TIPO_CLIENTE" : "DIR",
		"COD_CDE" : null,
		"REGIONAL" : null
	},
	{
		"ID" : 23,
		"CELULAR" : "3005709847",
		"NOMBRE" : "SHARIF DAVID ARANA",
		"CARGO" : "COORDINADOR COC",
		"TIPO_CLIENTE" : "COC",
		"COD_CDE" : null,
		"REGIONAL" : null
	},
	{
		"ID" : 24,
		"CELULAR" : "3004873880",
		"NOMBRE" : "MAURICIO QUIJANO",
		"CARGO" : "COORDINADOR COC",
		"TIPO_CLIENTE" : "COC",
		"COD_CDE" : null,
		"REGIONAL" : null
	},
	{
		"ID" : 25,
		"CELULAR" : "3005622426",
		"NOMBRE" : "KENNY GIACOMETTO",
		"CARGO" : "COORDINADOR COC",
		"TIPO_CLIENTE" : "COC",
		"COD_CDE" : null,
		"REGIONAL" : null
	},
	{
		"ID" : 26,
		"CELULAR" : "3005642614",
		"NOMBRE" : "Emilce Herrera Uchuvo",
		"CARGO" : "ADMINISTRADOR CDE",
		"TIPO_CLIENTE" : "ADM",
		"COD_CDE" : 1000510,
		"REGIONAL" : null
	},
	{
		"ID" : 27,
		"CELULAR" : "3012426333",
		"NOMBRE" : "Yamile Cuellar",
		"CARGO" : "COORDINADOR CDE",
		"TIPO_CLIENTE" : "ADM",
		"COD_CDE" : 1000510,
		"REGIONAL" : null
	},
	{
		"ID" : 28,
		"CELULAR" : "3003802464",
		"NOMBRE" : "Rocio Valenzuela",
		"CARGO" : "COORDINADOR CDE",
		"TIPO_CLIENTE" : "ADM",
		"COD_CDE" : 1000510,
		"REGIONAL" : null
	},
	{
		"ID" : 29,
		"CELULAR" : "3017866869",
		"NOMBRE" : "Sandra Milena Morales",
		"CARGO" : "ADMINISTRADOR CDE",
		"TIPO_CLIENTE" : "ADM",
		"COD_CDE" : 1000479,
		"REGIONAL" : null
	},
	{
		"ID" : 30,
		"CELULAR" : "3016309197",
		"NOMBRE" : "Carlos Bustos",
		"CARGO" : "COORDINADOR CDE",
		"TIPO_CLIENTE" : "ADM",
		"COD_CDE" : 1000479,
		"REGIONAL" : null
	},
	{
		"ID" : 31,
		"CELULAR" : "3004564348",
		"NOMBRE" : "Javier Forero",
		"CARGO" : "ADMINISTRADOR CDE",
		"TIPO_CLIENTE" : "ADM",
		"COD_CDE" : 1000511,
		"REGIONAL" : null
	},
	{
		"ID" : 32,
		"CELULAR" : "3012584449",
		"NOMBRE" : "German Leal",
		"CARGO" : "COORDINADOR CDE",
		"TIPO_CLIENTE" : "ADM",
		"COD_CDE" : 1000511,
		"REGIONAL" : null
	},
	{
		"ID" : 33,
		"CELULAR" : "3016216782",
		"NOMBRE" : "Carlos Florez",
		"CARGO" : "COORDINADOR CDE",
		"TIPO_CLIENTE" : "ADM",
		"COD_CDE" : 1000511,
		"REGIONAL" : null
	},
	{
		"ID" : 34,
		"CELULAR" : "3004857593",
		"NOMBRE" : "Clara ines Villamil",
		"CARGO" : "ADMINISTRADOR CDE",
		"TIPO_CLIENTE" : "ADM",
		"COD_CDE" : 1000001,
		"REGIONAL" : null
	},
	{
		"ID" : 35,
		"CELULAR" : "3002185313",
		"NOMBRE" : "Cristian Garcia",
		"CARGO" : "COORDINADOR CDE",
		"TIPO_CLIENTE" : "ADM",
		"COD_CDE" : 1000500,
		"REGIONAL" : null
	},
	{
		"ID" : 36,
		"CELULAR" : "3006885201",
		"NOMBRE" : "Melissa Cuellar",
		"CARGO" : "COORDINADOR CDE",
		"TIPO_CLIENTE" : "ADM",
		"COD_CDE" : 1000470,
		"REGIONAL" : null
	},
	{
		"ID" : 37,
		"CELULAR" : "3006080059",
		"NOMBRE" : "Carlos Arias",
		"CARGO" : "ADMINISTRADOR CDE",
		"TIPO_CLIENTE" : "ADM",
		"COD_CDE" : 1000415,
		"REGIONAL" : null
	},
	{
		"ID" : 38,
		"CELULAR" : "3014479667",
		"NOMBRE" : "Laura Sandoval",
		"CARGO" : "COORDINADOR CDE",
		"TIPO_CLIENTE" : "ADM",
		"COD_CDE" : 1000415,
		"REGIONAL" : null
	},
	{
		"ID" : 40,
		"CELULAR" : "3012424342",
		"NOMBRE" : "Isabel Reyes",
		"CARGO" : "ADMINISTRADOR CDE",
		"TIPO_CLIENTE" : "ADM",
		"COD_CDE" : 1000011,
		"REGIONAL" : null
	},
	{
		"ID" : 41,
		"CELULAR" : "3008379732",
		"NOMBRE" : "Silvia Juliana Sarmiento",
		"CARGO" : "ADMINISTRADOR CDE",
		"TIPO_CLIENTE" : "ADM",
		"COD_CDE" : 1002031,
		"REGIONAL" : null
	},
	{
		"ID" : 44,
		"CELULAR" : "3013764686",
		"NOMBRE" : "Milton Norbey Zapata",
		"CARGO" : "COORDINADOR CDE",
		"TIPO_CLIENTE" : "ADM",
		"COD_CDE" : 3000032,
		"REGIONAL" : null
	},
	{
		"ID" : 45,
		"CELULAR" : "3012625292",
		"NOMBRE" : "Michael Estanislao",
		"CARGO" : "ADMINISTRADOR CDE",
		"TIPO_CLIENTE" : "ADM",
		"COD_CDE" : 1000406,
		"REGIONAL" : null
	},
	{
		"ID" : 46,
		"CELULAR" : "3004438000",
		"NOMBRE" : "Ximena Torres",
		"CARGO" : "COORDINADOR CDE",
		"TIPO_CLIENTE" : "ADM",
		"COD_CDE" : 1000011,
		"REGIONAL" : null
	},
	{
		"ID" : 47,
		"CELULAR" : "3013685321",
		"NOMBRE" : "Claudia Perdomo",
		"CARGO" : "ADMINISTRADOR CDE",
		"TIPO_CLIENTE" : "ADM",
		"COD_CDE" : 3000033,
		"REGIONAL" : null
	}
	];


})();