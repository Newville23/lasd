var moment = require('moment');
var bodyParser = require('body-parser');
var packageJson = require('../package.json');
var bcrypt = require('bcrypt');
var cookieParser = require('cookie-parser');
var SessionHandler = require('./session');
var UserModel = require('../models/users');
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
    app.use(bodyParser.urlencoded({ extended: false }));
    app.use(cookieParser());

    var version = '/' + packageJson.version;

    var usuario = new Usuario(pool);
    app.use(usuario.isLoggedInMiddleware);

    var contenido = new Contenido(pool);
    var estudiante = new Estudiante(pool);
    var docente = new Docente(pool);


    //---------- Manejo de sesiones --------------------------
    app.post(version + '/usuario/login.json', usuario.login);
    app.get(version + '/usuario/login.json', usuario.getlogin);

    app.post(version + '/usuario/logout.json', usuario.logout);

    app.get(version + '/usuario/checkuser', estudiante.checkUser);
    app.get(version + '/usuario/checkemail', estudiante.checkEmail);
    app.get(version + '/usuario/checkidestudiante', estudiante.checkidEstudiante);
    //---------- Fin manejo de sesiones ----------------------


    // ----------- Api para módulo de coordinadores ----------------
    app.get(version + '/coordinador/estudiante.json', estudiante.getEstudiantesByCurso);
    app.post(version + '/coordinador/estudiante.json', estudiante.postEstudiantes);

    app.get(version + '/coordinador/profesor.json', docente.getProfesores);
    app.post(version + '/coordinador/profesor.json', docente.postProfesor);
    // ----------- Fin para módulo de coordinadores ----------------


    // ----------- Api para módulo de docentes ----------------
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

    app.get(version + '/docente/asistencia.json', estudiante.getAsistencia);
    app.post(version + '/docente/asistencia.json', estudiante.postAsistencia);

    app.get(version + '/docente/datos.json', usuario.datos);
    app.get(version + '/docente/listaclases.json', docente.listaClases);
    // ----------- Fin Api para módulo de docentes ----------------

    // Error handling middleware
    app.use(function(err, req, res, next){
        "use strict";
        console.error(err);
        console.error(err.stack);
        res.status(500).json({ error: err });
    });
}

