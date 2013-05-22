-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 23, 2013 at 02:06 AM
-- Server version: 5.5.31-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wsms`
--
DROP SCHEMA IF EXISTS `wsms` ;
CREATE SCHEMA IF NOT EXISTS `wsms` DEFAULT CHARACTER SET utf8 ;
USE `wsms` ;
-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
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
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ssn`, `name`, `surname`, `phone`, `cellphone`, `email`, `address`, `zipCode`, `city`, `version`) VALUES
('090000045', 'Δημήτρης', 'Πετρίδης', '2104320000', '6934000000', 'petridis@gmail.com', 'Απόλλωνος 5', '12345', 'Αθήνα', 0),
('090017680', 'Άρης', 'Ολυμπόπουλος', '2451012345', '6932345455', 'aris@olympus.gr', 'Πασσάκου 5', '35100', 'Λαμία', 0),
('094014298', 'Βασίλειος', 'Αποστολόπουλος', '2131234567', '6941234567', 'vasileios@rocketmail.com', 'Μιχαηλίδου 5', '33500', 'Κέρκυρα', 0),
('094019245', 'Μιχάλης', 'Αποστόλου', '2104234567', '6932000000', 'apostolou@gmail.com', 'Φωκά 2', '13456', 'Θεσσαλονίκη', 0),
('094026421', 'Αχιλλέας', 'Ολυμπόπουλος', '2104333333', '6954444444', 'achilleas@olympus.gr', 'Παπαποστόλου 61', '35100', 'Λαμία', 0),
('094035442', 'Νίκος', 'Ασπέρογλου', '2121234567', '6941234567', 'asperoglou@gmail.com', 'Απίλλου 2', '23456', 'Κόρινθος', 0),
('1111', 'Άλκης', 'Καλογέρης', '2132222222', '6990000000', 'alkis@wsms.gr', 'zwhs 1', '12233', 'athens', 1);

