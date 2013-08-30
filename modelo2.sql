SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `lasd3` DEFAULT CHARACTER SET utf8 ;
USE `lasd3` ;

-- -----------------------------------------------------
-- Table `lasd3`.`Institucion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lasd3`.`Institucion` (
  `rut` BIGINT(20) NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `rector` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`rut`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lasd3`.`Materia`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lasd3`.`Materia` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `Institucion_rut` BIGINT(20) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Materia_Institucion1_idx` (`Institucion_rut` ASC) ,
  CONSTRAINT `fk_Materia_Institucion1`
    FOREIGN KEY (`Institucion_rut` )
    REFERENCES `lasd3`.`Institucion` (`rut` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lasd3`.`Usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lasd3`.`Usuario` (
  `id` VARCHAR(45) NOT NULL ,
  `usuario` VARCHAR(45) NOT NULL ,
  `pass` VARCHAR(45) NOT NULL ,
  `rol` VARCHAR(45) NOT NULL ,
  `estado` BIT(1) NOT NULL DEFAULT b'1' ,
  `email` VARCHAR(45) NOT NULL ,
  `facebook` VARCHAR(45) NULL DEFAULT NULL ,
  `twiter` VARCHAR(45) NULL DEFAULT NULL ,
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `nombre` VARCHAR(45) NOT NULL ,
  `apellido` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  UNIQUE INDEX `usuario_UNIQUE` (`usuario` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lasd3`.`Profesor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lasd3`.`Profesor` (
  `identificacion` BIGINT(20) NOT NULL ,
  `tipo_identificacion` VARCHAR(45) NOT NULL ,
  `profesion` VARCHAR(45) NULL DEFAULT NULL ,
  `fecha_nacimiento` DATE NULL DEFAULT NULL ,
  `Usuario_id` VARCHAR(45) NOT NULL ,
  `Institucion_rut` BIGINT(20) NOT NULL ,
  PRIMARY KEY (`identificacion`) ,
  UNIQUE INDEX `Usuario_id_UNIQUE` (`Usuario_id` ASC) ,
  INDEX `fk_Profesor_Usuario1_idx` (`Usuario_id` ASC) ,
  INDEX `fk_Profesor_Institucion1_idx` (`Institucion_rut` ASC) ,
  CONSTRAINT `fk_Profesor_Institucion1`
    FOREIGN KEY (`Institucion_rut` )
    REFERENCES `lasd3`.`Institucion` (`rut` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Profesor_Usuario1`
    FOREIGN KEY (`Usuario_id` )
    REFERENCES `lasd3`.`Usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lasd3`.`Curso`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lasd3`.`Curso` (
  `codigo` BIGINT(20) NOT NULL ,
  `nombre_curso` VARCHAR(45) NOT NULL ,
  `indice` VARCHAR(45) NOT NULL ,
  `Profesor_director_grupo_identificacion` BIGINT(20) NULL DEFAULT NULL ,
  `Institucion_rut` BIGINT(20) NOT NULL ,
  PRIMARY KEY (`codigo`, `Institucion_rut`) ,
  INDEX `fk_Curso_Profesor1_idx` (`Profesor_director_grupo_identificacion` ASC) ,
  INDEX `fk_Curso_Institucion1_idx` (`Institucion_rut` ASC) ,
  CONSTRAINT `fk_Curso_Profesor1`
    FOREIGN KEY (`Profesor_director_grupo_identificacion` )
    REFERENCES `lasd3`.`Profesor` (`identificacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Curso_Institucion1`
    FOREIGN KEY (`Institucion_rut` )
    REFERENCES `lasd3`.`Institucion` (`rut` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lasd3`.`Clase`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lasd3`.`Clase` (
  `numero` BIGINT(20) NOT NULL ,
  `Materia_id` BIGINT(20) NOT NULL ,
  `Profesor_identificacion` BIGINT(20) NOT NULL ,
  `Curso_codigo` BIGINT(20) NOT NULL ,
  `Institucion_rut` BIGINT(20) NOT NULL ,
  PRIMARY KEY (`numero`, `Materia_id`) ,
  INDEX `fk_Clase_Materia1_idx` (`Materia_id` ASC) ,
  INDEX `fk_Clase_Profesor1_idx` (`Profesor_identificacion` ASC) ,
  INDEX `fk_Clase_Curso1_idx` (`Curso_codigo` ASC, `Institucion_rut` ASC) ,
  CONSTRAINT `fk_Clase_Materia1`
    FOREIGN KEY (`Materia_id` )
    REFERENCES `lasd3`.`Materia` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Clase_Profesor1`
    FOREIGN KEY (`Profesor_identificacion` )
    REFERENCES `lasd3`.`Profesor` (`identificacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Clase_Curso1`
    FOREIGN KEY (`Curso_codigo` , `Institucion_rut` )
    REFERENCES `lasd3`.`Curso` (`codigo` , `Institucion_rut` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lasd3`.`Foro`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lasd3`.`Foro` (
  `id_time` VARCHAR(40) NOT NULL ,
  `titulo` TEXT NOT NULL ,
  `cuerpo` TEXT NOT NULL ,
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `puntos` INT(11) NOT NULL DEFAULT '0' ,
  `Clase_numero` BIGINT(20) NOT NULL ,
  `Materia_id` BIGINT(20) NOT NULL ,
  `Usuario_id` VARCHAR(45) NOT NULL ,
  `estado` TINYINT(4) NOT NULL DEFAULT '1' ,
  PRIMARY KEY (`id_time`, `Clase_numero`, `Materia_id`) ,
  INDEX `fk_Foro_Clase1_idx` (`Clase_numero` ASC, `Materia_id` ASC) ,
  INDEX `fk_Foro_Usuario1_idx` (`Usuario_id` ASC) ,
  CONSTRAINT `fk_Foro_Clase1`
    FOREIGN KEY (`Clase_numero` , `Materia_id` )
    REFERENCES `lasd3`.`Clase` (`numero` , `Materia_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Foro_Usuario1`
    FOREIGN KEY (`Usuario_id` )
    REFERENCES `lasd3`.`Usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lasd3`.`Comentario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lasd3`.`Comentario` (
  `id_time` VARCHAR(40) NOT NULL ,
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `puntos` INT(11) NOT NULL DEFAULT '0' ,
  `cuerpo` TEXT NOT NULL ,
  `Usuario_id` VARCHAR(45) NOT NULL ,
  `estado` TINYINT(4) NOT NULL DEFAULT '1' ,
  `Foro_id_time` VARCHAR(40) NOT NULL ,
  `Clase_numero` BIGINT(20) NOT NULL ,
  `Materia_id` BIGINT(20) NOT NULL ,
  PRIMARY KEY (`id_time`, `Foro_id_time`, `Clase_numero`, `Materia_id`) ,
  INDEX `fk_Comentario_Usuario1_idx` (`Usuario_id` ASC) ,
  INDEX `fk_Comentario_Foro1_idx` (`Foro_id_time` ASC, `Clase_numero` ASC, `Materia_id` ASC) ,
  CONSTRAINT `fk_Comentario_Foro1`
    FOREIGN KEY (`Foro_id_time` , `Clase_numero` , `Materia_id` )
    REFERENCES `lasd3`.`Foro` (`id_time` , `Clase_numero` , `Materia_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comentario_Usuario1`
    FOREIGN KEY (`Usuario_id` )
    REFERENCES `lasd3`.`Usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lasd3`.`Estudiante`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lasd3`.`Estudiante` (
  `identificacion` BIGINT(20) NOT NULL ,
  `tipo_identificacion` VARCHAR(45) NOT NULL ,
  `fecha_nacimiento` DATE NULL DEFAULT NULL ,
  `tipo_sangre` VARCHAR(10) NULL DEFAULT NULL ,
  `Usuario_id` VARCHAR(45) NOT NULL ,
  `Institucion_rut` BIGINT(20) NOT NULL ,
  PRIMARY KEY (`identificacion`) ,
  INDEX `fk_Estudiante_Institucion1_idx` (`Institucion_rut` ASC) ,
  INDEX `fk_Estudiante_Usuario` (`Usuario_id` ASC) ,
  CONSTRAINT `fk_Estudiante_Institucion1`
    FOREIGN KEY (`Institucion_rut` )
    REFERENCES `lasd3`.`Institucion` (`rut` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudiante_Usuario`
    FOREIGN KEY (`Usuario_id` )
    REFERENCES `lasd3`.`Usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lasd3`.`Matricula`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lasd3`.`Matricula` (
  `Estudiante_identificacion` BIGINT(20) NOT NULL ,
  `Curso_codigo` BIGINT(20) NOT NULL ,
  `year` YEAR NOT NULL ,
  PRIMARY KEY (`Estudiante_identificacion`, `Curso_codigo`, `year`) ,
  INDEX `fk_Estudiante_has_Curso_Curso1_idx` (`Curso_codigo` ASC) ,
  INDEX `fk_Estudiante_has_Curso_Estudiante1_idx` (`Estudiante_identificacion` ASC) ,
  CONSTRAINT `fk_Estudiante_has_Curso_Curso1`
    FOREIGN KEY (`Curso_codigo` )
    REFERENCES `lasd3`.`Curso` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudiante_has_Curso_Estudiante1`
    FOREIGN KEY (`Estudiante_identificacion` )
    REFERENCES `lasd3`.`Estudiante` (`identificacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lasd3`.`Sesion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lasd3`.`Sesion` (
  `session_id` VARCHAR(40) NOT NULL DEFAULT '0' ,
  `ip_address` VARCHAR(45) NOT NULL ,
  `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `Usuario_id` VARCHAR(45) NOT NULL ,
  `user_agent` TEXT NOT NULL ,
  PRIMARY KEY (`session_id`, `fecha`, `Usuario_id`) ,
  INDEX `fk_Sesion_Usuario1_idx` (`Usuario_id` ASC) ,
  CONSTRAINT `fk_Sesion_Usuario1`
    FOREIGN KEY (`Usuario_id` )
    REFERENCES `lasd3`.`Usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lasd3`.`SubComentario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lasd3`.`SubComentario` (
  `id_time_Sub` VARCHAR(40) NOT NULL ,
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `puntos` INT(11) NOT NULL DEFAULT '0' ,
  `cuerpo` TEXT NOT NULL ,
  `Usuario_id` VARCHAR(45) NOT NULL ,
  `estado` TINYINT(4) NOT NULL DEFAULT '1' ,
  `Comentario_id_time` VARCHAR(40) NOT NULL ,
  `Foro_id_time` VARCHAR(40) NOT NULL ,
  `Clase_numero` BIGINT(20) NOT NULL ,
  `Materia_id` BIGINT(20) NOT NULL ,
  PRIMARY KEY (`id_time_Sub`, `Comentario_id_time`, `Foro_id_time`, `Clase_numero`, `Materia_id`) ,
  INDEX `fk_SubComentario_Usuario1_idx` (`Usuario_id` ASC) ,
  INDEX `fk_SubComentario_Comentario1_idx` (`Comentario_id_time` ASC, `Foro_id_time` ASC, `Clase_numero` ASC, `Materia_id` ASC) ,
  CONSTRAINT `fk_SubComentario_Comentario1`
    FOREIGN KEY (`Comentario_id_time` , `Foro_id_time` , `Clase_numero` , `Materia_id` )
    REFERENCES `lasd3`.`Comentario` (`id_time` , `Foro_id_time` , `Clase_numero` , `Materia_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SubComentario_Usuario1`
    FOREIGN KEY (`Usuario_id` )
    REFERENCES `lasd3`.`Usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `lasd3`.`Calificacion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lasd3`.`Calificacion` (
  `id` BIGINT(20) NOT NULL ,
  `tipo_evaluacion` TEXT NULL ,
  `concepto` TEXT NULL ,
  `ponderacion` FLOAT NOT NULL ,
  `Clase_numero` BIGINT(20) NOT NULL ,
  `Clase_Materia_id` BIGINT(20) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Calificacion_Clase1_idx` (`Clase_numero` ASC, `Clase_Materia_id` ASC) ,
  CONSTRAINT `fk_Calificacion_Clase1`
    FOREIGN KEY (`Clase_numero` , `Clase_Materia_id` )
    REFERENCES `lasd3`.`Clase` (`numero` , `Materia_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `lasd3`.`Agregar_notas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `lasd3`.`Agregar_notas` (
  `Estudiante_identificacion` BIGINT(20) NOT NULL ,
  `Calificacion_id` BIGINT(20) NOT NULL ,
  `nota` FLOAT UNSIGNED NOT NULL ,
  `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`Estudiante_identificacion`, `Calificacion_id`) ,
  INDEX `fk_Estudiante_has_Calificacion_Calificacion1_idx` (`Calificacion_id` ASC) ,
  INDEX `fk_Estudiante_has_Calificacion_Estudiante1_idx` (`Estudiante_identificacion` ASC) ,
  CONSTRAINT `fk_Estudiante_has_Calificacion_Estudiante1`
    FOREIGN KEY (`Estudiante_identificacion` )
    REFERENCES `lasd3`.`Estudiante` (`identificacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudiante_has_Calificacion_Calificacion1`
    FOREIGN KEY (`Calificacion_id` )
    REFERENCES `lasd3`.`Calificacion` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

USE `lasd3` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
