-- Muestra información del docente

SELECT usuario, rol, estado, email, facebook, twiter, fecha_creacion, nombre, apellido, identificacion, tipo_identificacion, profesion,
			fecha_nacimiento, Profesor.institucion_rut
FROM Usuario as user
	join Profesor
		on user.id = Profesor.Usuario_id
where user.rol = 'profesor'
and Profesor.institucion_rut = 100
and (CONCAT(nombre, ' ', apellido) like '%10%' or identificacion like '%10%')

-- muestra los cursos y materias de un docente en particular
SELECT Profesor.identificacion, Materia.nombre as materia, Curso.nombre_curso, Curso.indice
FROM Profesor
	join Clase
		on Clase.Profesor_identificacion = Profesor.identificacion
	join Materia
		on Clase.Materia_id = Materia.id
	join Curso
		on Clase.Curso_codigo = Curso.codigo
where Profesor.institucion_rut = 100
and Profesor.identificacion = 1008