function Usuario (pool) {
    "use strict";
    var session = new SessionHandler(pool);
    var userModel = new UserModel(pool);
    var usuarioThis = this;

    this.login = function (req, res, next) {
        "use strict";
        var post = req.body;

        // se validan todos los parametros requeridos
        if(!_.requiredList(post, ['usuario', 'pass'])) {
            return res.status(400).json({status: '400'});
        };

        // valida que no exista sesiones
        if(req.session.user){
            if (req.session.user.usuario == post.usuario) {
                return res.json({usuario: req.session.user.usuario, login: true, msg: 'sesión iniciada'});
            }
        }

        // Consulta la base de datos y valida que sea el usuario y contraseña correctos, retorna el objeto usuario
        usuarioThis.validateLogin(post.usuario, post.pass, function(err, usuario){
            if (err){
                if (err.noUsuario) {
                    return res.status(400).json({status: '400', err: err});
                }else if(err.usuarioDeshabilitado){
                    return res.status(400).json({status: '400', err: err});
                }else if(err.invalid_password){
                    return res.status(400).json({status: '400', err: err});
                }else{
                    return next(err); // otro tipo de error
                }
            }
            // Genera una id_session sha1 e inserta en bd los datos de sesion
            session.startSession(req, usuario, function(err, id_session){
                "use strict";
                if (err) return next(err);
                res.cookie('session', id_session);
                return res.json({usuario: usuario.usuario, login: true});
            })
        });
    };

    this.getlogin = function(req, res) {
        if (req.session.err) {
            return res.status(500).json(req.session);
        }
        res.json(req.session);
    }

    this.logout = function(req, res, next){
        "use strict";

        var id_session = req.cookies.session;

        if (!id_session) {
            return res.json({login: false, msg: 'Session not set'});
        }
        session.endSession(id_session, function (err) {
            "use strict";

            res.clearCookie('session');
            return res.json({login: false, msg: 'Session has been closed'});
        });
    };

    this.validateLogin = function (usuario, pass, callback) {
        "use strict";

        function validateUserDoc(err, rows, fields) {
            "use strict";

            if (err) return callback(err, null);

            if (!_.size(rows[0])) {
                var errorNoUsuario = new Error("Usuario: " + usuario + " no existe");
                errorNoUsuario.noUsuario = true;
                callback(errorNoUsuario, null);
                return;
            }
            if (rows[0].estado != 1) {
                var errorUsuarioDeshabilitado = new Error("Usuario deshabilitado");
                errorUsuarioDeshabilitado.usuarioDeshabilitado = true;
                callback(errorUsuarioDeshabilitado, null);
                return;
            }
            if (bcrypt.compareSync(pass, rows[0].pass)) {
                callback(null, rows[0]);
            }else{
                var invalidPasswordRrror = new Error("Invalid password");
                invalidPasswordRrror.invalid_password = true;
                callback(invalidPasswordRrror, null);
            }
        };
        var query = 'SELECT * FROM Usuario WHERE usuario = ?';
        pool.query(query, [usuario] , validateUserDoc);
    };

    // Vaida que exista la sesion, si no arroja un error en req.session.err
    this.isLoggedInMiddleware = function(req, res, next) {
        "use strict";
        req.session = {};
        var id_session = req.cookies.session;

        if (!id_session) {
            req.session.msg = "Session not set";
            req.session.login = false;
            return next();
        }

        var query = 'SELECT * FROM Sesion_temp WHERE id_session = ?';
        pool.query(query, [id_session] , function(err, rows, fields) {
            "use strict";
            if (err){
                req.session.err = err; return next();
            } if (!_.size(rows)) {
                res.clearCookie('session');
                req.session.msg = "Session: " + id_session + " does not exist";
                req.session.login = false;
                return next();
            }

            req.session.user = rows[0];

            userModel.getDatoUser(req.session.user.usuario, function(err, data){
                if (err) {req.session.err = err; return next();}
                req.session.userData = data;
                req.session.login = true;
                return next();
            });

        });
    };

    this.datos = function (req, res) {
        "use strict";
        if(!req.session.user){
            return res.status(400).json({"errors":[{"code":215,"message":"Bad Authentication data."}]});
        }
        var usuario = req.session.user.usuario;
        userModel.getDatoUser(usuario, function(err, data){
                if (err) {
                    console.log(err);
                }
                return res.json(data);
        });
    }

    this.insertDatos = function (data, callback) {}
}

