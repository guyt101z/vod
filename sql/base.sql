SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `vod` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `vod` ;

-- -----------------------------------------------------
-- Table `vod`.`category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `vod`.`category` ;

CREATE  TABLE IF NOT EXISTS `vod`.`category` (
  `id` INT NOT NULL ,
  `name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vod`.`film`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `vod`.`film` ;

CREATE  TABLE IF NOT EXISTS `vod`.`film` (
  `id` INT NOT NULL ,
  `title` VARCHAR(45) NULL ,
  `picture` VARCHAR(255) NULL ,
  `director` VARCHAR(255) NULL ,
  `date` DATE NULL ,
  `mark` FLOAT NULL ,
  `nb_vote` INT NULL ,
  `Synopsis` TEXT NULL ,
  `id_category` INT NOT NULL ,
  PRIMARY KEY (`id`, `id_category`) ,
  INDEX `fk_film_category` (`id_category` ASC) ,
  CONSTRAINT `fk_film_category`
    FOREIGN KEY (`id_category` )
    REFERENCES `vod`.`category` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vod`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `vod`.`user` ;

CREATE  TABLE IF NOT EXISTS `vod`.`user` (
  `id` INT NOT NULL ,
  `username` VARCHAR(30) NULL ,
  `password` VARCHAR(60) NULL ,
  `name` VARCHAR(255) NULL ,
  `first_name` VARCHAR(255) NULL ,
  `email` VARCHAR(255) NULL ,
  `state` TINYINT(1) NULL ,
  `role` TINYINT(1) NULL ,
  `created` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vod`.`order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `vod`.`order` ;

CREATE  TABLE IF NOT EXISTS `vod`.`order` (
  `id` INT NOT NULL ,
  `member_id` INT NOT NULL ,
  `date` DATE NULL ,
  PRIMARY KEY (`id`, `member_id`) ,
  INDEX `fk_order_member1` (`member_id` ASC) ,
  CONSTRAINT `fk_order_member1`
    FOREIGN KEY (`member_id` )
    REFERENCES `vod`.`user` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vod`.`order_has_film`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `vod`.`order_has_film` ;

CREATE  TABLE IF NOT EXISTS `vod`.`order_has_film` (
  `order_id` INT NOT NULL ,
  `film_id` INT NOT NULL ,
  PRIMARY KEY (`order_id`, `film_id`) ,
  INDEX `fk_order_has_film_film1` (`film_id` ASC) ,
  INDEX `fk_order_has_film_order1` (`order_id` ASC) ,
  CONSTRAINT `fk_order_has_film_order1`
    FOREIGN KEY (`order_id` )
    REFERENCES `vod`.`order` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_has_film_film1`
    FOREIGN KEY (`film_id` )
    REFERENCES `vod`.`film` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vod`.`post`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `vod`.`post` ;

CREATE  TABLE IF NOT EXISTS `vod`.`post` (
  `id` INT NOT NULL ,
  `title` VARCHAR(45) NULL ,
  `date` DATETIME NULL ,
  `content` TEXT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
