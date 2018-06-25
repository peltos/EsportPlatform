-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ewa
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ewa
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mini` DEFAULT CHARACTER SET utf8 ;
USE `mini` ;

-- -----------------------------------------------------
-- Table `mini`.`Member`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mini`.`Member` (
  `memberEmail` VARCHAR(255) NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `firstLogin` DATETIME NOT NULL,
  PRIMARY KEY (`memberEmail`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mini`.`Streamer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mini`.`Streamer` (
  `streamID` BIGINT NOT NULL AUTO_INCREMENT,
  `streamName` VARCHAR(30) NOT NULL,
  `lastOnline` DATETIME NULL,
  `categorie` VARCHAR(40) NULL,
  `website` VARCHAR(24) NOT NULL,
  PRIMARY KEY (`streamID`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mini`.`follow`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mini`.`follow` (
  `Member_memberEmail` VARCHAR(255) NOT NULL,
  `Streamer_streamID` BIGINT NOT NULL,
  `likes` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`Member_memberEmail`, `Streamer_streamID`),
  INDEX `fk_Member_has_Streamer_Streamer1_idx` (`Streamer_streamID` ASC),
  INDEX `fk_Member_has_Streamer_Member1_idx` (`Member_memberEmail` ASC),
  CONSTRAINT `fk_Member_has_Streamer_Member1`
    FOREIGN KEY (`Member_memberEmail`)
    REFERENCES `mini`.`Member` (`memberEmail`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Member_has_Streamer_Streamer1`
    FOREIGN KEY (`Streamer_streamID`)
    REFERENCES `mini`.`Streamer` (`streamID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mini`.`Member`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `mini`.`Teams` (
  `playerID` INT NOT NULL,
  `playerName` VARCHAR(255) NOT NULL,
  `playerFirstName` VARCHAR(255) NULL,
  `playerLastName` VARCHAR(255) NULL,
  `playerTeamID` INT NULL,
  `playerTeamName` VARCHAR(255) NULL,
  `playerTeamImage` VARCHAR(255) NULL,
  `playerGame` VARCHAR(255) NULL,
  `playerImage` VARCHAR(255) NULL,
  `playerHometown` VARCHAR(255) NULL,
  PRIMARY KEY (`playerID`))
  
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