--
-- Triggers `customer`
--
DROP TRIGGER IF EXISTS `IncreaseCustomerVersionTrigger`;
DELIMITER //
CREATE TRIGGER `IncreaseCustomerVersionTrigger` BEFORE UPDATE ON `customer`
 FOR EACH ROW BEGIN
	SET NEW.version = NEW.version + 1;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_has_discount`
--

CREATE TABLE IF NOT EXISTS `customer_has_discount` (
  `sku` varchar(20) NOT NULL,
  `ssn` varchar(9) NOT NULL,
  `discount` decimal(4,3) NOT NULL DEFAULT '0.000',
  PRIMARY KEY (`sku`,`ssn`),
  KEY `fk_ProductSale_has_Customer_Customer1_idx` (`ssn`),
  KEY `fk_ProductSale_has_Customer_ProductSale1_idx` (`sku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_has_discount`
--

INSERT INTO `customer_has_discount` (`sku`, `ssn`, `discount`) VALUES
('WTR.0001', '090000045', 0.500),
('WTR.0001', '094014298', 0.300);

-- --------------------------------------------------------

--
-- Table structure for table `history_customer`
--

CREATE TABLE IF NOT EXISTS `history_customer` (
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
-- Table structure for table `history_product`
--

CREATE TABLE IF NOT EXISTS `history_product` (
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
-- Table structure for table `history_provider`
--

CREATE TABLE IF NOT EXISTS `history_provider` (
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
-- Table structure for table `history_saleorder`
--

CREATE TABLE IF NOT EXISTS `history_saleorder` (
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
-- Table structure for table `history_saleorder_has_history_product`
--

CREATE TABLE IF NOT EXISTS `history_saleorder_has_history_product` (
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
-- Table structure for table `history_supplyorder`
--

CREATE TABLE IF NOT EXISTS `history_supplyorder` (
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
-- Table structure for table `history_supplyorder_has_history_product`
--

CREATE TABLE IF NOT EXISTS `history_supplyorder_has_history_product` (
  `idHistorySupplyOrder` int(11) NOT NULL,
  `idHistoryProduct` int(11) NOT NULL,
  `quantityCreated` int(11) NOT NULL,
  `quantityClosed` int(11) NOT NULL,
  PRIMARY KEY (`idHistorySupplyOrder`,`idHistoryProduct`),
  KEY `fk_HistorySupplyOrder_has_HistoryProduct_HistoryProduct1_idx` (`idHistoryProduct`),
  KEY `fk_HistorySupplyOrder_has_HistoryProduct_HistorySupplyOrder_idx` (`idHistorySupplyOrder`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
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
-- Dumping data for table `product`
--

INSERT INTO `product` (`sku`, `description`, `priceSale`, `priceSupply`, `availableSum`, `reservedSum`, `orderedSum`, `criticalSum`, `version`) VALUES
('BEV.0001', 'Fanta Πορτοκαλάδα', 5.00, 3.00, 500, 0, 0, 50, 0),
('BEV.0002', 'Fanta Μανταρινάδα', 5.00, 3.50, 200, 0, 0, 10, 0),
('BEV.0003', 'Fanta Λεμονίτα', 5.00, 2.00, 800, 0, 0, 30, 0),
('BEV.0004', 'Fanta Verdia', 6.00, 4.00, 300, 0, 0, 90, 0),
('BEV.0005', 'Sprite ', 6.00, 4.00, 1000, 0, 0, 100, 2),
('BEV.0006', 'Coca Cola ', 6.00, 4.00, 750, 0, 0, 100, 0),
('BEV.0007', 'Coca Cola Zero', 7.00, 4.00, 450, 0, 0, 100, 0),
('BEV.0008', 'ΕΨΑ Βυσσινάδα', 4.00, 3.00, 450, 0, 0, 40, 0),
('BEV.0009', 'ΕΨΑ Πορτοκαλάδα', 4.99, 4.00, 750, 0, 0, 50, 0),
('BEV.0010', 'ΕΨΑ Λεμονάδα', 5.99, 3.45, 400, 0, 0, 50, 0),
('BEV.0011', 'ΕΨΑ Μανταρινάδα', 4.00, 3.99, 400, 0, 0, 150, 0),
('WTR.0001', 'Νερό Ζαγόρι', 5.00, 4.00, 1500, 0, 0, 100, 0),
('WTR.0002', 'Νερό Λουτράκι', 5.00, 4.00, 300, 0, 0, 100, 0),
('WTR.0003', 'Νερό Βίκος', 0.50, 0.30, 2000, 0, 0, 500, 0),
('WTR.0004', 'Νερό Αύρα', 0.50, 0.20, 1000, 0, 0, 50, 0);

--
-- Triggers `product`
--
DROP TRIGGER IF EXISTS `IncreaseProductVersionTrigger`;
DELIMITER //
CREATE TRIGGER `IncreaseProductVersionTrigger` BEFORE UPDATE ON `product`
 FOR EACH ROW BEGIN
	SET NEW.version = NEW.version + 1;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE IF NOT EXISTS `provider` (
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
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`ssn`, `name`, `surname`, `phone`, `cellphone`, `email`, `address`, `zipCode`, `city`, `version`) VALUES
('123456731', 'Νικόλαος', 'Χρηστόπουλος', 'Μαραβού 10', 'Κορυδαλλός', '21234', '2101234567', '6921234567', 'xristopoulos@otenet.gr', 0),
('123456789', 'Μιχαήλ', 'Μπιτζές', 'Καλλιδρομίου 23', 'Μοσχάτο', '21222', '2104222222', '6931234567', 'bitzes@bitzes.gr', 0),
('234455676', 'Νικολέττα', 'Πετρίδου', 'Παγοδρομίου 32', 'Κέρκυρα', '22333', '2104343211', '6943123456', 'petridou@gmail.com', 0),
('234567891', 'Λία', 'Αποστόλου', 'Σρογδάλου 2', 'Πάτρα', '13578', '2101234567', '6941235667', 'lia@hol.gr', 0),
('345678901', 'Ιωάννης', 'Νικολάου', 'Αναστασίου 4', 'Ηράκλειο Κρήτης', '12341', '2129877777', '6931235088', 'nikolaou@gmail.com', 0),
('456789123', 'Μαρία', 'Μπίρτοκλου', 'Αντωνίου Μπέρτου 4', 'Κερατσίνι', '18758', '2101234511', '6931234567', 'mpirtoklou@gmail.com', 0),
('57057842', 'Αχιλλέας', 'Αναστασάκης', 'Επίκουρου 2', 'Χανιά', '12222', '2810112345', '6941234578', 'anastasakis@gmail.com', 0);

--
-- Triggers `provider`
--
DROP TRIGGER IF EXISTS `IncreaseProviderVersionTrigger`;
DELIMITER //
CREATE TRIGGER `IncreaseProviderVersionTrigger` BEFORE UPDATE ON `provider`
 FOR EACH ROW BEGIN
	SET NEW.version = NEW.version + 1;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `saleorder`
--

CREATE TABLE IF NOT EXISTS `saleorder` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `saleorder`
--

INSERT INTO `saleorder` (`idSaleOrder`, `dateUpdated`, `dateCreated`, `dateClosed`, `dateDue`, `customerSsn`, `idUser`, `status`) VALUES
(1, '2013-05-08 00:00:00', '2013-03-05 00:00:00', '2013-06-14 00:00:00', '2013-05-02 00:00:00', '1111', 1, 'active'),
(2, '2013-05-12 18:30:42', '2013-05-12 18:30:42', NULL, '0000-00-00 00:00:00', '1111', 1, 'active'),
(3, '2013-05-04 00:00:00', '2013-05-30 00:00:00', '2013-05-03 00:00:00', '2013-05-17 00:00:00', '1111', 2, 'active');

--
-- Triggers `saleorder`
--
DROP TRIGGER IF EXISTS `SaleOrderTrigger`;
DELIMITER //
CREATE TRIGGER `SaleOrderTrigger` BEFORE DELETE ON `saleorder`
 FOR EACH ROW BEGIN 

        IF( (OLD.status='closed') OR (OLD.status='problem') ) THEN

            SET @customerVersion := (
                SELECT version
                FROM provider
                WHERE ssn = OLD.customerSsn
            );


            SET @historyCustomerId := (
                SELECT idHistoryCustomer
                FROM history_customer
                WHERE customerSsn = OLD.customerSsn
                AND version = @customerVersion
            );

            IF(@historyCustomerId IS NULL) THEN

                INSERT INTO history_customer 
                (name,surname,address,zipCode,city,customerSsn,version) 
                SELECT name,surname,address,zipCode,city,ssn,version
                FROM customer
                WHERE ssn = OLD.customerSsn;

                SET @historyCustomerId := LAST_INSERT_ID();
    
            END IF;
                

            INSERT INTO history_saleorder 
            (idSaleOrder,dateCreated,dateUpdated,dateDue,dateClosed,idHistoryCustomer,status)
            VALUES 
			(OLD.idSaleOrder,OLD.dateCreated,OLD.dateUpdated,OLD.dateDue,OLD.dateClosed,@historyCustomerId,OLD.status);

        END IF;

        DELETE FROM saleorder_has_product  
        WHERE (idSaleOrder = OLD.idSaleOrder AND dateUpdated = OLD.dateUpdated);
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `saleorder_has_product`
--

CREATE TABLE IF NOT EXISTS `saleorder_has_product` (
  `sku` varchar(20) NOT NULL,
  `idSaleOrder` int(11) NOT NULL,
  `dateUpdated` datetime NOT NULL,
  `quantityCreated` int(11) NOT NULL,
  `quantityClosed` int(11) DEFAULT NULL,
  `currentDiscount` decimal(4,3) NOT NULL,
  `currentPriceSale` decimal(10,2) NOT NULL,
  `currentPriceSupply` decimal(10,2) NOT NULL,
  `currentVersion` int(11) DEFAULT NULL,
  `currentDescription` text NOT NULL,
  PRIMARY KEY (`sku`,`idSaleOrder`,`dateUpdated`),
  KEY `fk_Product_has_SaleOrder_Product1_idx` (`sku`),
  KEY `fk_SaleOrderHasProduct_SaleOrder1_idx` (`idSaleOrder`,`dateUpdated`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `saleorder_has_product`
--

INSERT INTO `saleorder_has_product` (`sku`, `idSaleOrder`, `dateUpdated`, `quantityCreated`, `quantityClosed`, `currentDiscount`, `currentPriceSale`, `currentPriceSupply`, `currentVersion`, `currentDescription`) VALUES
('BEV.0007', 1, '2013-05-08 00:00:00', 50, NULL, 0.250, 5.00, 4.00, 0, 'μια ωραία πεταλούδα');

--
-- Triggers `saleorder_has_product`
--
DROP TRIGGER IF EXISTS `CurrentValuesSaleOrderTrigger`;
DELIMITER //
CREATE TRIGGER `CurrentValuesSaleOrderTrigger` BEFORE INSERT ON `saleorder_has_product`
 FOR EACH ROW BEGIN
	SELECT version
	INTO @currentVersion
	FROM product
	WHERE NEW.sku = sku;
	
	SET NEW.currentVersion = @currentVersion;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `SaleOrderHasProductTrigger`;
DELIMITER //
CREATE TRIGGER `SaleOrderHasProductTrigger` BEFORE DELETE ON `saleorder_has_product`
 FOR EACH ROW BEGIN

        IF( (SELECT status FROM saleorder WHERE idSaleOrder=OLD.idSaleOrder AND dateUpdated = OLD.dateUpdated)='closed' OR 'problem' ) THEN
            
            SET @historyProductId := (
                SELECT idHistoryProduct 
                FROM history_product
                WHERE sku = OLD.sku 
                AND version = OLD.currentVersion
            );

            IF(@historyProductId IS NULL) THEN

                INSERT INTO history_product 
                (description,priceSale,priceSupply,sku,version) 
                VALUES 
                (OLD.currentDescription,OLD.currentPriceSale,OLD.currentpriceSupply,OLD.sku,OLD.currentVersion);
                
                SET @historyProductId := LAST_INSERT_ID();

            END IF;


            SET @idHistorySaleOrder :=(
                SELECT idHistorySaleOrder 
                FROM history_saleorder 
                WHERE idSaleOrder = OLD.idSaleOrder 
                AND dateUpdated = OLD.dateUpdated);
            
            INSERT INTO history_saleorder_has_history_product 
            (idHistorySaleOrder,idHistoryProduct,discount,quantityCreated,quantityClosed) 
            VALUES 
            (@idHistorySaleOrder,@historyProductId,OLD.currentDiscount,OLD.quantityCreated,OLD.quantityClosed);

            IF( OLD.quantityCreated != OLD.quantityClosed ) THEN 
                UPDATE history_saleorder SET status := 'problem' 
				WHERE idSaleOrder = OLD.idSaleOrder 
                AND dateUpdated = OLD.dateUpdated;
            END IF;

        END IF;

    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `supplyorder`
--

CREATE TABLE IF NOT EXISTS `supplyorder` (
  `idSupplyOrder` int(11) NOT NULL AUTO_INCREMENT,
  `dateUpdated` datetime NOT NULL,
  `dateClosed` datetime DEFAULT NULL,
  `dateDue` datetime NOT NULL,
  `providerSsn` varchar(9) NOT NULL,
  `idUser` int(11) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `status` enum('active','closed') NOT NULL,
  PRIMARY KEY (`idSupplyOrder`,`dateUpdated`),
  KEY `fk_OrderSupply_Provider1_idx` (`providerSsn`),
  KEY `fk_OrderSupply_User1_idx` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Triggers `supplyorder`
--
DROP TRIGGER IF EXISTS `SupplyOrderTrigger`;
DELIMITER //
CREATE TRIGGER `SupplyOrderTrigger` BEFORE DELETE ON `supplyorder`
 FOR EACH ROW BEGIN 

        IF(OLD.status = 'closed') THEN
			
			SET @providerVersion := (
				SELECT version 
				FROM provider 
				WHERE ssn = OLD.providerSsn 
			);
			
			SET @historyProviderId := (
				SELECT idHistoryProvider 
				FROM history_provider 
				WHERE providerSsn = OLD.providerSsn 
				AND version = @providerVersion
			);
			
			IF( @historyProviderId IS NULL ) THEN
                
				INSERT INTO history_provider (name, surname, address, zipCode, city, providerSsn, version) 
				SELECT name, surname, address, zipCode, city, ssn, version 
				FROM provider
				WHERE ssn = OLD.providerSsn;
            
				SET @historyProviderId := LAST_INSERT_ID();
            END IF;
            
            INSERT INTO history_supplyorder 
			(idSupplyOrder, dateCreated, dateDue, dateClosed, idHistoryProvider) 
			VALUES 
			(OLD.idSupplyOrder, OLD.dateCreated, OLD.dateDue, OLD.dateClosed, @historyProviderId);
        END IF;


	DELETE FROM supplyorder_has_product  
	WHERE (idSupplyOrder = OLD.idSupplyOrder);

    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `supplyorder_has_product`
--

CREATE TABLE IF NOT EXISTS `supplyorder_has_product` (
  `idSupplyOrder` int(11) NOT NULL,
  `dateUpdated` datetime NOT NULL,
  `sku` varchar(20) NOT NULL,
  `quantityCreated` int(11) NOT NULL,
  `quantityClosed` int(11) DEFAULT NULL,
  `currentPriceSupply` decimal(10,2) NOT NULL,
  `currentDescription` text NOT NULL,
  `currentVersion` int(11) DEFAULT NULL,
  `currentPriceSale` decimal(10,2) NOT NULL,
  PRIMARY KEY (`sku`,`idSupplyOrder`,`dateUpdated`),
  KEY `fk_SupplyOrder_has_Product_Product1_idx` (`sku`),
  KEY `fk_SupplyOrder_has_Product_SupplyOrder1_idx` (`idSupplyOrder`,`dateUpdated`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Triggers `supplyorder_has_product`
--
DROP TRIGGER IF EXISTS `CurrentValuesSupplyOrderTrigger`;
DELIMITER //
CREATE TRIGGER `CurrentValuesSupplyOrderTrigger` BEFORE INSERT ON `supplyorder_has_product`
 FOR EACH ROW BEGIN
	
		SELECT priceSupply, version, description, priceSale 
		INTO @currentPriceSupply, @currentVersion, @currentDescription, @currentPriceSale
		FROM product
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
CREATE TRIGGER `SupplyOrderHasProductTrigger` BEFORE DELETE ON `supplyorder_has_product`
 FOR EACH ROW BEGIN

        IF( (SELECT status FROM supplyorder WHERE idSupplyOrder = OLD.idSupplyOrder AND dateUpdated = OLD.dateUpdated)='closed' ) THEN
            
            SET @historyProductId := (
                SELECT idHistoryProduct 
                FROM history_product
                WHERE sku = OLD.sku 
                AND version = OLD.currentVersion
            );

            IF(@historyProductId IS NULL) THEN

                INSERT INTO history_product 
                (description,priceSale,priceSupply,sku,version) 
                VALUES 
                (OLD.currentDescription,OLD.currentPriceSale,OLD.currentPriceSupply,OLD.sku,OLD.currentVersion);
                
                SET @historyProductId := LAST_INSERT_ID();

            END IF;


            SET @idHistorySupplyOrder :=(
                SELECT idHistorySupplyOrder 
                FROM history_supplyorder 
                WHERE idSupplyOrder = OLD.idSupplyOrder 
            );
            
            INSERT INTO history_supplyorder_has_history_product 
            (idHistorySupplyOrder,idHistoryProduct,quantityCreated,quantityClosed) 
            VALUES 
            (@idHistorySupplyOrder,@historyProductId,OLD.quantityCreated,OLD.quantityClosed);

        END IF;

    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `role` enum('MANAGER','SELLER','SCHEDULER','STOREKEEPER') NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

DROP TRIGGER IF EXISTS `UserUpdateTrigger`;
DELIMITER ||
CREATE TRIGGER `UserUpdateTrigger` BEFORE UPDATE ON `user`
 FOR EACH ROW BEGIN

	SET @userPass := (
	    SELECT password
	    FROM user
	    WHERE idUser = NEW.idUser
	);

	IF (@userPass != NEW.password) THEN
		
		SET NEW.password := SHA(NEW.password);

	END IF;

    END
||
DELIMITER ;


--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `username`, `password`, `email`, `role`) VALUES
(1, 'manager', '1a8565a9dc72048ba03b4156be3e569f22771f23', 'manager@wsms.gr', 'MANAGER'),
(2, 'seller', '2e7464a5e9bac192f1251866fea0c255db0cbd83', 'seller@wsms.gr', 'SELLER'),
(3, 'scheduler', '142f817c3ec0586de0f960c1c0483043b61a0d06', 'scheduler@wsms.gr', 'SCHEDULER'),
(4, 'storekeeper', '5627b0ea56d96c8d0a1da0bf7816ae6df9e0277d', 'storekeeper@wsms.gr', 'STOREKEEPER'),
(5, 'dokimi', 'ae8744c05f457338c9b12ad87edab683bccb872c', 'dokimi@dokimi.gr', 'MANAGER');

-- --------------------------------------------------------

--
-- Table structure for table `wishproduct`
--

CREATE TABLE IF NOT EXISTS `wishproduct` (
  `idWishProduct` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idWishProduct`),
  KEY `fk_WishProduct_User1_idx` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `wishproduct`
