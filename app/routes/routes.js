var moment = require('moment');
var bodyParser = require('body-parser');
var packageJson = require('../package.json');
var session = require('express-session');

app.use(session({secret: 'ssshhhhh'}));

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
    app.use(bodyParser.json());
    //app.use(bodyParser.raw({ type: 'application/vnd.custom-type' }));
    app.use(bodyParser.urlencoded({ extended: false }));    
    
    var version = '/' + packageJson.version;

    var contenido = new Contenido(pool);
    var estudiante = new Estudiante(pool);
    var usuario = new Usuario(pool);
    
    app.get(version + '/docente/contenido.json', contenido.getContenido);
    app.post(version + '/docente/contenido.json', contenido.postContenido);
    app.put(version + '/docente/contenido.json', contenido.putContenido);

    app.get(version + '/docente/calificaciones.json', contenido.getCalificaciones);
    app.post(version + '/docente/calificaciones.json', contenido.postCalificaciones);
    app.put(version + '/docente/calificaciones.json', contenido.putCalificaciones);

    app.get(version + '/docente/notas.json', contenido.getNotas);
    app.post(version + '/docente/notas.json', contenido.postNotas);
    app.put(version + '/docente/notas.json', contenido.putNotas);

    app.get(version + '/docente/estudiante.json', estudiante.getEstudiantes);
    
    app.post(version + '/docente/asistencia.json', estudiante.postAsistencia);

    app.post(version + '/usuario/login.json', usuario.login);
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
        var post = req.body;

        var id_contenido = req.query.idcontenido;

        if (!id_contenido) {
            return res.status(400).json({status: '400', msg: "Falta especificar parametros GET"});
        };

        post.datetime_modificacion = moment().format('YYYY-MM-DD h:mm:ss');

        // var data = {
        //     "contenido": post.contenido,
        //     "periodo": post.periodo,
        //     "fecha_vencimiento": post.fechavencimiento,
        //     "datetime_modificacion" : moment().format('YYYY-MM-DD h:mm:ss');
        // }

        query = pool.query('UPDATE Clase_indicador SET ? WHERE id = ?', [post, id_contenido] , function(err, rows, fields) {
            if (err){res.status(400).json({status: '400'});return;}
            rows.data = post;
            res.json(rows);
        });
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
    // colocar Clase_Materia_id como 'nulo'
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
        var post = req.body;

        var id_calificacion = req.query.idcalificacion;

        if (!id_calificacion) {
            return res.status(400).json({status: '400', msg: "Falta especificar parametros GET"});
        };

        // var data = {
        //     "id_indicador" : post.idindicador,
        //     "tipo_evaluacion": post.tipoeval,
        //     "concepto": post.concepto,
        //     "ponderacion": post.ponderacion,
        //     "Clase_numero": post.idclase
        // }

        query = pool.query('UPDATE Calificacion SET ? WHERE id = ?', [post, id_calificacion] , function(err, rows, fields) {
            if (err){res.status(400).json({status: '400'});return;}
            rows.data = post;
            res.json(rows);
        });
    }

    // Devuelve los datos de las notas de los estudiantes dada una id de una clase o un id de indicador.
    this.getNotas = function (req, res) {
        "use strict";

        var id_clase = req.query.idclase ? 'AND Calificacion.Clase_numero = ' + pool.escape(req.query.idclase) : '';
        var id_indicador = req.query.idindicador ? 'AND Calificacion.id_indicador = ' + pool.escape(req.query.idindicador) : '';
        var id_calificacion = req.query.idcalificacion ? 'AND Calificacion.id = ' + pool.escape(req.query.idcalificacion) : '';
        var id_estudiante = req.query.idestudiante ? 'AND Matricula.Estudiante_identificacion = ' + pool.escape(req.query.idestudiante) : '';

        var notasQuery = "SELECT CAST(Clase.numero AS CHAR) AS id_clase,  Calificacion.id_indicador, CAST(Calificacion.id AS CHAR) AS id_calificacion, " +
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
                    return res.status(500).json({status: '500', err: err});
                }else if(rows.length == 0){
                    return res.status(404).json({status: '404'});
                }
                return res.json(rows);
            });

        }else{
            return res.status(400).json({status: '400'});
        }   
    }
    this.postNotas = function (req, res) {
        
        var post = req.body;

        // se validan todos los parametros requeridos
        if (!_.requiredList(post, ['idestudiante', 'idcalificacion', 'nota'])) {
            res.status(400).json({status: '400', msg: 'Faltan datos requeridos'});return;
        };

        var data = {
            "Estudiante_identificacion": post.idestudiante,
            "Calificacion_id": post.idcalificacion,
            "nota": post.nota
        }

        pool.query('INSERT INTO Agregar_notas SET ?', [data] , function(err, rows, fields) {
            if (err){res.status(500).json({status: '500', err: err});return;}
            rows.data = post;
            res.json(rows);
        });
    }

    this.putNotas = function (req, res) {
        
        var get ={};
        id_estudiante = req.query.idestudiante || null;
        id_calificacion = req.query.idcalificacion || null;

        if (id_estudiante && id_calificacion) {
            var post = req.body;

            if (!_.size(post)) {
                return res.status(400).json({status: '400', msg: 'Faltan datos POST requeridos'});
            };
            post.datetime_modificacion = moment().format('YYYY-MM-DD h:mm:ss');

            var query = 'UPDATE Agregar_notas SET ? WHERE Estudiante_identificacion = ? and Calificacion_id = ?';
            pool.query(query, [post, id_estudiante, id_calificacion] , function(err, rows, fields) {
                if (err){res.status(500).json({status: '500', err: err});return;}
                rows.data = post;
                res.json(rows);
            });
        
        }else{
            return res.status(400).json({status: '400', msg: 'Faltan datos requeridos'});
        }
        
    }
}

