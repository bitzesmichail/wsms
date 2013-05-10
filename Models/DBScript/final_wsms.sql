-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 10, 2013 at 01:13 PM
-- Server version: 5.5.31
-- PHP Version: 5.4.6-1ubuntu1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
DROP SCHEMA IF EXISTS `wsms` ;
CREATE SCHEMA IF NOT EXISTS `wsms` DEFAULT CHARACTER SET utf8 ;
USE `wsms` ;

--
-- Database: `wsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE IF NOT EXISTS `Customer` (
  `ssn` varchar(9) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `cellphone` varchar(20) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `zipCode` varchar(10) NOT NULL,
  `city` varchar(45) NOT NULL,
  `version` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ssn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `Customer`
--
DROP TRIGGER IF EXISTS `IncreaseCustomerVersionTrigger`;
DELIMITER //
CREATE TRIGGER `IncreaseCustomerVersionTrigger` BEFORE UPDATE ON `Customer`
 FOR EACH ROW BEGIN
	SET NEW.version = NEW.version + 1;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `CustomerHasDiscount`
--

CREATE TABLE IF NOT EXISTS `CustomerHasDiscount` (
  `sku` varchar(20) NOT NULL,
  `ssn` varchar(9) NOT NULL,
  `discount` decimal(4,3) NOT NULL DEFAULT '0.000',
  PRIMARY KEY (`sku`,`ssn`),
  KEY `fk_ProductSale_has_Customer_Customer1_idx` (`ssn`),
  KEY `fk_ProductSale_has_Customer_ProductSale1_idx` (`sku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `HistoryCustomer`
--

