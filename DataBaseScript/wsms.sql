SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `wsms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `wsms` ;

-- -----------------------------------------------------
-- Table `wsms`.`User`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`User` (
  `idUser` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idUser`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`Customer`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`Customer` (
  `idCustomer` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `surname` VARCHAR(45) NOT NULL ,
  `ssn` VARCHAR(9) NOT NULL ,
  `phone` VARCHAR(20) NULL ,
  `cellphone` VARCHAR(20) NULL ,
  `email` VARCHAR(45) NULL ,
  `address` VARCHAR(100) NOT NULL ,
  `zipCode` VARCHAR(10) NOT NULL ,
  `city` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idCustomer`) ,
  UNIQUE INDEX `afm_UNIQUE` (`ssn` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`SaleOrder`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`SaleOrder` (
  `idSaleOrder` INT NOT NULL AUTO_INCREMENT ,
  `dateCreated` DATETIME NOT NULL ,
  `dateClosed` DATETIME NOT NULL ,
  `dateDue` DATETIME NOT NULL ,
  `idCustomer` INT NOT NULL ,
  `idUser` INT NOT NULL ,
  PRIMARY KEY (`idSaleOrder`, `dateCreated`) ,
  INDEX `fk_OrderSale_Customer1_idx` (`idCustomer` ASC) ,
  INDEX `fk_OrderSale_User1_idx` (`idUser` ASC) ,
  CONSTRAINT `fk_OrderSale_Customer1`
    FOREIGN KEY (`idCustomer` )
    REFERENCES `wsms`.`Customer` (`idCustomer` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_OrderSale_User1`
    FOREIGN KEY (`idUser` )
    REFERENCES `wsms`.`User` (`idUser` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`Provider`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`Provider` (
  `idProvider` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `surname` VARCHAR(45) NOT NULL ,
  `ssn` VARCHAR(9) NOT NULL ,
  `phone` VARCHAR(20) NULL ,
  `cellphone` VARCHAR(20) NULL ,
  `email` VARCHAR(45) NULL ,
  `address` VARCHAR(100) NOT NULL ,
  `zipCode` VARCHAR(10) NOT NULL ,
  `city` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idProvider`) ,
  UNIQUE INDEX `ssn_UNIQUE` (`ssn` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`SupplyOrder`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`SupplyOrder` (
  `idSupplyOrder` INT NOT NULL AUTO_INCREMENT ,
  `dateCreated` DATETIME NOT NULL ,
  `dateClosed` DATETIME NOT NULL ,
  `dateDue` DATETIME NOT NULL ,
  `idProvider` INT NOT NULL ,
  `idUser` INT NOT NULL ,
  PRIMARY KEY (`idSupplyOrder`, `dateCreated`) ,
  INDEX `fk_OrderSupply_Provider1_idx` (`idProvider` ASC) ,
  INDEX `fk_OrderSupply_User1_idx` (`idUser` ASC) ,
  CONSTRAINT `fk_OrderSupply_Provider1`
    FOREIGN KEY (`idProvider` )
    REFERENCES `wsms`.`Provider` (`idProvider` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_OrderSupply_User1`
    FOREIGN KEY (`idUser` )
    REFERENCES `wsms`.`User` (`idUser` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`Product`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`Product` (
  `idProduct` INT NOT NULL AUTO_INCREMENT ,
  `sku` VARCHAR(15) NOT NULL ,
  `description` VARCHAR(45) NOT NULL ,
  `priceSale` DECIMAL(10,2) NOT NULL ,
  `priceSupply` DECIMAL(10,2) NOT NULL ,
  `availableSum` INT NOT NULL ,
  `reservedSum` INT NOT NULL ,
  `orderedSum` INT NOT NULL ,
  `criticalSum` INT NOT NULL ,
  PRIMARY KEY (`idProduct`) ,
  UNIQUE INDEX `sku_UNIQUE` (`sku` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`CustomerHasDiscount`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`CustomerHasDiscount` (
  `idProduct` INT NOT NULL ,
  `idCustomer` INT NOT NULL ,
  `discount` DECIMAL(4,3) NOT NULL DEFAULT 0.000 ,
  PRIMARY KEY (`idProduct`, `idCustomer`) ,
  INDEX `fk_ProductSale_has_Customer_Customer1_idx` (`idCustomer` ASC) ,
  INDEX `fk_ProductSale_has_Customer_ProductSale1_idx` (`idProduct` ASC) ,
  CONSTRAINT `fk_ProductSale_has_Customer_ProductSale1`
    FOREIGN KEY (`idProduct` )
    REFERENCES `wsms`.`Product` (`idProduct` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ProductSale_has_Customer_Customer1`
    FOREIGN KEY (`idCustomer` )
    REFERENCES `wsms`.`Customer` (`idCustomer` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`Role`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`Role` (
  `idRole` INT NOT NULL AUTO_INCREMENT ,
  `type` VARCHAR(45) NOT NULL ,
  `description` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idRole`) ,
  UNIQUE INDEX `type_UNIQUE` (`type` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`WishProduct`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`WishProduct` (
  `idWishProduct` INT NOT NULL AUTO_INCREMENT ,
  `quantity` INT NOT NULL ,
  `description` VARCHAR(45) NOT NULL ,
  `idUser` INT NOT NULL ,
  PRIMARY KEY (`idWishProduct`) ,
  INDEX `fk_WishProduct_User1_idx` (`idUser` ASC) ,
  CONSTRAINT `fk_WishProduct_User1`
    FOREIGN KEY (`idUser` )
    REFERENCES `wsms`.`User` (`idUser` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`UserHasRole`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`UserHasRole` (
  `idUser` INT NOT NULL ,
  `idRole` INT NOT NULL ,
  PRIMARY KEY (`idUser`, `idRole`) ,
  INDEX `fk_User_has_UserRoles_UserRoles1_idx` (`idRole` ASC) ,
  INDEX `fk_User_has_UserRoles_User1_idx` (`idUser` ASC) ,
  CONSTRAINT `fk_User_has_UserRoles_User1`
    FOREIGN KEY (`idUser` )
    REFERENCES `wsms`.`User` (`idUser` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_UserRoles_UserRoles1`
    FOREIGN KEY (`idRole` )
    REFERENCES `wsms`.`Role` (`idRole` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`Notification`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`Notification` (
  `idNotitification` INT NOT NULL AUTO_INCREMENT ,
  `text` TEXT NOT NULL ,
  `title` VARCHAR(45) NOT NULL ,
  `urgency` INT NOT NULL ,
  `idUserSend` INT NOT NULL ,
  `idUserReceive` INT NOT NULL ,
  `viewd` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`idNotitification`) ,
  INDEX `fk_Notification_User1_idx` (`idUserSend` ASC) ,
  INDEX `fk_Notification_User2_idx` (`idUserReceive` ASC) ,
  CONSTRAINT `fk_Notification_User1`
    FOREIGN KEY (`idUserSend` )
    REFERENCES `wsms`.`User` (`idUser` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Notification_User2`
    FOREIGN KEY (`idUserReceive` )
    REFERENCES `wsms`.`User` (`idUser` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`SupplyOrderHasProduct`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`SupplyOrderHasProduct` (
  `idSupplyOrder` INT NOT NULL ,
  `dateCreated` DATETIME NOT NULL ,
  `idProduct` INT NOT NULL ,
  `quantity` INT NOT NULL ,
  PRIMARY KEY (`idSupplyOrder`, `dateCreated`, `idProduct`) ,
  INDEX `fk_SupplyOrder_has_Product_Product1_idx` (`idProduct` ASC) ,
  INDEX `fk_SupplyOrder_has_Product_SupplyOrder1_idx` (`idSupplyOrder` ASC, `dateCreated` ASC) ,
  CONSTRAINT `fk_SupplyOrder_has_Product_SupplyOrder1`
    FOREIGN KEY (`idSupplyOrder` , `dateCreated` )
    REFERENCES `wsms`.`SupplyOrder` (`idSupplyOrder` , `dateCreated` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SupplyOrder_has_Product_Product1`
    FOREIGN KEY (`idProduct` )
    REFERENCES `wsms`.`Product` (`idProduct` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`SaleOrderHasProduct`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`SaleOrderHasProduct` (
  `idProduct` INT NOT NULL ,
  `idSaleOrder` INT NOT NULL ,
  `dateCreated` DATETIME NOT NULL ,
  `quantity` INT NOT NULL ,
  PRIMARY KEY (`idProduct`, `idSaleOrder`, `dateCreated`) ,
  INDEX `fk_Product_has_SaleOrder_SaleOrder1_idx` (`idSaleOrder` ASC, `dateCreated` ASC) ,
  INDEX `fk_Product_has_SaleOrder_Product1_idx` (`idProduct` ASC) ,
  CONSTRAINT `fk_Product_has_SaleOrder_Product1`
    FOREIGN KEY (`idProduct` )
    REFERENCES `wsms`.`Product` (`idProduct` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Product_has_SaleOrder_SaleOrder1`
    FOREIGN KEY (`idSaleOrder` , `dateCreated` )
    REFERENCES `wsms`.`SaleOrder` (`idSaleOrder` , `dateCreated` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
