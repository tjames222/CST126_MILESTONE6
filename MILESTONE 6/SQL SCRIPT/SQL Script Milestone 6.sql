-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema blog
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema blog
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 ;
USE `blog` ;

-- -----------------------------------------------------
-- Table `blog`.`blogpost`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`blogpost` ;

CREATE TABLE IF NOT EXISTS `blog`.`blogpost` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `AUTHOR_NAME` VARCHAR(100) NOT NULL,
  `BLOG_TITLE` VARCHAR(100) NOT NULL,
  `BLOG_TEXT` TEXT NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `blog`.`comments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`comments` ;

CREATE TABLE IF NOT EXISTS `blog`.`comments` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `NAME` VARCHAR(100) NOT NULL,
  `COMMENT` VARCHAR(800) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `blog`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blog`.`users` ;

CREATE TABLE IF NOT EXISTS `blog`.`users` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `FIRST_NAME` VARCHAR(100) NOT NULL,
  `LAST_NAME` VARCHAR(100) NOT NULL,
  `EMAIL` VARCHAR(100) NOT NULL,
  `DOB` DATE NULL DEFAULT NULL,
  `USERNAME` VARCHAR(50) NOT NULL,
  `PASSWORD` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
