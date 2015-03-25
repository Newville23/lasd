var moment = require('moment');
var bodyParser = require('body-parser');
var packageJson = require('../package.json');

var _ = require("underscore");
// valida la existencia de una lista de keys en un objeto,
// se usa para vailadr si estan los valores requeridos.
_.requiredList = function(obj, arrayKeys){
    var sw = true;
    arrayKeys.forEach(function(value){
        sw = obj[value] ? sw && true : sw && false;
    });
    return sw;
};

module.exports = function(app, pool) {

    app.use(bodyParser.urlencoded({ extended: false }));    
    app.use(bodyParser.json());
    var version = '/' + packageJson.version;

    var contenido = new Contenido(pool);
    var estudiante = new Estudiante(pool);
    
    app.get(version + '/docente/contenido.json', contenido.getContenido);
    app.post(version + '/docente/contenido.json', contenido.postContenido);
    app.put(version + '/docente/contenido.json', contenido.putContenido);

    app.get(version + '/docente/calificaciones.json', contenido.getCalificaciones);
    app.post(version + '/docente/calificaciones.json', contenido.postCalificaciones);
    app.put(version + '/docente/calificaciones.json', contenido.putCalificaciones);

    app.get(version + '/docente/notas.json', contenido.getNotas);
    app.get(version + '/docente/estudiante.json', contenido.getEstudiantes);
    //app.get('docente/listaEstudiantes.json', contenido.getListaEstudiantes);

    app.post(version + '/docente/asistencia.json', estudiante.postAsistencia);
}



