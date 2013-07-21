SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `modelo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `modelo` ;

-- -----------------------------------------------------
-- Table `modelo`.`Usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `modelo`.`Usuario` (
  `id` INT(15) NOT NULL ,
  `usuario` VARCHAR(45) NOT NULL ,
  `pass` VARCHAR(45) NOT NULL ,
  `rol` VARCHAR(45) NOT NULL ,
  `estado` BIT NOT NULL DEFAULT b'1' ,
  `email` VARCHAR(45) NOT NULL ,
  `facebook` VARCHAR(45) NULL ,
  `twiter` VARCHAR(45) NULL ,
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modelo`.`Institucion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `modelo`.`Institucion` (
  `rut` INT NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `rector` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`rut`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modelo`.`Estudiante`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `modelo`.`Estudiante` (
  `identificacion` INT(15) NOT NULL ,
  `tipo_identificacion` VARCHAR(45) NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `apellido` VARCHAR(45) NOT NULL ,
  `fecha_nacimiento` TIMESTAMP NULL ,
  `tipo_sangre` VARCHAR(10) NULL ,
  `Usuario_id` INT(15) NOT NULL ,
  `Institucion_rut` INT NOT NULL ,
  PRIMARY KEY (`identificacion`) ,
  INDEX `fk_Estudiante_Institucion1_idx` (`Institucion_rut` ASC) ,
  CONSTRAINT `fk_Estudiante_Usuario`
    FOREIGN KEY (`Usuario_id` )
    REFERENCES `modelo`.`Usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudiante_Institucion1`
    FOREIGN KEY (`Institucion_rut` )
    REFERENCES `modelo`.`Institucion` (`rut` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modelo`.`Profesor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `modelo`.`Profesor` (
  `identificacion` INT(15) NOT NULL ,
  `tipo_identificacion` VARCHAR(45) NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `profesion` VARCHAR(45) NULL ,
  `fecha_nacimiento` TIMESTAMP NULL ,
  `Usuario_id` INT(15) NOT NULL ,
  `Institucion_rut` INT NOT NULL ,
  PRIMARY KEY (`identificacion`) ,
  INDEX `fk_Profesor_Usuario1_idx` (`Usuario_id` ASC) ,
  INDEX `fk_Profesor_Institucion1_idx` (`Institucion_rut` ASC) ,
  CONSTRAINT `fk_Profesor_Usuario1`
    FOREIGN KEY (`Usuario_id` )
    REFERENCES `modelo`.`Usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Profesor_Institucion1`
    FOREIGN KEY (`Institucion_rut` )
    REFERENCES `modelo`.`Institucion` (`rut` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modelo`.`Curso`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `modelo`.`Curso` (
  `codigo` INT(15) NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `Profesor_derector_grupo_identificacion` INT(15) NOT NULL ,
  PRIMARY KEY (`codigo`) ,
  INDEX `fk_Curso_Profesor1_idx` (`Profesor_derector_grupo_identificacion` ASC) ,
  CONSTRAINT `fk_Curso_Profesor1`
    FOREIGN KEY (`Profesor_derector_grupo_identificacion` )
    REFERENCES `modelo`.`Profesor` (`identificacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modelo`.`Materia`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `modelo`.`Materia` (
  `id` INT(10) NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `year` YEAR NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modelo`.`Clase`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `modelo`.`Clase` (
  `numero` INT(15) NOT NULL ,
  `Materia_id` INT NOT NULL ,
  `Profesor_identificacion` INT(15) NOT NULL ,
  PRIMARY KEY (`numero`, `Materia_id`) ,
  INDEX `fk_Clase_Materia1_idx` (`Materia_id` ASC) ,
  INDEX `fk_Clase_Profesor1_idx` (`Profesor_identificacion` ASC) ,
  CONSTRAINT `fk_Clase_Materia1`
    FOREIGN KEY (`Materia_id` )
    REFERENCES `modelo`.`Materia` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Clase_Profesor1`
    FOREIGN KEY (`Profesor_identificacion` )
    REFERENCES `modelo`.`Profesor` (`identificacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modelo`.`Notas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `modelo`.`Notas` (
  `Estudiante_identificacion` INT(15) NOT NULL ,
  `Clase_numero` INT(15) NOT NULL ,
  `fecha_ingreso` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `year` YEAR NOT NULL ,
  `periodo1` FLOAT NULL ,
  `periodo2` FLOAT NULL ,
  `periodo3` FLOAT NULL ,
  `periodo4` FLOAT NULL ,
  PRIMARY KEY (`Estudiante_identificacion`, `Clase_numero`) ,
  INDEX `fk_Estudiante_has_Clase_Clase1_idx` (`Clase_numero` ASC) ,
  INDEX `fk_Estudiante_has_Clase_Estudiante1_idx` (`Estudiante_identificacion` ASC) ,
  CONSTRAINT `fk_Estudiante_has_Clase_Estudiante1`
    FOREIGN KEY (`Estudiante_identificacion` )
    REFERENCES `modelo`.`Estudiante` (`identificacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudiante_has_Clase_Clase1`
    FOREIGN KEY (`Clase_numero` )
    REFERENCES `modelo`.`Clase` (`numero` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `modelo`.`Matricula`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `modelo`.`Matricula` (
  `Estudiante_identificacion` INT(15) NOT NULL ,
  `Curso_codigo` INT(15) NOT NULL ,
  `year` YEAR NOT NULL ,
  PRIMARY KEY (`Estudiante_identificacion`, `Curso_codigo`) ,
  INDEX `fk_Estudiante_has_Curso_Curso1_idx` (`Curso_codigo` ASC) ,
  INDEX `fk_Estudiante_has_Curso_Estudiante1_idx` (`Estudiante_identificacion` ASC) ,
  CONSTRAINT `fk_Estudiante_has_Curso_Estudiante1`
    FOREIGN KEY (`Estudiante_identificacion` )
    REFERENCES `modelo`.`Estudiante` (`identificacion` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudiante_has_Curso_Curso1`
    FOREIGN KEY (`Curso_codigo` )
    REFERENCES `modelo`.`Curso` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `modelo` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
