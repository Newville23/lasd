SELECT numero as claseID, Materia_id as materiaID, Profesor_identificacion, Clase.Curso_codigo, 
Matricula.Estudiante_identificacion, nombre, apellido, Asistencia.id as AsistenciaID, Asistencia, datetime_log, Observacion
 FROM Clase
	join Matricula
	on Clase.Curso_codigo = Matricula.Curso_codigo
	
	left join Asistencia
	on Asistencia.Clase_numero = Clase.numero 
	and Matricula.Estudiante_identificacion = Asistencia.Estudiante_identificacion
	
	join (SELECT identificacion, nombre, apellido FROM Estudiante
			join Usuario
			on Usuario.id = Estudiante.Usuario_id) as EstudianteInfo
	on EstudianteInfo.identificacion = Matricula.Estudiante_identificacion
where Clase.numero = '13775731636734635' and (cast(datetime_log  as date) = '2014-04-22' or datetime_log is null)
order by nombre, apellido