SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `knowledgesystem` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `knowledgesystem` ;

-- -----------------------------------------------------
-- Table `knowledgesystem`.`Profile`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `knowledgesystem`.`Profile` (
`idProfile` INT NOT NULL AUTO_INCREMENT,
`description` VARCHAR(45) NOT NULL,
PRIMARY KEY (`idProfile`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `knowledgesystem`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `knowledgesystem`.`User` (
`idUser` INT NOT NULL AUTO_INCREMENT,
`firstName` VARCHAR(45) NOT NULL,
`lastName` VARCHAR(45) NOT NULL,
`email` VARCHAR(45) NOT NULL,
`password` VARCHAR(200) NOT NULL,
`Profile_idProfile` INT NOT NULL,
PRIMARY KEY (`idUser`),
INDEX `fk_User_Profile1_idx` (`Profile_idProfile` ASC),
UNIQUE INDEX `email_UNIQUE` (`email` ASC),
CONSTRAINT `fk_User_Profile1`
FOREIGN KEY (`Profile_idProfile`)
REFERENCES `knowledgesystem`.`Profile` (`idProfile`)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `knowledgesystem`.`Knowledge`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `knowledgesystem`.`Knowledge` (
`idKnowledge` INT NOT NULL AUTO_INCREMENT,
`description` VARCHAR(45) NOT NULL,
`name` VARCHAR(45) NOT NULL,
PRIMARY KEY (`idKnowledge`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `knowledgesystem`.`Course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `knowledgesystem`.`Course` (
`idCourse` INT NOT NULL AUTO_INCREMENT,
`startDate` VARCHAR(45) NULL,
`finishDate` VARCHAR(45) NULL,
`name` VARCHAR(45) NOT NULL,
`User_idUser` INT NOT NULL,
PRIMARY KEY (`idCourse`),
INDEX `fk_Course_User1_idx` (`User_idUser` ASC),
CONSTRAINT `fk_Course_User1`
FOREIGN KEY (`User_idUser`)
REFERENCES `knowledgesystem`.`User` (`idUser`)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `knowledgesystem`.`User_has_Course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `knowledgesystem`.`User_has_Course` (
`idUser_has_Course` INT NOT NULL AUTO_INCREMENT,
`User_idUser` INT NOT NULL,
`Course_idCourse` INT NOT NULL,
INDEX `fk_User_has_Course_Course1_idx` (`Course_idCourse` ASC),
INDEX `fk_User_has_Course_User1_idx` (`User_idUser` ASC),
PRIMARY KEY (`idUser_has_Course`),
CONSTRAINT `fk_User_has_Course_User1`
FOREIGN KEY (`User_idUser`)
REFERENCES `knowledgesystem`.`User` (`idUser`)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT `fk_User_has_Course_Course1`
FOREIGN KEY (`Course_idCourse`)
REFERENCES `knowledgesystem`.`Course` (`idCourse`)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `knowledgesystem`.`Knowlegde_has_User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `knowledgesystem`.`Knowlegde_has_User` (
`Knowlegde_idKnowlegde` INT NOT NULL,
`User_idUser` INT NOT NULL,
PRIMARY KEY (`Knowlegde_idKnowlegde`, `User_idUser`),
INDEX `fk_Knowlegde_has_User_User1_idx` (`User_idUser` ASC),
INDEX `fk_Knowlegde_has_User_Knowlegde1_idx` (`Knowlegde_idKnowlegde` ASC),
CONSTRAINT `fk_Knowlegde_has_User_Knowlegde1`
FOREIGN KEY (`Knowlegde_idKnowlegde`)
REFERENCES `knowledgesystem`.`Knowledge` (`idKnowledge`)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT `fk_Knowlegde_has_User_User1`
FOREIGN KEY (`User_idUser`)
REFERENCES `knowledgesystem`.`User` (`idUser`)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `knowledgesystem`.`Knowlegde_has_Course`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `knowledgesystem`.`Knowlegde_has_Course` (
`Knowlegde_idKnowlegde` INT NOT NULL,
`Course_idCourse` INT NOT NULL,
PRIMARY KEY (`Knowlegde_idKnowlegde`, `Course_idCourse`),
INDEX `fk_Knowlegde_has_Course_Course1_idx` (`Course_idCourse` ASC),
INDEX `fk_Knowlegde_has_Course_Knowlegde1_idx` (`Knowlegde_idKnowlegde` ASC),
CONSTRAINT `fk_Knowlegde_has_Course_Knowlegde1`
FOREIGN KEY (`Knowlegde_idKnowlegde`)
REFERENCES `knowledgesystem`.`Knowledge` (`idKnowledge`)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT `fk_Knowlegde_has_Course_Course1`
FOREIGN KEY (`Course_idCourse`)
REFERENCES `knowledgesystem`.`Course` (`idCourse`)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `knowledgesystem`.`User_has_Knowledge`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `knowledgesystem`.`User_has_Knowledge` (
`User_has_Knowledgecol` INT NOT NULL AUTO_INCREMENT,
`User_idUser` INT NOT NULL,
`Knowledge_idKnowledge` INT NOT NULL,
INDEX `fk_User_has_Knowlegde_Knowlegde1_idx` (`Knowledge_idKnowledge` ASC),
INDEX `fk_User_has_Knowlegde_User1_idx` (`User_idUser` ASC),
PRIMARY KEY (`User_has_Knowledgecol`),
CONSTRAINT `fk_User_has_Knowlegde_User1`
FOREIGN KEY (`User_idUser`)
REFERENCES `knowledgesystem`.`User` (`idUser`)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT `fk_User_has_Knowlegde_Knowlegde1`
FOREIGN KEY (`Knowledge_idKnowledge`)
REFERENCES `knowledgesystem`.`Knowledge` (`idKnowledge`)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `knowledgesystem`.`Course_has_Knowledge`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `knowledgesystem`.`Course_has_Knowledge` (
`Course_has_Knowledge` INT NOT NULL AUTO_INCREMENT,
`Course_idCourse` INT NOT NULL,
`Knowledge_idKnowledge` INT NOT NULL,
INDEX `fk_Course_has_Knowlegde_Knowlegde1_idx` (`Knowledge_idKnowledge` ASC),
INDEX `fk_Course_has_Knowlegde_Course1_idx` (`Course_idCourse` ASC),
PRIMARY KEY (`Course_has_Knowledge`),
CONSTRAINT `fk_Course_has_Knowlegde_Course1`
FOREIGN KEY (`Course_idCourse`)
REFERENCES `knowledgesystem`.`Course` (`idCourse`)
ON DELETE NO ACTION
ON UPDATE NO ACTION,
CONSTRAINT `fk_Course_has_Knowlegde_Knowlegde1`
FOREIGN KEY (`Knowledge_idKnowledge`)
REFERENCES `knowledgesystem`.`Knowledge` (`idKnowledge`)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `knowledgesystem`.`Notification`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `knowledgesystem`.`Notification` (
`idNotification` INT NOT NULL AUTO_INCREMENT,
`description` VARCHAR(45) NULL,
`Course_idCourse` INT NOT NULL,
PRIMARY KEY (`idNotification`),
INDEX `fk_Notification_Course1_idx` (`Course_idCourse` ASC),
CONSTRAINT `fk_Notification_Course1`
FOREIGN KEY (`Course_idCourse`)
REFERENCES `knowledgesystem`.`Course` (`idCourse`)
ON DELETE NO ACTION
ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

# Adiciona os perfies padrões do sistema
INSERT INTO `knowledgesystem`.`Profile` (`description`) VALUES ('Administrador');
INSERT INTO `knowledgesystem`.`Profile` (`description`) VALUES ('Professor');
INSERT INTO `knowledgesystem`.`Profile` (`description`) VALUES ('Aluno');

# Adiciona o admin do sistema
INSERT INTO `knowledgesystem`.`User` (`firstName`, `lastName`, `email`, `password`, `Profile_idProfile`) VALUES ('System', 'Admin', 'admin@email.com', '202cb962ac59075b964b07152d234b70', '1');
INSERT INTO `knowledgesystem`.`User` (`firstName`, `lastName`, `email`, `password`, `Profile_idProfile`) VALUES ('Professor', 'Exemplo', 'professor@email.com', '202cb962ac59075b964b07152d234b70', '2');
INSERT INTO `knowledgesystem`.`User` (`firstName`, `lastName`, `email`, `password`, `Profile_idProfile`) VALUES ('Aluno', 'Exemplo', 'aluno@email.com', '202cb962ac59075b964b07152d234b70', '3');