function Contenido (pool) {
    // Devuelve los datos de indicadores de logros y las calificaciones de los estudiantes, de una clase especifica.
    this.getContenido = function(req, res) {
        "use strict";

        //var Clase_numero = pool.escape(req.query.clasenumero);
        var id_clase = req.query.idclase ? pool.escape(req.query.idclase) : null;
        var data = {};
        
        if (id_clase) {

            var contenidoIndicadoresQuery = "SELECT id AS id_indicador, CAST(Clase_numero AS CHAR) id_clase, contenido, periodo, estado, " +
            "fecha_vencimiento, datetime_creacion, datetime_modificacion " +
            "FROM lasd3.Clase_indicador WHERE Clase_numero = " + id_clase;

            var Calificaciones = "SELECT CAST(id AS CHAR) as id_calificacion, id_indicador, tipo_evaluacion, " + 
            "concepto, ponderacion, CAST(Clase_numero AS CHAR) id_clase, Clase_Materia_id, datetime_creacion " + 
            "FROM lasd3.Calificacion WHERE Clase_numero = " + id_clase;
            var query = contenidoIndicadoresQuery + ';' + Calificaciones;

            pool.query(query, function(err, rows, fields) {
                
                if (err){
                    return res.status(500).json({error: '500'});
                }else if(rows[0].length == 0){
                    return res.status(404).json({error: '404'});
                }

                data.contenido = rows[0];
                data.calificaciones = rows[1];
                return res.json(data);
            });
        }else{
            return res.status(400).json({status: '400'});
        }
    }
    this.postContenido = function(req, res){
        var post = req.body;
        
        // se validan todos los parametros requeridos
        if (!_.requiredList(post, ['idclase', 'contenido', 'periodo'])) {
            res.status(400).json({status: '400'});return;
        };

        var data = {
            "Clase_numero": post.idclase,
            "contenido": post.contenido,
            "periodo": post.periodo,
            "fecha_vencimiento": post.fechavencimiento
        }

        pool.query('INSERT INTO Clase_indicador SET ?', data , function(err, rows, fields) {
            if (err){res.status(500).json({status: '500', err: err});return;}
            rows.data = post;
            res.json(rows);
        });
    }
    this.putContenido = function(req, res) {        
    }

    this.getCalificaciones = function(req, res) {
        "use strict";

        var id_clase = req.query.idclase ? 'AND Clase_numero = ' + pool.escape(req.query.idclase) : '';
        var id_indicador = req.query.idindicador ? 'AND id_indicador = ' + pool.escape(req.query.idindicador) : '';
        var id_calificacion = req.query.idcalificacion ? 'AND id = ' + pool.escape(req.query.idcalificacion) : '';
        
        if (id_clase) {

            var query = "SELECT CAST(id AS CHAR) as id_calificacion, id_indicador, tipo_evaluacion, " + 
            "concepto, ponderacion, CAST(Clase_numero AS CHAR) id_clase, Clase_Materia_id, datetime_creacion " + 
            "FROM Calificacion WHERE 1 ";

            var where = id_calificacion + ' ' + id_indicador + ' ' + id_clase;
            query = query + where;

            pool.query(query, function(err, rows, fields) {
                
                if (err){
                    return res.status(500).json({error: '500', err: err});
                }else if(rows.length == 0){
                    return res.status(404).json({error: '404'});
                }
                return res.json(rows);
            });
        }else{
            return res.status(400).json({status: '400'});
        }
    }
    this.postCalificaciones = function(req, res) {

        var id = moment().format("X") + _.random(1345, 9999999);
        var post = req.body;

        // se validan todos los parametros requeridos
        if (!_.requiredList(post, ['idindicador', 'tipoeval', 'concepto', 'ponderacion', 'idclase'])) {
            res.status(400).json({status: '400'});return;
        };

        var data = {
            "id": id,
            "id_indicador" : post.idindicador,
            "tipo_evaluacion": post.tipoeval,
            "concepto": post.concepto,
            "ponderacion": post.ponderacion,
            "Clase_numero": post.idclase
        }

        pool.query('INSERT INTO Calificacion SET ?', data , function(err, rows, fields) {
            if (err){res.status(500).json({status: '500', err: err});return;}
            rows.data = post;
            rows.data.idcalificacion = id;
            res.json(rows);
        });
    }
    this.putCalificaciones = function(req, res) {
    }

    // Devuelve los datos de las notas de los estudiantes dada una id de una clase o un id de indicador.
    this.getNotas = function (req, res) {
        "use strict";

        var id_clase = req.query.idclase ? 'AND Calificacion.Clase_numero = ' + pool.escape(req.query.idclase) : '';
        var id_indicador = req.query.idindicador ? 'AND Calificacion.id_indicador = ' + pool.escape(req.query.idindicador) : '';
        var id_calificacion = req.query.idcalificacion ? 'AND Calificacion.id = ' + pool.escape(req.query.idcalificacion) : '';
        var id_estudiante = req.query.idestudiante ? 'AND Matricula.Estudiante_identificacion = ' + pool.escape(req.query.idestudiante) : '';

        var notasQuery = "SELECT Clase.numero AS id_clase,  Calificacion.id_indicador, Calificacion.id AS id_calificacion, " +
                            "Matricula.Estudiante_identificacion as id_estudiante, tipo_evaluacion, nota, " +
                            "fecha AS fecha_creacion_nota, concepto, ponderacion " +
                            "FROM Calificacion " +
                            "JOIN Clase ON Clase.numero = Calificacion.Clase_numero " +
                            "JOIN Matricula ON Clase.Curso_codigo = Matricula.Curso_codigo " +
                            "LEFT JOIN Agregar_notas ON Agregar_notas.Calificacion_id = Calificacion.id  " +
                                    "AND Agregar_notas.Estudiante_identificacion = Matricula.Estudiante_identificacion " +
                        "WHERE 1 ";

        if (id_clase || id_calificacion) {
            var where = id_clase + ' ' + id_indicador + ' ' + id_calificacion + ' ' + id_estudiante;
            var query = notasQuery + where;

            pool.query(query, function(err, rows, fields) {
                if (err){
                    return res.status(500).json({error: '500'});
                }else if(rows.length == 0){
                    return res.status(404).json({error: '404'});
                }
                return res.json(rows);
            });

        }else{
            return res.status(400).json({status: '400'});
        }   
    }

    //Devuelve la lista de los estudiantes con los datos, además de la asistencia, 
    //dada la id de la clase y la fecha. Si no se especifica la fecha, se toma la actual.
    this.getEstudiantes = function (req, res) {
        "use strict";

        var id_clase = req.query.idclase ? pool.escape(req.query.idclase) : null;
        var fecha = req.query.fecha ? pool.escape(req.query.fecha) : pool.escape(moment().format('YYYY-MM-DD'));

        var query = "SELECT CAST(Clase_numero AS CHAR) AS id_clase, Materia_id AS id_materia, Profesor_identificacion AS id_profesor, " +
                            "Clase.Curso_codigo AS id_curso, Estudiante.tipo_identificacion, " +
                            "Matricula.Estudiante_identificacion AS id_estudiante, nombre, apellido, " +
                            "fecha_nacimiento, tipo_sangre, " +
                            "Asistencia.id AS id_asistencia, Asistencia AS asistencia, datetime_creacion, Observacion as observacion " +
                        "FROM lasd3.Clase " +
                        "JOIN lasd3.Matricula " +
                            "ON Clase.Curso_codigo = Matricula.Curso_codigo " +
                        "LEFT JOIN lasd3.Asistencia " +
                            "ON Asistencia.Clase_numero = Clase.numero AND Matricula.Estudiante_identificacion = Asistencia.Estudiante_identificacion " +
                                "AND cast(fecha AS date) = " + fecha + " " +
                        "JOIN  lasd3.Estudiante " +
                            "ON Estudiante.identificacion = Matricula.Estudiante_identificacion " +
                        "JOIN lasd3.Usuario " +
                            "ON Usuario.id = Estudiante.Usuario_id " +
                    "WHERE Clase.numero = " + id_clase + " ORDER BY nombre, apellido";
        
        if (id_clase) {
            pool.query(query, function(err, rows, fields) {
                if (err){
                    return res.status(500).json({error: '500'});
                }else if(rows.length == 0){
                    return res.status(404).json({error: '404'});
                }
                return res.json(rows);
            });
        }else{
            return res.status(400).json({status: '400'});
        }
    }

    this.getEstudiantesByCurso = function (req, res) {
        "use strict";
        
        var Curso_codigo = req.query.cursocodigo ? pool.escape(req.query.cursocodigo) : null;

        var query = "SELECT Estudiante_identificacion AS id_estudiante, tipo_identificacion, nombre, apellido, fecha_nacimiento, tipo_sangre FROM lasd3.Matricula " +
                        "JOIN lasd3.Estudiante " +
                        "ON Estudiante.identificacion = Matricula.Estudiante_identificacion " +
                        "JOIN lasd3.Usuario " +
                        "ON Usuario.id = Estudiante.Usuario_id " +
                        "WHERE Curso_codigo = " + Curso_codigo;
        
        if (Curso_codigo) {
            pool.query(query, function(err, rows, fields) {
                if (err){
                    return res.status(500).json({error: '500'});
                }else if(rows.length == 0){
                    return res.status(404).json({error: '404'});
                }
                return res.json(rows);
            });
        }else{
            return res.status(400).json({status: '400'});
        }
    }
}

function Estudiante (pool) {
    
    this.postAsistencia = function (req, res) {
        'use strict';

        var id_clase = req.query.idclase ? pool.escape(req.query.idclase) : null;

        // se escapa la fecha, si no se especifica se asigna la actual
        var fecha = req.query.fecha ? pool.escape(req.query.fecha) : moment().format('YYYY-MM-DD');

        // analizar y ajustar datos post

        if (id_clase) {
            
            // se valida que la fecha no sea futura
            if (moment().format('YYYY-MM-DD') < fecha.replace(/'/g , "")) {
                return res.status(400).json({status: '400', msg: "Escoge una fecha valida."});
            };
            res.json({msg: "hola"});

            // === Validacion de no editar la lista de asistencia (que no se haya realizado ya la asistencia) ========
                //mensaje que ya se realizó

            // insercion de asistencia

        }else{
            return res.status(400).json({status: '400', msg: "Falta especificar parametros"});
        }
        
    }
}