function Docente (pool) {
    var userModel = new UserModel(pool);

    this.listaClases = function(req, res){

        var id_profesor = req.query.idprofesor;
        if (!id_profesor) {
            return res.status(400).json({error: '400'});
        }

        if(!req.session.user){
            return res.status(400).json({"errors":[{"code":215,"message":"Bad Authentication data."}]});
        }/*else if (req.session.user.usuario != usuario) {
            return res.status(403).json({"errors":[{"code":215,"message":"Sorry, you are not authorized to see this."}]});
        };*/

        var query = 'SELECT numero AS id_clase, Materia_id AS id_materia, Profesor_identificacion AS id_profesor, codigo as id_curso, ' +
                    'Clase.Institucion_rut AS id_institucion, nombre AS materia, nombre_curso, indice, ' +
                    'Profesor_director_grupo_identificacion AS id_profesor_grupo ' +
                    'FROM lasd3.Clase ' +
                    'JOIN Materia ON Materia.id = Clase.Materia_id ' +
                    'JOIN Curso ON Curso.codigo = Clase.Curso_codigo ' +
                    'WHERE Profesor_identificacion = ?';

        pool.query(query, [id_profesor], function(err, rows, fields) {

            if (err){
                return res.status(500).json({error: '500', err: err});
            }
            return res.json(rows);
        });
    }

    this.getProfesores = function (req, res) {

        if(!req.session.userData){
            return res.status(400).json({"errors":[{"code":215,"message":"Bad Authentication data."}]});
        }else if(req.session.userData.rol != "admin"){
            return res.status(400).json({"errors":[{"code":215,"message":"Bad Authentication data."}]});
        }

        var institucion_rut = req.session.userData.Institucion_rut;
        var rol = 'profesor';

        userModel.getDataDocentes(institucion_rut, rol, function (err, rows) {
            if (err) {
                return res.status(500).json({error: '500', err: err});
            }
            return res.json(rows);
        })
    }

    this.postProfesor = function (req, res) {
        "use strict";
        if(!req.session.userData){
            return res.status(400).json({"errors":[{"code":215,"message":"Bad Authentication data."}]});
        }else if(req.session.userData.rol != "admin"){
            return res.status(400).json({"errors":[{"code":215,"message":"Bad Authentication data."}]});
        }

        var post = req.body;
        post.id_institucion = req.session.userData.Institucion_rut;

        if (!_.requiredList(post, ['usuario', 'rol', 'nombre', 'apellido', 'idprofesor', 'tipoidentificacion'])) {
            return res.status(400).json({status: '400', msg: "faltan datos requeridos"});
        };

         //verificar usuario, si el usuario existe...
        var fielName = 'usuario', tableName = 'Usuario';
        userModel.checkField(post.usuario, fielName, tableName, function (err, sw) {
            if (err) {return res.status(500)}
            if (sw) { return res.status(409).json({"errors":[{"code":10, "message":"username already taken"}]}); }

             // vericar Email
            var fielName = 'email', tableName = 'Usuario';
            userModel.checkField(post.email, fielName, tableName, function (err, sw) {
                if (err) {return res.status(500)};
                if (sw) { return res.status(409).json({"errors":[{"code":11, "message":"email already exist"}]})};

                // vericar id profesor
                var fielName = 'identificacion', tableName = 'Profesor';
                userModel.checkField(post.idestudiante, fielName, tableName, function (err, sw) {
                    if (err) {return res.status(500)};
                    if (sw) { return res.status(409).json({"errors":[{"code":12, "message":"teacher already exist"}]})};

                    // Insertar en la tabla usuario ------------------
                    userModel.addUser(post, bcrypt, moment, function (err, rows) {
                        if (err) {return res.status(500).json(err)};

                        // Insetar tabla estudiante -----------------------
                        userModel.addProfesor(post, rows.dataUser, function (err, rows) {
                            if (err) {return res.status(500).json(err)};
                            return res.json(rows);
                        });

                    });
                });

            });
        });
    }
}

