var crypto = require('crypto');

function Session (pool) {
    "use strict";
    
    this.startSession = function(req, user, callback) {
        "use strict";

        // Generate session id
        var current_date = (new Date()).valueOf().toString();
        var random = Math.random().toString();
        var id_session = crypto.createHash('sha1').update(current_date + random).digest('hex');

        // Insert session document
        var data = {id_session: id_session, 
                    ip_address: req.ip, 
                    usuario: user.usuario, 
                    user_agent: req.headers['user-agent'],
                    rol: user.rol};

        var query = 'INSERT INTO Sesion_temp SET ?';
        pool.query(query, [data] , function(err, rows, fields) {
            "use strict";
            if (err){return callback(err, null);}
            callback(null, id_session);
        });
    };

    this.endSession = function(id_session, callback) {
        "use strict";
        // Remove session document
        var query = 'DELETE FROM Sesion_temp WHERE id_session = ?';
        pool.query(query, [id_session] , function(err, rows, fields) {
            "use strict";
            callback(err);
        });
    };
}

module.exports = Session;