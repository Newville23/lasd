var _ = require("underscore");

function Users(pool) {
	
	this.addUser = function (post, bcrypt, moment, callback) {

		var id = moment().format("X") + _.random(1345, 9999999);
        var password = "flugel_Init_password";                
        var salt = bcrypt.genSaltSync(); // Generate password hash
        var password_hash = bcrypt.hashSync(password, salt);

        var dataUser = {  
            "id" : id,
            "usuario" : post.usuario,
            "pass" : password_hash,
            "rol" : post.rol,
            "nombre" : post.nombre,
            "apellido" : post.apellido,
            "email" : post.email
		};

		var query = 'INSERT INTO Usuario SET ?';
		pool.query(query, [dataUser] , function(err, rows, fields) {
            "use strict";
            if (err){return callback(err, null);}
            rows.dataUser = dataUser;
            callback(null, rows);
        });
	}

	this.addStudent = function (post, dataUser, callback) {
		var data = {
            "identificacion": post.idestudiante,
            "tipo_identificacion": post.tipoidentificacion,
            "fecha_nacimiento": post.fechanacimiento,
            "tipo_sangre": post.tiposangre,
            "Usuario_id": dataUser.id,
            "Institucion_rut": post.id_institucion
        };

		var query = 'INSERT INTO Estudiante SET ?';
		pool.query(query, [data] , function(err, rows, fields) {
            "use strict";
            if (err){return callback(err, null);}
            callback(null, rows);
        });
	}

	this.addProfesor  = function (post, dataUser, callback) {
		var data = {
            "identificacion": post.idprofesor,
            "tipo_identificacion": post.tipoidentificacion,
            "profesion": post.profesion,
            "fecha_nacimiento": post.fechanacimiento,
            "Usuario_id": dataUser.id,
            "Institucion_rut": post.id_institucion
        };

        var query = 'INSERT INTO Profesor SET ?';
		pool.query(query, [data] , function(err, rows, fields) {
            "use strict";
            if (err){return callback(err, null);}
            callback(null, rows);
        });
	}

	this.checkField = function (fiel, fielName, tableName, callback) {
        "use strict";
        var query = "SELECT " + fielName + " FROM " + tableName + " WHERE " + fielName + " = ?";
        pool.query(query, [fiel], function (err, rows, fields) {
            "use strict";
            if (err) {return callback(err, null);}
            var sw = _.size(rows) ? 1 : 0;
            callback(null, sw);
        });
    }

    this.getDatoUser = function (usuario, callback) {
        "use strict";  

        var query = 'SELECT id AS id_usuario, usuario, identificacion, tipo_identificacion, rol, nombre, apellido, ' +
                        'profesion,  fecha_nacimiento, email, fecha_creacion, Institucion_rut, estado ' +
                    'FROM Profesor ' +
                    'JOIN Usuario ' +
                        'ON Profesor.Usuario_id = Usuario.id ' +
                    'WHERE usuario = ?';
        pool.query(query, [usuario], function(err, rows, fields) {                
            "use strict";
            if (err){
                return callback(err, null)
            }else if(!_.size(rows)) {
                var error = new Error("Sorry, that data does not exist");
                error.status = 404;
                return callback(error, null)
            }
            callback(null, rows[0]);
        });
    }

    this.getDataDocentes = function (idinstitucion, rol, callback) {
        "use strict";
        var query =  "SELECT id AS id_usuario, usuario, identificacion, tipo_identificacion, rol, nombre, apellido, " +
                        "profesion,  fecha_nacimiento, email, fecha_creacion, Institucion_rut, estado " +
                    "FROM Profesor " +
                    "JOIN Usuario " +
                        "ON Profesor.Usuario_id = Usuario.id " +
                    "WHERE 1 AND institucion_rut = ? and rol = ?";
        pool.query(query, [idinstitucion, rol], function(err, rows, fields) {
            "use strict";
            if (err){
                return callback(err, null)
            }
            callback(null, rows);
        });
    }

}

module.exports = Users;