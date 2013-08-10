SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `default_schema` ;
USE `default_schema` ;

-- -----------------------------------------------------
-- Table `default_schema`.`Institucion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`Institucion` (
  `rut` INT(11) NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `rector` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`rut`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `default_schema`.`Usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`Usuario` (
  `id` INT(15) NOT NULL ,
  `usuario` VARCHAR(45) NOT NULL ,
  `pass` VARCHAR(45) NOT NULL ,
  `rol` VARCHAR(45) NOT NULL ,
  `estado` BIT(1) NOT NULL DEFAULT b'1' ,
  `email` VARCHAR(45) NOT NULL ,
  `facebook` VARCHAR(45) NULL DEFAULT NULL ,
  `twiter` VARCHAR(45) NULL DEFAULT NULL ,
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  UNIQUE INDEX `usuario_UNIQUE` (`usuario` ASC) ,
  UNIQUE INDEX `facebook_UNIQUE` (`facebook` ASC) ,
  UNIQUE INDEX `twiter_UNIQUE` (`twiter` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `default_schema`.`Estudiante`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`Estudiante` (
  `identificacion` INT(15) NOT NULL ,
  `tipo_identificacion` VARCHAR(45) NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `apellido` VARCHAR(45) NOT NULL ,
  `fecha_nacimiento` DATE NULL DEFAULT NULL ,
  `tipo_sangre` VARCHAR(10) NULL DEFAULT NULL ,
  `Usuario_id` INT(15) NOT NULL ,
  `Institucion_rut` INT(11) NOT NULL ,
  PRIMARY KEY (`identificacion`) ,
  INDEX `fk_Estudiante_Institucion1_idx` (`Institucion_rut` ASC) ,
  INDEX `fk_Estudiante_Usuario` (`Usuario_id` ASC) ,
  CONSTRAINT `fk_Estudiante_Institucion1`
    FOREIGN KEY (`Institucion_rut` )
    REFERENCES `default_schema`.`Institucion` (`rut` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudiante_Usuario`
    FOREIGN KEY (`Usuario_id` )
    REFERENCES `default_schema`.`Usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `default_schema`.`Profesor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`Profesor` (
  `identificacion` INT(15) NOT NULL ,
  `tipo_identificacion` VARCHAR(45) NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `profesion` VARCHAR(45) NULL DEFAULT NULL ,
  `fecha_nacimiento` DATE NULL DEFAULT NULL ,
  `Usuario_id` INT(15) NOT NULL ,
  `Institucion_rut` INT(11) NOT NULL ,
  PRIMARY KEY (`identificacion`) ,
  UNIQUE INDEX `Usuario_id_UNIQUE` (`Usuario_id` ASC) ,
  INDEX `fk_Profesor_Usuario1_idx` (`Usuario_id` ASC) ,
  INDEX `fk_Profesor_Institucion1_idx` (`Institucion_rut` ASC) ,
  CONSTRAINT `fk_Profesor_Institucion1`
    FOREIGN KEY (`Institucion_rut` )
    REFERENCES `default_schema`.`Institucion` (`rut` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Profesor_Usuario1`
    FOREIGN KEY (`Usuario_id` )
    REFERENCES `default_schema`.`Usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `default_schema`.`Curso`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`Curso` (
  `codigo` INT(15) NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `Profesor_derector_grupo_identificacion` INT(15) NULL DEFAULT NULL ,
  PRIMARY KEY (`codigo`) ,
  INDEX `fk_Curso_Profesor1_idx` (`Profesor_derector_grupo_identificacion` ASC) ,
  CONSTRAINT `fk_Curso_Profesor1`
    FOREIGN KEY (`Profesor_derector_grupo_identificacion` )
    REFERENCES `default_schema`.`Profesor` (`identificacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `default_schema`.`Materia`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`Materia` (
  `id` INT(10) NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `year` YEAR NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `default_schema`.`Clase`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`Clase` (
  `numero` INT(15) NOT NULL ,
  `Materia_id` INT(11) NOT NULL ,
  `Profesor_identificacion` INT(15) NOT NULL ,
  `Curso_codigo` INT(15) NOT NULL ,
  PRIMARY KEY (`numero`, `Materia_id`) ,
  INDEX `fk_Clase_Materia1_idx` (`Materia_id` ASC) ,
  INDEX `fk_Clase_Profesor1_idx` (`Profesor_identificacion` ASC) ,
  INDEX `fk_Clase_Curso1_idx` (`Curso_codigo` ASC) ,
  CONSTRAINT `fk_Clase_Curso1`
    FOREIGN KEY (`Curso_codigo` )
    REFERENCES `default_schema`.`Curso` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Clase_Materia1`
    FOREIGN KEY (`Materia_id` )
    REFERENCES `default_schema`.`Materia` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Clase_Profesor1`
    FOREIGN KEY (`Profesor_identificacion` )
    REFERENCES `default_schema`.`Profesor` (`identificacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `default_schema`.`Calificacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`Calificacion` (
  `id` INT(15) NOT NULL ,
  `tipo_evaluacion` TEXT NULL DEFAULT NULL ,
  `concepto` TEXT NULL DEFAULT NULL ,
  `ponderacion` FLOAT NOT NULL ,
  `Clase_numero` INT(15) NOT NULL ,
  `Clase_Materia_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Calificacion_Clase1_idx` (`Clase_numero` ASC, `Clase_Materia_id` ASC) ,
  CONSTRAINT `fk_Calificacion_Clase1`
    FOREIGN KEY (`Clase_numero` , `Clase_Materia_id` )
    REFERENCES `default_schema`.`Clase` (`numero` , `Materia_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `default_schema`.`Agregar_notas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`Agregar_notas` (
  `Estudiante_identificacion` INT(15) NOT NULL ,
  `Calificacion_id` INT(15) NOT NULL ,
  `nota` FLOAT UNSIGNED NOT NULL ,
  `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`Estudiante_identificacion`, `Calificacion_id`) ,
  INDEX `fk_Estudiante_has_Calificacion_Calificacion1_idx` (`Calificacion_id` ASC) ,
  INDEX `fk_Estudiante_has_Calificacion_Estudiante1_idx` (`Estudiante_identificacion` ASC) ,
  CONSTRAINT `fk_Estudiante_has_Calificacion_Estudiante1`
    FOREIGN KEY (`Estudiante_identificacion` )
    REFERENCES `default_schema`.`Estudiante` (`identificacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudiante_has_Calificacion_Calificacion1`
    FOREIGN KEY (`Calificacion_id` )
    REFERENCES `default_schema`.`Calificacion` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `default_schema`.`Foro`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`Foro` (
  `id_time` VARCHAR(40) NOT NULL ,
  `titulo` TEXT NOT NULL ,
  `cuerpo` TEXT NOT NULL ,
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `puntos` INT(11) NOT NULL DEFAULT '0' ,
  `Clase_numero` INT(15) NOT NULL ,
  `Materia_id` INT(11) NOT NULL ,
  `Usuario_id` INT(15) NOT NULL ,
  `estado` TINYINT(4) NOT NULL DEFAULT '1' ,
  PRIMARY KEY (`id_time`, `Clase_numero`, `Materia_id`) ,
  INDEX `fk_Foro_Clase1_idx` (`Clase_numero` ASC, `Materia_id` ASC) ,
  INDEX `fk_Foro_Usuario1_idx` (`Usuario_id` ASC) ,
  CONSTRAINT `fk_Foro_Clase1`
    FOREIGN KEY (`Clase_numero` , `Materia_id` )
    REFERENCES `default_schema`.`Clase` (`numero` , `Materia_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Foro_Usuario1`
    FOREIGN KEY (`Usuario_id` )
    REFERENCES `default_schema`.`Usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `default_schema`.`Comentario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`Comentario` (
  `id_time` VARCHAR(40) NOT NULL ,
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `puntos` INT(11) NOT NULL DEFAULT '0' ,
  `cuerpo` TEXT NOT NULL ,
  `Usuario_id` INT(15) NOT NULL ,
  `estado` TINYINT(4) NOT NULL DEFAULT '1' ,
  `Foro_id_time` VARCHAR(40) NOT NULL ,
  `Clase_numero` INT(15) NOT NULL ,
  `Materia_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id_time`, `Foro_id_time`, `Clase_numero`, `Materia_id`) ,
  INDEX `fk_Comentario_Usuario1_idx` (`Usuario_id` ASC) ,
  INDEX `fk_Comentario_Foro1_idx` (`Foro_id_time` ASC, `Clase_numero` ASC, `Materia_id` ASC) ,
  CONSTRAINT `fk_Comentario_Foro1`
    FOREIGN KEY (`Foro_id_time` , `Clase_numero` , `Materia_id` )
    REFERENCES `default_schema`.`Foro` (`id_time` , `Clase_numero` , `Materia_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comentario_Usuario1`
    FOREIGN KEY (`Usuario_id` )
    REFERENCES `default_schema`.`Usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `default_schema`.`Matricula`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`Matricula` (
  `Estudiante_identificacion` INT(15) NOT NULL ,
  `Curso_codigo` INT(15) NOT NULL ,
  `year` YEAR NOT NULL ,
  PRIMARY KEY (`Estudiante_identificacion`, `Curso_codigo`, `year`) ,
  INDEX `fk_Estudiante_has_Curso_Curso1_idx` (`Curso_codigo` ASC) ,
  INDEX `fk_Estudiante_has_Curso_Estudiante1_idx` (`Estudiante_identificacion` ASC) ,
  CONSTRAINT `fk_Estudiante_has_Curso_Curso1`
    FOREIGN KEY (`Curso_codigo` )
    REFERENCES `default_schema`.`Curso` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudiante_has_Curso_Estudiante1`
    FOREIGN KEY (`Estudiante_identificacion` )
    REFERENCES `default_schema`.`Estudiante` (`identificacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `default_schema`.`Sesion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`Sesion` (
  `session_id` VARCHAR(40) NOT NULL DEFAULT '0' ,
  `ip_address` VARCHAR(45) NOT NULL ,
  `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `Usuario_id` INT(15) NOT NULL ,
  `user_agent` TEXT NOT NULL ,
  PRIMARY KEY (`session_id`, `fecha`, `Usuario_id`) ,
  INDEX `fk_Sesion_Usuario1_idx` (`Usuario_id` ASC) ,
  CONSTRAINT `fk_Sesion_Usuario1`
    FOREIGN KEY (`Usuario_id` )
    REFERENCES `default_schema`.`Usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `default_schema`.`SubComentario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `default_schema`.`SubComentario` (
  `id_time_Sub` VARCHAR(40) NOT NULL ,
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `puntos` INT(11) NOT NULL DEFAULT '0' ,
  `cuerpo` TEXT NOT NULL ,
  `Usuario_id` INT(15) NOT NULL ,
  `estado` TINYINT(4) NOT NULL DEFAULT '1' ,
  `Comentario_id_time` VARCHAR(40) NOT NULL ,
  `Foro_id_time` VARCHAR(40) NOT NULL ,
  `Clase_numero` INT(15) NOT NULL ,
  `Materia_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id_time_Sub`, `Comentario_id_time`, `Foro_id_time`, `Clase_numero`, `Materia_id`) ,
  INDEX `fk_SubComentario_Usuario1_idx` (`Usuario_id` ASC) ,
  INDEX `fk_SubComentario_Comentario1_idx` (`Comentario_id_time` ASC, `Foro_id_time` ASC, `Clase_numero` ASC, `Materia_id` ASC) ,
  CONSTRAINT `fk_SubComentario_Comentario1`
    FOREIGN KEY (`Comentario_id_time` , `Foro_id_time` , `Clase_numero` , `Materia_id` )
    REFERENCES `default_schema`.`Comentario` (`id_time` , `Foro_id_time` , `Clase_numero` , `Materia_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SubComentario_Usuario1`
    FOREIGN KEY (`Usuario_id` )
    REFERENCES `default_schema`.`Usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

USE `default_schema` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