CREATE TABLE IF NOT EXISTS `HistoryCustomer` (
  `idHistoryCustomer` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `address` varchar(100) NOT NULL,
  `zipCode` varchar(10) NOT NULL,
  `city` varchar(45) NOT NULL,
  `customerSsn` varchar(9) NOT NULL,
  `version` int(11) NOT NULL,
  PRIMARY KEY (`idHistoryCustomer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `HistoryProduct`
--

CREATE TABLE IF NOT EXISTS `HistoryProduct` (
  `idHistoryProduct` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `priceSale` decimal(10,2) NOT NULL,
  `priceSupply` decimal(10,2) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `version` int(11) NOT NULL,
  PRIMARY KEY (`idHistoryProduct`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `HistoryProvider`
--

CREATE TABLE IF NOT EXISTS `HistoryProvider` (
  `idHistoryProvider` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `address` varchar(100) NOT NULL,
  `zipCode` varchar(10) NOT NULL,
  `city` varchar(45) NOT NULL,
  `providerSsn` varchar(9) NOT NULL,
  `version` int(11) NOT NULL,
  PRIMARY KEY (`idHistoryProvider`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `HistorySaleOrder`
--

CREATE TABLE IF NOT EXISTS `HistorySaleOrder` (
  `idHistorySaleOrder` int(11) NOT NULL AUTO_INCREMENT,
  `idSaleOrder` int(11) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `dateUpdated` datetime NOT NULL,
  `dateDue` datetime NOT NULL,
  `dateClosed` datetime NOT NULL,
  `idHistoryCustomer` int(11) NOT NULL,
  `status` enum('closed','problem') NOT NULL,
  PRIMARY KEY (`idHistorySaleOrder`),
  KEY `fk_HistorySaleOrder_InstanceCustomer1_idx` (`idHistoryCustomer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `HistorySaleOrderHasHistoryProduct`
--

CREATE TABLE IF NOT EXISTS `HistorySaleOrderHasHistoryProduct` (
  `idHistorySaleOrder` int(11) NOT NULL,
  `idHistoryProduct` int(11) NOT NULL,
  `discount` decimal(4,3) NOT NULL,
  `quantityCreated` int(11) NOT NULL,
  `quantityClosed` int(11) NOT NULL,
  PRIMARY KEY (`idHistorySaleOrder`,`idHistoryProduct`),
  KEY `fk_HistorySaleOrder_has_InstanceProduct_InstanceProduct1_idx` (`idHistoryProduct`),
  KEY `fk_HistorySaleOrder_has_InstanceProduct_HistorySaleOrder1_idx` (`idHistorySaleOrder`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `HistorySupplyOrder`
--

CREATE TABLE IF NOT EXISTS `HistorySupplyOrder` (
  `idHistorySupplyOrder` int(11) NOT NULL AUTO_INCREMENT,
  `idSupplyOrder` int(11) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `dateDue` datetime NOT NULL,
  `dateClosed` datetime NOT NULL,
  `idHistoryProvider` int(11) NOT NULL,
  PRIMARY KEY (`idHistorySupplyOrder`),
  KEY `fk_HistorySupplyOrder_HistoryProvider1_idx` (`idHistoryProvider`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `HistorySupplyOrderHasHistoryProduct`
--

CREATE TABLE IF NOT EXISTS `HistorySupplyOrderHasHistoryProduct` (
  `idHistorySupplyOrder` int(11) NOT NULL,
  `idHistoryProduct` int(11) NOT NULL,
  `quantityCreate` int(11) NOT NULL,
  `quantityClosed` int(11) NOT NULL,
  PRIMARY KEY (`idHistorySupplyOrder`,`idHistoryProduct`),
  KEY `fk_HistorySupplyOrder_has_HistoryProduct_HistoryProduct1_idx` (`idHistoryProduct`),
  KEY `fk_HistorySupplyOrder_has_HistoryProduct_HistorySupplyOrder_idx` (`idHistorySupplyOrder`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE IF NOT EXISTS `Product` (
  `sku` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `priceSale` decimal(10,2) NOT NULL,
  `priceSupply` decimal(10,2) NOT NULL,
  `availableSum` int(11) NOT NULL,
  `reservedSum` int(11) NOT NULL,
  `orderedSum` int(11) NOT NULL,
  `criticalSum` int(11) NOT NULL,
  `version` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `Product`
--
DROP TRIGGER IF EXISTS `IncreaseProductVersionTrigger`;
DELIMITER //
CREATE TRIGGER `IncreaseProductVersionTrigger` BEFORE UPDATE ON `Product`
 FOR EACH ROW BEGIN
	SET NEW.version = NEW.version + 1;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Provider`
--

CREATE TABLE IF NOT EXISTS `Provider` (
  `ssn` varchar(9) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `cellphone` varchar(20) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `zipCode` varchar(10) NOT NULL,
  `city` varchar(45) NOT NULL,
  `version` int(11) NOT NULL,
  PRIMARY KEY (`ssn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `Provider`
--
DROP TRIGGER IF EXISTS `IncreaseProviderVersionTrigger`;
DELIMITER //
CREATE TRIGGER `IncreaseProviderVersionTrigger` BEFORE UPDATE ON `Provider`
 FOR EACH ROW BEGIN
	SET NEW.version = NEW.version + 1;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `SaleOrder`
--

CREATE TABLE IF NOT EXISTS `SaleOrder` (
  `idSaleOrder` int(11) NOT NULL AUTO_INCREMENT,
  `dateUpdated` datetime NOT NULL,
  `dateCreated` datetime NOT NULL,
  `dateClosed` datetime DEFAULT NULL,
  `dateDue` datetime DEFAULT NULL,
  `customerSsn` varchar(9) NOT NULL,
  `idUser` int(11) NOT NULL,
  `status` enum('active','inactive','closed','problem') NOT NULL,
  PRIMARY KEY (`idSaleOrder`,`dateUpdated`),
  KEY `fk_OrderSale_Customer1_idx` (`customerSsn`),
  KEY `fk_OrderSale_User1_idx` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Triggers `SaleOrder`
--
DROP TRIGGER IF EXISTS `SaleOrderTrigger`;
DELIMITER //
CREATE TRIGGER `SaleOrderTrigger` BEFORE DELETE ON `SaleOrder`
 FOR EACH ROW BEGIN 

        IF((OLD.status='closed') OR (OLD.status='problem')) THEN

            SET @customerVersion := (
                SELECT version
                FROM Provider
                WHERE ssn=OLD.customerSsn
            );


            SET @historyCustomerId := (
                SELECT idHistoryCustomer
                FROM HistoryCustomer
                WHERE customerSsn = OLD.customerSsn
                AND version = @customerVersion
            );

            IF(@historyCustomerId IS NULL) THEN

                INSERT INTO HistoryCustomer 
                (name,surname,address,zipCode,city,customerSsn,version) 
                SELECT name,surname,address,zipCode,city,ssn,version
                FROM Customer
                WHERE ssn = OLD.customerSsn;

                SET @historyCustomerId := LAST_INSERT_ID();
    
            END IF;
                

            INSERT INTO HistorySaleOrder 
            (idSaleOrder,dateCreated,dateUpdated,dateDue,dateClosed,idHistoryCustomer,status)
            VALUES (OLD.idSaleOrder,OLD.dateCreated,OLD.dateUpdated,OLD.dateDue,OLD.dateClosed,@historyCustomerId,OLD.status);

        END IF;

        DELETE FROM SaleOrderHasProduct  
        WHERE (idSaleOrder=OLD.idSaleOrder AND dateUpdated=OLD.dateUpdated);
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `SaleOrderHasProduct`
--

CREATE TABLE IF NOT EXISTS `SaleOrderHasProduct` (
  `sku` varchar(20) NOT NULL,
  `idSaleOrder` int(11) NOT NULL,
  `dateUpdated` datetime NOT NULL,
  `quantityCreated` int(11) NOT NULL,
  `quantityClosed` int(11) NOT NULL,
  `currentDiscount` decimal(4,3) DEFAULT NULL,
  `currentPriceSale` decimal(10,2) DEFAULT NULL,
  `currentPriceSupply` decimal(10,2) DEFAULT NULL,
  `currentVersion` int(11) DEFAULT NULL,
  `currentDescription` text,
  PRIMARY KEY (`sku`,`idSaleOrder`,`dateUpdated`),
  KEY `fk_Product_has_SaleOrder_Product1_idx` (`sku`),
  KEY `fk_SaleOrderHasProduct_SaleOrder1_idx` (`idSaleOrder`,`dateUpdated`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `SaleOrderHasProduct`
--
DROP TRIGGER IF EXISTS `CurrentValuesSaleOrderTrigger`;
DELIMITER //
CREATE TRIGGER `CurrentValuesSaleOrderTrigger` BEFORE INSERT ON `SaleOrderHasProduct`
 FOR EACH ROW BEGIN
	
		SELECT priceSale, priceSupply, version, description 
		INTO @currentPriceSale, @currentPriceSupply, @currentVersion, @currentDescription
		FROM Product
		WHERE NEW.sku = sku;
		
		IF(NEW.currentDiscount IS NULL) THEN
			SET @customerSSN := (
				SELECT customerSsn
				FROM SaleOrder
				WHERE NEW.idSaleOrder = idSaleOrder
			); 
			
			SET @currentDiscount := (
				SELECT discount
				FROM CustomerHasDiscount
				WHERE NEW.sku = sku
				AND ssn = @customerSSN
			);
			
			IF(@currentDiscount IS NULL) THEN
				SET @currentDiscount := 0.000;
			END	IF;
	
			SET	NEW.currentDiscount = @currentDiscount;
		END IF;

		
		SET 	NEW.currentPriceSale = @currentPriceSale; 
		SET	NEW.currentPriceSupply = @currentPriceSupply;
		SET	NEW.currentVersion = @currentVersion;
		SET	NEW.currentDescription = @currentDescription;
		
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `SaleOrderHasProductTrigger`;
DELIMITER //
CREATE TRIGGER `SaleOrderHasProductTrigger` BEFORE DELETE ON `SaleOrderHasProduct`
 FOR EACH ROW BEGIN

        IF((SELECT status FROM SaleOrder AS sl WHERE sl.idSaleOrder=OLD.idSaleOrder)='closed' OR 'problem') THEN
            
            SET @historyProductId := (
                SELECT idHistoryProduct 
                FROM HistoryProduct
                WHERE sku=OLD.sku 
                AND version=OLD.currentVersion
            );

            IF(@historyProductId IS NULL) THEN

                INSERT INTO HistoryProduct 
                (description,priceSale,priceSupply,sku,version) 
                VALUES 
                (OLD.currentDescription,OLD.currentPriceSale,OLD.currentpriceSupply,OLD.sku,OLD.currentVersion);
                
                SET @historyProductId := LAST_INSERT_ID();

            END IF;


            SET @idHistorySaleOrder :=(
                SELECT idHistorySaleOrder 
                FROM HistorySaleOrder AS hs 
                WHERE hs.idSaleOrder=OLD.idSaleOrder 
                AND hs.dateUpdated=OLD.dateUpdated);
            
            INSERT INTO HistorySaleOrderHasHistoryProduct 
            (idHistorySaleOrder,idHistoryProduct,discount,quantityCreated,quantityClosed) 
            VALUES 
            (@idHistorySaleOrder,@historyProductId,OLD.currentDiscount,OLD.quantityCreated,OLD.quantityClosed);

            IF(OLD.quantityCreated != OLD.quantityClosed) THEN 
                UPDATE HistorySaleOrder SET status := 'problem' 
		WHERE idSaleOrder=OLD.idSaleOrder 
                AND dateUpdated=OLD.dateUpdated;
            END IF;

        END IF;

    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `SupplyOrder`
--

CREATE TABLE IF NOT EXISTS `SupplyOrder` (
  `idSupplyOrder` int(11) NOT NULL AUTO_INCREMENT,
  `dateUpdated` datetime NOT NULL,
  `dateClosed` datetime DEFAULT NULL,
  `dateDue` datetime NOT NULL,
  `providerSsn` varchar(9) NOT NULL,
  `idUser` int(11) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `status` enum('active','closed') NOT NULL,
  PRIMARY KEY (`idSupplyOrder`),
  KEY `fk_OrderSupply_Provider1_idx` (`providerSsn`),
  KEY `fk_OrderSupply_User1_idx` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Triggers `SupplyOrder`
--
DROP TRIGGER IF EXISTS `SupplyOrderTrigger`;
DELIMITER //
CREATE TRIGGER `SupplyOrderTrigger` BEFORE DELETE ON `SupplyOrder`
 FOR EACH ROW BEGIN 

        IF(OLD.status = 'closed') THEN
			
			SET @providerVersion := (
				SELECT version 
				FROM Provider 
				WHERE ssn = OLD.providerSsn 
			);
			
			SET @historyProviderId := (
				SELECT idHistoryProvider 
				FROM HistoryProvider 
				WHERE providerSsn = OLD.providerSsn 
				AND version = @providerVersion
			);
			
			IF( @historyProviderId IS NULL ) THEN
                
				INSERT INTO HistoryProvider (name, surname, address, zipCode, city, providerSsn, version) 
				SELECT name, surname, address, zipCode, city, ssn, version 
				FROM Provider
				WHERE ssn = OLD.providerSsn;
            
				SET @historyProviderId := LAST_INSERT_ID();
            END IF;
            
            INSERT INTO HistorySupplyOrder (idSupplyOrder, dateCreated, dateDue, dateClosed, idHistoryProvider) 
			VALUES (OLD.idSupplyOrder, OLD.dateCreated, OLD.dateDue, OLD.dateClosed, @historyProviderId);
        END IF;


	DELETE FROM SupplyOrderHasProduct  
        WHERE (idSupplyOrder=OLD.idSupplyOrder);

    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `SupplyOrderHasProduct`
--

CREATE TABLE IF NOT EXISTS `SupplyOrderHasProduct` (
  `idSupplyOrder` int(11) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `quantityCreated` int(11) NOT NULL,
  `quantityClosed` int(11) DEFAULT NULL,
  `currentPriceSupply` decimal(10,2) DEFAULT NULL,
  `currentDescription` text,
  `currentVersion` int(11) DEFAULT NULL,
  `currentPriceSale` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idSupplyOrder`,`sku`),
  KEY `fk_SupplyOrder_has_Product_Product1_idx` (`sku`),
  KEY `fk_SupplyOrder_has_Product_SupplyOrder1_idx` (`idSupplyOrder`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `SupplyOrderHasProduct`
--
DROP TRIGGER IF EXISTS `CurrentValuesSupplyOrderTrigger`;
DELIMITER //
CREATE TRIGGER `CurrentValuesSupplyOrderTrigger` BEFORE INSERT ON `SupplyOrderHasProduct`
 FOR EACH ROW BEGIN
	
		SELECT priceSupply, version, description, priceSale 
		INTO @currentPriceSupply, @currentVersion, @currentDescription, @currentPriceSale
		FROM Product
		WHERE  sku = NEW.sku;

		SET	NEW.currentPriceSale := @currentPriceSale;
		SET	NEW.currentPriceSupply := @currentPriceSupply;
		SET	NEW.currentVersion := @currentVersion;
		SET	NEW.currentDescription := @currentDescription;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `SupplyOrderHasProductTrigger`;
DELIMITER //
CREATE TRIGGER `SupplyOrderHasProductTrigger` BEFORE DELETE ON `SupplyOrderHasProduct`
 FOR EACH ROW BEGIN

        IF((SELECT status FROM SupplyOrder AS sl WHERE sl.idSupplyOrder=OLD.idSupplyOrder)='closed') THEN
            
            SET @historyProductId := (
                SELECT idHistoryProduct 
                FROM HistoryProduct
                WHERE sku=OLD.sku 
                AND version=OLD.currentVersion
            );

            IF(@historyProductId IS NULL) THEN

                INSERT INTO HistoryProduct 
                (description,priceSale,priceSupply,sku,version) 
                VALUES 
                (OLD.currentDescription,OLD.currentPriceSale,OLD.currentPriceSupply,OLD.sku,OLD.currentVersion);
                
                SET @historyProductId := LAST_INSERT_ID();

            END IF;


            SET @idHistorySupplyOrder :=(
                SELECT idHistorySupplyOrder 
                FROM HistorySupplyOrder AS hs 
                WHERE hs.idSupplyOrder=OLD.idSupplyOrder 
            );
            
            INSERT INTO HistorySupplyOrderHasHistoryProduct 
            (idHistorySupplyOrder,idHistoryProduct,quantityCreate,quantityClosed) 
            VALUES 
            (@idHistorySupplyOrder,@historyProductId,OLD.quantityCreated,OLD.quantityClosed);

        END IF;

    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE  TABLE IF NOT EXISTS `wsms`.`User` (
  `idUser` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `role` ENUM('MANAGER','SELLER','SCHEDULER','STOREKEEPER') NOT NULL ,
  PRIMARY KEY (`idUser`) ,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) )
ENGINE = InnoDB;

-- --------------------------------------------------------

--
-- Table structure for table `WishProduct`
--

CREATE TABLE IF NOT EXISTS `WishProduct` (
  `idWishProduct` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idWishProduct`),
  KEY `fk_WishProduct_User1_idx` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CustomerHasDiscount`
--
ALTER TABLE `CustomerHasDiscount`
  ADD CONSTRAINT `fk_ProductSale_has_Customer_ProductSale1` FOREIGN KEY (`sku`) REFERENCES `Product` (`sku`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ProductSale_has_Customer_Customer1` FOREIGN KEY (`ssn`) REFERENCES `Customer` (`ssn`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `HistorySaleOrder`
--
ALTER TABLE `HistorySaleOrder`
  ADD CONSTRAINT `fk_HistorySaleOrder_InstanceCustomer1` FOREIGN KEY (`idHistoryCustomer`) REFERENCES `HistoryCustomer` (`idHistoryCustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `HistorySaleOrderHasHistoryProduct`
--
ALTER TABLE `HistorySaleOrderHasHistoryProduct`
  ADD CONSTRAINT `fk_HistorySaleOrder_has_InstanceProduct_HistorySaleOrder1` FOREIGN KEY (`idHistorySaleOrder`) REFERENCES `HistorySaleOrder` (`idHistorySaleOrder`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_HistorySaleOrder_has_InstanceProduct_InstanceProduct1` FOREIGN KEY (`idHistoryProduct`) REFERENCES `HistoryProduct` (`idHistoryProduct`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `HistorySupplyOrder`
--
ALTER TABLE `HistorySupplyOrder`
  ADD CONSTRAINT `fk_HistorySupplyOrder_HistoryProvider1` FOREIGN KEY (`idHistoryProvider`) REFERENCES `HistoryProvider` (`idHistoryProvider`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `HistorySupplyOrderHasHistoryProduct`
--
ALTER TABLE `HistorySupplyOrderHasHistoryProduct`
  ADD CONSTRAINT `fk_HistorySupplyOrder_has_HistoryProduct_HistorySupplyOrder1` FOREIGN KEY (`idHistorySupplyOrder`) REFERENCES `HistorySupplyOrder` (`idHistorySupplyOrder`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_HistorySupplyOrder_has_HistoryProduct_HistoryProduct1` FOREIGN KEY (`idHistoryProduct`) REFERENCES `HistoryProduct` (`idHistoryProduct`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `SaleOrder`
--
ALTER TABLE `SaleOrder`
  ADD CONSTRAINT `fk_OrderSale_Customer1` FOREIGN KEY (`customerSsn`) REFERENCES `Customer` (`ssn`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_OrderSale_User1` FOREIGN KEY (`idUser`) REFERENCES `User` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `SaleOrderHasProduct`
--
ALTER TABLE `SaleOrderHasProduct`
  ADD CONSTRAINT `fk_Product_has_SaleOrder_Product1` FOREIGN KEY (`sku`) REFERENCES `Product` (`sku`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SaleOrderHasProduct_SaleOrder1` FOREIGN KEY (`idSaleOrder`, `dateUpdated`) REFERENCES `SaleOrder` (`idSaleOrder`, `dateUpdated`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `SupplyOrder`
--
ALTER TABLE `SupplyOrder`
  ADD CONSTRAINT `fk_OrderSupply_Provider1` FOREIGN KEY (`providerSsn`) REFERENCES `Provider` (`ssn`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_OrderSupply_User1` FOREIGN KEY (`idUser`) REFERENCES `User` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `SupplyOrderHasProduct`
--
ALTER TABLE `SupplyOrderHasProduct`
  ADD CONSTRAINT `fk_SupplyOrder_has_Product_SupplyOrder1` FOREIGN KEY (`idSupplyOrder`) REFERENCES `SupplyOrder` (`idSupplyOrder`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SupplyOrder_has_Product_Product1` FOREIGN KEY (`sku`) REFERENCES `Product` (`sku`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- Constraints for table `WishProduct`
--
ALTER TABLE `WishProduct`
  ADD CONSTRAINT `fk_WishProduct_User1` FOREIGN KEY (`idUser`) REFERENCES `User` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
