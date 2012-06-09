SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `gerencianet` ;
CREATE SCHEMA IF NOT EXISTS `gerencianet` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `gerencianet` ;

-- -----------------------------------------------------
-- Table `gerencianet`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gerencianet`.`usuario` ;

CREATE  TABLE IF NOT EXISTS `gerencianet`.`usuario` (
  `idusuario` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `senha` VARCHAR(40) NOT NULL ,
  PRIMARY KEY (`idusuario`) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gerencianet`.`categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gerencianet`.`categoria` ;

CREATE  TABLE IF NOT EXISTS `gerencianet`.`categoria` (
  `idcategoria` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idcategoria`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gerencianet`.`materia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gerencianet`.`materia` ;

CREATE  TABLE IF NOT EXISTS `gerencianet`.`materia` (
  `idmateria` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `idusuario` INT UNSIGNED NOT NULL ,
  `idcategoria` INT UNSIGNED NOT NULL ,
  `titulo` VARCHAR(100) NOT NULL ,
  `texto` TEXT NOT NULL ,
  `data_criacao` DATETIME NOT NULL ,
  `imagem` VARCHAR(250) NULL ,
  `publicado` TINYINT UNSIGNED NOT NULL ,
  PRIMARY KEY (`idmateria`) ,
  INDEX `fk_materia_categoria1` (`idcategoria` ASC) ,
  INDEX `fk_materia_usuario1` (`idusuario` ASC) ,
  CONSTRAINT `fk_materia_categoria1`
    FOREIGN KEY (`idcategoria` )
    REFERENCES `gerencianet`.`categoria` (`idcategoria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_materia_usuario1`
    FOREIGN KEY (`idusuario` )
    REFERENCES `gerencianet`.`usuario` (`idusuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