function Contenido (pool) {
    // Devuelve los datos de indicadores de logros y las calificaciones de los estudiantes, de una clase especifica.
    this.getContenido = function(req, res) {
        "use strict";

        //var Clase_numero = pool.escape(req.query.clasenumero);
        var id_clase = req.query.idclase ? pool.escape(req.query.idclase) : null;
        var periodo = req.query.periodo ? 'AND periodo = ' + pool.escape(req.query.periodo) : '';
        var id = req.query.id ? 'AND id = ' + pool.escape(req.query.id) : '';
        var data = {};

        if (id_clase) {

            var contenidoIndicadoresQuery = "SELECT id AS id_indicador, CAST(Clase_numero AS CHAR) id_clase, contenido, periodo, estado, " +
            "fecha_vencimiento, datetime_creacion, datetime_modificacion " +
            "FROM lasd3.Clase_indicador WHERE Clase_numero = " + id_clase + ' ' + id + ' ' + periodo;

            pool.query(contenidoIndicadoresQuery, function(err, rows, fields) {
                if (err){
                    return res.status(500).json({status: '500', err: err});
                }
                return res.json(rows);
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

        var id_indicador = req.query.idindicador;

        if (!id_indicador) {
            return res.status(400).json({status: '400', msg: "Falta especificar parametros GET"});
        };

        post.datetime_modificacion = moment().format('YYYY-MM-DD h:mm:ss');

        // var data = {
        //     "contenido": post.contenido,
        //     "periodo": post.periodo,
        //     "fecha_vencimiento": post.fechavencimiento,
        //     "datetime_modificacion" : moment().format('YYYY-MM-DD h:mm:ss');
        // }

        query = pool.query('UPDATE Clase_indicador SET ? WHERE id = ?', [post, id_indicador] , function(err, rows, fields) {
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
                          "Matricula.Estudiante_identificacion as id_estudiante, nombre, apellido, tipo_evaluacion, nota, " +
                          "fecha AS fecha_creacion_nota, concepto, ponderacion " +
                          "FROM Calificacion " +
                          "JOIN Clase ON Clase.numero = Calificacion.Clase_numero " +
                          "JOIN Matricula ON Clase.Curso_codigo = Matricula.Curso_codigo " +
                          "JOIN Estudiante ON Estudiante.identificacion = Matricula.Estudiante_identificacion " +
                          "JOIN Usuario ON Usuario.id = Estudiante.Usuario_id " +
                          "LEFT JOIN Agregar_notas ON Agregar_notas.Calificacion_id = Calificacion.id " +
                                  "AND Agregar_notas.Estudiante_identificacion = Matricula.Estudiante_identificacion " +
                      "WHERE 1 ";

        if (id_clase || id_calificacion) {
            var where = id_clase + ' ' + id_indicador + ' ' + id_calificacion + ' ' + id_estudiante;
            var query = notasQuery + where;

            pool.query(query, function(err, rows, fields) {
                if (err){
                    return res.status(500).json({status: '500', err: err});
                }
                return res.json(rows);
            });

        }else{
            return res.status(400).json({status: '400', msg: "Falta especificar parametros GET"});
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

    var userModel = new UserModel(pool);

    var estudianteThis = this;

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
                    "WHERE Clase.numero = " + id_clase;

        if (id_clase) {
            pool.query(query, function(err, rows, fields) {
                if (err){
                    return res.status(500).json({error: '500'});
                }
                return res.json(rows);
            });
        }else{
            return res.status(400).json({status: '400'});
        }
    }

    this.getEstudiantesByCurso = function (req, res) {
        "use strict";
        if(!req.session.userData){
            return res.status(400).json({"errors":[{"code":215,"message":"Bad Authentication data."}]});
        }

        var id_institucion = req.session.userData.Institucion_rut;

        var Curso_codigo = req.query.cursocodigo ? 'AND Curso_codigo = ' + pool.escape(req.query.cursocodigo) : '';
        var id_estudiante = req.query.idestudiante ? 'AND Estudiante_identificacion = ' + pool.escape(req.query.idestudiante) : '';

        var query = "SELECT Estudiante_identificacion AS id_estudiante, tipo_identificacion, usuario, nombre, apellido, rol, fecha_nacimiento, " +
                        "email, tipo_sangre, Curso_codigo AS id_curso, Institucion_rut AS id_institucion, year, fecha_creacion " +
                        "FROM lasd3.Matricula " +
                        "JOIN lasd3.Estudiante " +
                        "ON Estudiante.identificacion = Matricula.Estudiante_identificacion " +
                        "JOIN lasd3.Usuario " +
                        "ON Usuario.id = Estudiante.Usuario_id " +
                        "WHERE Institucion_rut = "+ id_institucion + " " + Curso_codigo + " " + id_estudiante;

        pool.query(query, function(err, rows, fields) {
            if (err){
                return res.status(500).json({error: '500'});
            }
            return res.json(rows);
        });
    }

    this.postEstudiantes = function (req, res) {
        "use strict";
        if(!req.session.userData){
            return res.status(400).json({"errors":[{"code":215,"message":"Bad Authentication data."}]});
        }

        var post = req.body;
        post.id_institucion = req.session.userData.Institucion_rut;

        if (!_.requiredList(post, ['usuario', 'rol', 'nombre', 'apellido', 'idestudiante', 'tipoidentificacion'])) {
            return res.status(400).json({status: '400', msg: "faltan datos requeridos"});
        };

        //verificar usuario, si el usuario existe...
        var fielName = 'usuario', tableName = 'Usuario';
        userModel.checkField(post.usuario, fielName, tableName, function (err, sw) {
            if (err) {return res.status(500)}
            if (sw) { return res.status(409).json({"errors":[{"code":10, "message":"username already taken"}]}); }

             // vericar Email
            var fielName = 'email', tableName = 'Usuario';
            userModel.checkField(post.email, fielName, tableName, function (err, sw) {
                if (err) {return res.status(500)};
                if (sw) { return res.status(409).json({"errors":[{"code":11, "message":"email already exist"}]})};

                // vericar id estudiante
                var fielName = 'identificacion', tableName = 'Estudiante';
                userModel.checkField(post.idestudiante, fielName, tableName, function (err, sw) {
                    if (err) {return res.status(500)};
                    if (sw) { return res.status(409).json({"errors":[{"code":12, "message":"student already exist"}]})};

                    // Insertar en la tabla usuario ------------------
                    userModel.addUser(post, bcrypt, moment, function (err, rows) {
                        if (err) {return res.status(500).json(err)};

                        // Insetar tabla estudiante -----------------------
                        userModel.addStudent(post, rows.dataUser, function (err, rows) {
                            if (err) {return res.status(500).json(err)};
                            return res.json(rows);
                        });

                    });
                });
            });
        });
    }

    this.getAsistencia = function(req, res){
        'use strict';
        var fecha_inicial = req.query.fechainicial || null;
        var fecha_final = req.query.fechafinal || null;
        var id_clase = req.query.idclase || null;
        var mes = req.query.mes || null;

        if (!id_clase) {
            return res.status(400).json({status: '400', msg: "Falta especificar parametros GET"});
        };
        if (mes) {
            var query = "SELECT * FROM lasd3.Asistencia where Clase_numero = ? and year(fecha) = year(curdate()) and month(fecha) = ?"
            pool.query(query, [id_clase, mes] , function(err, rows, fields) {
                if (err){ return res.status(500).json({status: '500', err: err}) }
                res.json(rows);
            });

        }else if (fecha_inicial && fecha_final) {
            var query = "SELECT * FROM Asistencia where Clase_numero = ? and cast(datetime_creacion as date) BETWEEN ? AND ?";
            pool.query(query, [id_clase, fecha_inicial, fecha_final] , function(err, rows, fields) {
                if (err){ return res.status(500).json({status: '500', err: err}) }
                res.json(rows);
            });
        }else{
            return res.status(400).json({status: '400', msg: "Falta especificar parametros GET"});
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
        }

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

    this.checkUser = function(req, res){
        var fiel = req.query.usuario;
        if (!fiel) {return res.status(400).json({status: '400'});}

        var fielName = 'usuario', tableName = 'Usuario';
        userModel.checkField(fiel, fielName, tableName, function (err, sw) {
            if (err) {return res.status(500)};
            res.json(sw);
        });
    }
    this.checkEmail = function (req, res) {
        var fiel = req.query.email;
        if (!fiel) {return res.status(400).json({status: '400'});}

        var fielName = 'email', tableName = 'Usuario';
        userModel.checkField(fiel, fielName, tableName, function (err, sw) {
            if (err) {return res.status(500)};
            res.json(sw);
        });
    }

    this.checkidEstudiante = function (req, res) {
        var fiel = req.query.idestudiante;
        if (!fiel) {return res.status(400).json({status: '400'});}

        var fielName = 'identificacion', tableName = 'Estudiante';
        userModel.checkField(fiel, fielName, tableName, function (err, sw) {
            if (err) {return res.status(500)};
            res.json(sw);
        });
    }

}
