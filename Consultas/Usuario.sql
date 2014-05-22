SELECT * FROM Usuario as user
join Estudiante as estudiante
on user.id = estudiante.Usuario_id
join Matricula as matricula
on matricula.estudiante_identificacion = estudiante.identificacion
join Curso as curso
on matricula.Curso_codigo = curso.codigo
where nombre like '%VILORIA MORENO%'