function Estudiante (pool) {

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
    
    this.postAsistencia = function (req, res) {
        'use strict';
        var data = [];
        //req.accepts('html, json');
        var id_clase = req.query.idclase || null;

        // la fecha, si no se especifica se asigna la actual
        var fecha = req.query.fecha || moment().format('YYYY-MM-DD');
        var numeroEstudiantes = req.query.numeroEstudiantes;

        // analizar y ajustar datos post
        var post = req.body;

        if (!id_clase || !numeroEstudiantes) {
            return res.status(400).json({status: '400', msg: "Falta especificar parametros GET"});
        }

        if (!_.isArray(post)) {
            return res.status(400).json({status: '400', msg: "Datos POST incorrectos o no especificados"});
        }

        if (_.size(post) != numeroEstudiantes ) {
            return res.status(400).json({status: '404', msg: "Numero de estudiantes no concuerda"});
        }
        // se valida que la fecha no sea futura
        if (moment().format('YYYY-MM-DD') < fecha) {
            return res.status(400).json({status: '404', msg: "Escoge una fecha valida."});
        };

        // === Validacion de no editar la lista de asistencia (que no se haya realizado ya la asistencia) ========
        var  list = "SELECT *  FROM lasd3.Asistencia WHERE Clase_numero = " + pool.escape(id_clase) + " AND fecha = " + pool.escape(fecha);
        
        pool.query(list, function (err, rows, fields) {
            if (err){res.status(500).json({status: '500', err: err});return;}
            
            if (_.size(rows) > 0){
                return res.status(400).json({status: '400', msg: "Ya se realizó la asistencia"});
            }else{

                /* asigna al array data un grupo de array que corresonden a los valores a insertar
                ej: [["332323","si","13775731636734635","2015-03-24"],["12121212","si","13775731636734635","2015-03-24"]] */
                _.each(post, function (estudiante) {
                    estudiante.Clase_numero = id_clase;
                    estudiante.fecha = fecha;
                    data.push(_.values(estudiante));
                });
                // insercion de asistencia
                var query = 'INSERT INTO Asistencia (Estudiante_identificacion, Asistencia, Clase_numero, fecha) VALUES  ?';
                pool.query(query, [data] , function(err, rows, fields) {
                    if (err){res.status(500).json({status: '500', err: err});return;}
                    rows.data = post;
                    res.json(rows);
                });
            }
        });       
    }
}

function Usuario (pool) {

    this.login = function (req, res) {

        var post = req.body;

        // se validan todos los parametros requeridos
        if (!_.requiredList(post, ['usuario', 'pass'])) {
            res.status(400).json({status: '400'});return;
        };
      
        var query = 'SELECT id, usuario, rol, estado, email, facebook, twiter, nombre, apellido  FROM Usuario WHERE usuario = ? and pass = sha1(?)';
        
        pool.query(query, [post.usuario, post.pass] , function(err, rows, fields) {
            if (err){res.status(500).json({status: '500', err: err});return;}            

            if (!_.size(rows)) {
                res.status(400).json({status: '400', msg: 'Datos incorrectos'});return;
            };
            if (rows[0].estado != 0) {
                res.status(400).json({status: '400', msg: 'Usuario deshabilitado'});return;
            };
            res.json(rows);
        });
        
    }

    // function loginajax()
    // {
    //         $this->validacion_atributos();

    //         if ($this->form_validation->run()) {

    //             $row = $this->login_model->getUsuario();

    //             if (!$row) 
    //             {
    //                 $data['estado'] = 0;
    //                 $data['msj'] = 'Datos incorrectos';

    //                 echo json_encode($data);
                
    //             }
    //             elseif ($row['estado'] != 1) 
    //             {
    //                 $data['estado'] = 0;
    //                 $data['msj'] = 'Usuario deshabilitado';

    //                 echo json_encode($data);
    //             }
    //             else
    //             {
    //                 $this->sesion->set('autenticado', true);
    //                 $this->sesion->set('level', $row['rol']);
    //                 $this->sesion->set('usuario', $row['usuario']);
    //                 $this->sesion->set('id_usuario', $row['id']);
    //                 $this->sesion->set('tiempo', time());

    //                 // Se almacenan los datos de sesión
    //                 $this->login_model->setSesion($row['id']);
                    
    //                 $data['estado'] = 1;
    //                 $data['msj'] = site_url($row['rol']);
    //                 echo json_encode($data);
    //             }
    //         }
    //         else{
    //             $data['estado'] = 0;
    //             $data['msj'] = validation_errors();
    //             echo json_encode($data);
    //         }


    // }
}