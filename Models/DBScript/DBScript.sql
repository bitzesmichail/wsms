SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `wsms` ;
CREATE SCHEMA IF NOT EXISTS `wsms` DEFAULT CHARACTER SET utf8 ;
USE `wsms` ;

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
-- Table `wsms`.`User`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`User` (
  `idUser` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `idRole` INT NOT NULL ,
  PRIMARY KEY (`idUser`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) ,
  INDEX `fk_User_Role1_idx` (`idRole` ASC) ,
  CONSTRAINT `fk_User_Role1`
    FOREIGN KEY (`idRole` )
    REFERENCES `wsms`.`Role` (`idRole` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`Customer`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`Customer` (
  `ssn` VARCHAR(9) NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `surname` VARCHAR(45) NOT NULL ,
  `phone` VARCHAR(20) NULL DEFAULT NULL ,
  `cellphone` VARCHAR(20) NULL DEFAULT NULL ,
  `email` VARCHAR(45) NULL DEFAULT NULL ,
  `address` VARCHAR(100) NOT NULL ,
  `zipCode` VARCHAR(10) NOT NULL ,
  `city` VARCHAR(45) NOT NULL ,
  `version` INT NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`ssn`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`SaleOrder`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`SaleOrder` (
  `idSaleOrder` INT NOT NULL AUTO_INCREMENT ,
  `dateUpdated` DATETIME NOT NULL ,
  `dateCreated` DATETIME NOT NULL ,
  `dateClosed` DATETIME NULL DEFAULT NULL ,
  `dateDue` DATETIME NULL DEFAULT NULL ,
  `customerSsn` VARCHAR(9) NOT NULL ,
  `idUser` INT NOT NULL ,
  `status` ENUM('active','inactive','closed','problem') NOT NULL ,
  PRIMARY KEY (`idSaleOrder`, `dateUpdated`) ,
  INDEX `fk_OrderSale_Customer1_idx` (`customerSsn` ASC) ,
  INDEX `fk_OrderSale_User1_idx` (`idUser` ASC) ,
  CONSTRAINT `fk_OrderSale_Customer1`
    FOREIGN KEY (`customerSsn` )
    REFERENCES `wsms`.`Customer` (`ssn` )
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
  `ssn` VARCHAR(9) NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `surname` VARCHAR(45) NOT NULL ,
  `phone` VARCHAR(20) NULL DEFAULT NULL ,
  `cellphone` VARCHAR(20) NULL DEFAULT NULL ,
  `email` VARCHAR(45) NULL DEFAULT NULL ,
  `address` VARCHAR(100) NOT NULL ,
  `zipCode` VARCHAR(10) NOT NULL ,
  `city` VARCHAR(45) NOT NULL ,
  `version` INT NOT NULL ,
  PRIMARY KEY (`ssn`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`SupplyOrder`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`SupplyOrder` (
  `idSupplyOrder` INT NOT NULL AUTO_INCREMENT ,
  `dateUpdated` DATETIME NOT NULL ,
  `dateClosed` DATETIME NULL DEFAULT NULL ,
  `dateDue` DATETIME NOT NULL ,
  `providerSsn` VARCHAR(9) NOT NULL ,
  `idUser` INT NOT NULL ,
  `dateCreated` DATETIME NOT NULL ,
  `status` ENUM('active','closed') NOT NULL ,
  PRIMARY KEY (`idSupplyOrder`) ,
  INDEX `fk_OrderSupply_Provider1_idx` (`providerSsn` ASC) ,
  INDEX `fk_OrderSupply_User1_idx` (`idUser` ASC) ,
  CONSTRAINT `fk_OrderSupply_Provider1`
    FOREIGN KEY (`providerSsn` )
    REFERENCES `wsms`.`Provider` (`ssn` )
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
  `sku` VARCHAR(20) NOT NULL ,
  `description` TEXT NOT NULL ,
  `priceSale` DECIMAL(10,2) NOT NULL ,
  `priceSupply` DECIMAL(10,2) NOT NULL ,
  `availableSum` INT NOT NULL ,
  `reservedSum` INT NOT NULL ,
  `orderedSum` INT NOT NULL ,
  `criticalSum` INT NOT NULL ,
  `version` INT NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`sku`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`CustomerHasDiscount`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`CustomerHasDiscount` (
  `sku` VARCHAR(20) NOT NULL ,
  `ssn` VARCHAR(9) NOT NULL ,
  `discount` DECIMAL(4,3) NOT NULL DEFAULT 0.000 ,
  PRIMARY KEY (`sku`, `ssn`) ,
  INDEX `fk_ProductSale_has_Customer_Customer1_idx` (`ssn` ASC) ,
  INDEX `fk_ProductSale_has_Customer_ProductSale1_idx` (`sku` ASC) ,
  CONSTRAINT `fk_ProductSale_has_Customer_ProductSale1`
    FOREIGN KEY (`sku` )
    REFERENCES `wsms`.`Product` (`sku` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ProductSale_has_Customer_Customer1`
    FOREIGN KEY (`ssn` )
    REFERENCES `wsms`.`Customer` (`ssn` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
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
-- Table `wsms`.`SupplyOrderHasProduct`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`SupplyOrderHasProduct` (
  `idSupplyOrder` INT NOT NULL ,
  `sku` VARCHAR(20) NOT NULL ,
  `quantityCreated` INT NOT NULL ,
  `quantityClosed` INT NULL DEFAULT NULL ,
  `currentPriceSupply` DECIMAL(10,2) NULL ,
  `currentDescription` TEXT NULL ,
  `currentVersion` INT NULL ,
  `currentPriceSale` DECIMAL(10,2) NULL ,
  PRIMARY KEY (`idSupplyOrder`, `sku`) ,
  INDEX `fk_SupplyOrder_has_Product_Product1_idx` (`sku` ASC) ,
  INDEX `fk_SupplyOrder_has_Product_SupplyOrder1_idx` (`idSupplyOrder` ASC) ,
  CONSTRAINT `fk_SupplyOrder_has_Product_SupplyOrder1`
    FOREIGN KEY (`idSupplyOrder` )
    REFERENCES `wsms`.`SupplyOrder` (`idSupplyOrder` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SupplyOrder_has_Product_Product1`
    FOREIGN KEY (`sku` )
    REFERENCES `wsms`.`Product` (`sku` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`SaleOrderHasProduct`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`SaleOrderHasProduct` (
  `sku` VARCHAR(20) NOT NULL ,
  `idSaleOrder` INT NOT NULL ,
  `dateUpdated` DATETIME NOT NULL ,
  `quantityCreated` INT NOT NULL ,
  `quantityClosed` INT NOT NULL ,
  `currentDiscount` DECIMAL(4,3) NULL DEFAULT NULL ,
  `currentPriceSale` DECIMAL(10,2) NULL DEFAULT NULL ,
  `currentPriceSupply` DECIMAL(10,2) NULL DEFAULT NULL ,
  `currentVersion` INT NULL DEFAULT NULL ,
  `currentDescription` TEXT NULL DEFAULT NULL ,
  PRIMARY KEY (`sku`, `idSaleOrder`, `dateUpdated`) ,
  INDEX `fk_Product_has_SaleOrder_Product1_idx` (`sku` ASC) ,
  INDEX `fk_SaleOrderHasProduct_SaleOrder1_idx` (`idSaleOrder` ASC, `dateUpdated` ASC) ,
  CONSTRAINT `fk_Product_has_SaleOrder_Product1`
    FOREIGN KEY (`sku` )
    REFERENCES `wsms`.`Product` (`sku` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SaleOrderHasProduct_SaleOrder1`
    FOREIGN KEY (`idSaleOrder` , `dateUpdated` )
    REFERENCES `wsms`.`SaleOrder` (`idSaleOrder` , `dateUpdated` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`HistoryCustomer`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`HistoryCustomer` (
  `idHistoryCustomer` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `surname` VARCHAR(45) NOT NULL ,
  `address` VARCHAR(100) NOT NULL ,
  `zipCode` VARCHAR(10) NOT NULL ,
  `city` VARCHAR(45) NOT NULL ,
  `customerSsn` VARCHAR(9) NOT NULL ,
  `version` INT NOT NULL ,
  PRIMARY KEY (`idHistoryCustomer`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`HistorySaleOrder`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`HistorySaleOrder` (
  `idHistorySaleOrder` INT NOT NULL AUTO_INCREMENT ,
  `idSaleOrder` INT NOT NULL ,
  `dateCreated` DATETIME NOT NULL ,
  `dateUpdated` DATETIME NOT NULL ,
  `dateDue` DATETIME NOT NULL ,
  `dateClosed` DATETIME NOT NULL ,
  `idHistoryCustomer` INT NOT NULL ,
  `status` ENUM('closed','problem') NOT NULL ,
  PRIMARY KEY (`idHistorySaleOrder`) ,
  INDEX `fk_HistorySaleOrder_InstanceCustomer1_idx` (`idHistoryCustomer` ASC) ,
  CONSTRAINT `fk_HistorySaleOrder_InstanceCustomer1`
    FOREIGN KEY (`idHistoryCustomer` )
    REFERENCES `wsms`.`HistoryCustomer` (`idHistoryCustomer` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`HistoryProduct`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`HistoryProduct` (
  `idHistoryProduct` INT NOT NULL AUTO_INCREMENT ,
  `description` TEXT NOT NULL ,
  `priceSale` DECIMAL(10,2) NOT NULL ,
  `priceSupply` DECIMAL(10,2) NOT NULL ,
  `sku` VARCHAR(20) NOT NULL ,
  `version` INT NOT NULL ,
  PRIMARY KEY (`idHistoryProduct`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`HistorySaleOrderHasHistoryProduct`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`HistorySaleOrderHasHistoryProduct` (
  `idHistorySaleOrder` INT NOT NULL ,
  `idHistoryProduct` INT NOT NULL ,
  `discount` DECIMAL(4,3) NOT NULL ,
  `quantityCreated` INT NOT NULL ,
  `quantityClosed` INT NOT NULL ,
  PRIMARY KEY (`idHistorySaleOrder`, `idHistoryProduct`) ,
  INDEX `fk_HistorySaleOrder_has_InstanceProduct_InstanceProduct1_idx` (`idHistoryProduct` ASC) ,
  INDEX `fk_HistorySaleOrder_has_InstanceProduct_HistorySaleOrder1_idx` (`idHistorySaleOrder` ASC) ,
  CONSTRAINT `fk_HistorySaleOrder_has_InstanceProduct_HistorySaleOrder1`
    FOREIGN KEY (`idHistorySaleOrder` )
    REFERENCES `wsms`.`HistorySaleOrder` (`idHistorySaleOrder` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_HistorySaleOrder_has_InstanceProduct_InstanceProduct1`
    FOREIGN KEY (`idHistoryProduct` )
    REFERENCES `wsms`.`HistoryProduct` (`idHistoryProduct` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`HistoryProvider`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`HistoryProvider` (
  `idHistoryProvider` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `surname` VARCHAR(45) NOT NULL ,
  `address` VARCHAR(100) NOT NULL ,
  `zipCode` VARCHAR(10) NOT NULL ,
  `city` VARCHAR(45) NOT NULL ,
  `providerSsn` VARCHAR(9) NOT NULL ,
  `version` INT NOT NULL ,
  PRIMARY KEY (`idHistoryProvider`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`HistorySupplyOrder`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`HistorySupplyOrder` (
  `idHistorySupplyOrder` INT NOT NULL AUTO_INCREMENT ,
  `idSupplyOrder` INT NOT NULL ,
  `dateCreated` DATETIME NOT NULL ,
  `dateDue` DATETIME NOT NULL ,
  `dateClosed` DATETIME NOT NULL ,
  `idHistoryProvider` INT NOT NULL ,
  PRIMARY KEY (`idHistorySupplyOrder`) ,
  INDEX `fk_HistorySupplyOrder_HistoryProvider1_idx` (`idHistoryProvider` ASC) ,
  CONSTRAINT `fk_HistorySupplyOrder_HistoryProvider1`
    FOREIGN KEY (`idHistoryProvider` )
    REFERENCES `wsms`.`HistoryProvider` (`idHistoryProvider` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `wsms`.`HistorySupplyOrderHasHistoryProduct`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `wsms`.`HistorySupplyOrderHasHistoryProduct` (
  `idHistorySupplyOrder` INT NOT NULL ,
  `idHistoryProduct` INT NOT NULL ,
  `quantityCreate` INT NOT NULL ,
  `quantityClosed` INT NOT NULL ,
  PRIMARY KEY (`idHistorySupplyOrder`, `idHistoryProduct`) ,
  INDEX `fk_HistorySupplyOrder_has_HistoryProduct_HistoryProduct1_idx` (`idHistoryProduct` ASC) ,
  INDEX `fk_HistorySupplyOrder_has_HistoryProduct_HistorySupplyOrder_idx` (`idHistorySupplyOrder` ASC) ,
  CONSTRAINT `fk_HistorySupplyOrder_has_HistoryProduct_HistorySupplyOrder1`
    FOREIGN KEY (`idHistorySupplyOrder` )
    REFERENCES `wsms`.`HistorySupplyOrder` (`idHistorySupplyOrder` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_HistorySupplyOrder_has_HistoryProduct_HistoryProduct1`
    FOREIGN KEY (`idHistoryProduct` )
    REFERENCES `wsms`.`HistoryProduct` (`idHistoryProduct` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