--

INSERT INTO `wishproduct` (`idWishProduct`, `quantity`, `description`, `idUser`) VALUES
(1, 50, 'Herbal Tea Ρόδι', 2),
(2, 100, 'Lacta', 2),
(3, 200, 'ION Serano', 2),
(4, 500, 'Σοκολάτα Milka', 1),
(5, 200, 'Σοκολάτα ION Αμυγδάλου', 1),
(6, 200, 'Frulite Ροδάκινο', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_has_discount`
--
ALTER TABLE `customer_has_discount`
  ADD CONSTRAINT `fk_ProductSale_has_Customer_Customer1` FOREIGN KEY (`ssn`) REFERENCES `customer` (`ssn`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ProductSale_has_Customer_ProductSale1` FOREIGN KEY (`sku`) REFERENCES `product` (`sku`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `history_saleorder`
--
ALTER TABLE `history_saleorder`
  ADD CONSTRAINT `fk_HistorySaleOrder_InstanceCustomer1` FOREIGN KEY (`idHistoryCustomer`) REFERENCES `history_customer` (`idHistoryCustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `history_saleorder_has_history_product`
--
ALTER TABLE `history_saleorder_has_history_product`
  ADD CONSTRAINT `fk_HistorySaleOrder_has_InstanceProduct_HistorySaleOrder1` FOREIGN KEY (`idHistorySaleOrder`) REFERENCES `history_saleorder` (`idHistorySaleOrder`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_HistorySaleOrder_has_InstanceProduct_InstanceProduct1` FOREIGN KEY (`idHistoryProduct`) REFERENCES `history_product` (`idHistoryProduct`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `history_supplyorder`
--
ALTER TABLE `history_supplyorder`
  ADD CONSTRAINT `fk_HistorySupplyOrder_HistoryProvider1` FOREIGN KEY (`idHistoryProvider`) REFERENCES `history_provider` (`idHistoryProvider`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `history_supplyorder_has_history_product`
--
ALTER TABLE `history_supplyorder_has_history_product`
  ADD CONSTRAINT `fk_HistorySupplyOrder_has_HistoryProduct_HistoryProduct1` FOREIGN KEY (`idHistoryProduct`) REFERENCES `history_product` (`idHistoryProduct`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_HistorySupplyOrder_has_HistoryProduct_HistorySupplyOrder1` FOREIGN KEY (`idHistorySupplyOrder`) REFERENCES `history_supplyorder` (`idHistorySupplyOrder`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `saleorder`
--
ALTER TABLE `saleorder`
  ADD CONSTRAINT `fk_OrderSale_Customer1` FOREIGN KEY (`customerSsn`) REFERENCES `customer` (`ssn`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_OrderSale_User1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `saleorder_has_product`
--
ALTER TABLE `saleorder_has_product`
  ADD CONSTRAINT `fk_Product_has_SaleOrder_Product1` FOREIGN KEY (`sku`) REFERENCES `product` (`sku`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SaleOrderHasProduct_SaleOrder1` FOREIGN KEY (`idSaleOrder`, `dateUpdated`) REFERENCES `saleorder` (`idSaleOrder`, `dateUpdated`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `supplyorder`
--
ALTER TABLE `supplyorder`
  ADD CONSTRAINT `fk_OrderSupply_Provider1` FOREIGN KEY (`providerSsn`) REFERENCES `provider` (`ssn`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_OrderSupply_User1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `supplyorder_has_product`
--
ALTER TABLE `supplyorder_has_product`
  ADD CONSTRAINT `fk_SupplyOrder_has_Product_Product1` FOREIGN KEY (`sku`) REFERENCES `product` (`sku`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SupplyOrder_has_Product_SupplyOrder1` FOREIGN KEY (`idSupplyOrder`) REFERENCES `supplyorder` (`idSupplyOrder`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `wishproduct`
--
ALTER TABLE `wishproduct`
  ADD CONSTRAINT `fk_WishProduct_User1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
