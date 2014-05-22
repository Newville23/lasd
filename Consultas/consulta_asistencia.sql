-- Asistencia de una clase especifica de un dia especifico.
SELECT numero as claseID, Materia_id as materiaID, Profesor_identificacion, Clase.Curso_codigo, 
Matricula.Estudiante_identificacion, nombre, apellido, Asistencia.id as AsistenciaID, Asistencia, datetime_creacion, Observacion
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
where Clase.numero = '13775731636734635' and (cast(datetime_creacion  as date) = '2014-04-22' or datetime_creacion is null)
order by nombre, apellido


-- asistencia por rango de fecha falta group by

 SELECT * FROM Asistencia
	join (SELECT numero, Curso_codigo, nombre_curso, Clase.institucion_rut FROM Clase
			join Curso
			on Clase.Curso_codigo = Curso.codigo) as Clase
	on Asistencia.Clase_numero = Clase.numero
	where  institucion_rut = 10
	 and (fecha >=  '2014-04-01' and fecha <=  '2014-05-15')


-- Consolidado asistencia por grupo. 

SELECT curso, count(Si) as Si, count(Nop) as Nop
FROM (
	SELECT *, case when asistencia = 'si' then 1 end as Si, 
	case when asistencia = 'no' then 1 end as Nop
	FROM Asistencia
	join (SELECT numero, Curso_codigo, nombre_curso, concat(nombre_curso, 'º',indice) as curso, Clase.institucion_rut FROM Clase
			join Curso
			on Clase.Curso_codigo = Curso.codigo) as Clase
	on Asistencia.Clase_numero = Clase.numero
	where  institucion_rut = 100
	 and (fecha >=  '2014-04-01' and fecha <=  '2014-05-15')
 ) as tap
 GROUP BY curso