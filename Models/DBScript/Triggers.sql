DELIMITER |
USE `wsms`|
DROP TRIGGER IF EXISTS CurrentValuesSaleOrderTrigger|

CREATE TRIGGER CurrentValuesSaleOrderTrigger BEFORE INSERT ON SaleOrderHasProduct
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
		
END;	
--------------------------------------------------------------------------------------------------------------------------------------
USE `wsms`|
DROP TRIGGER IF EXISTS IncreaseProductVersionTrigger|

CREATE TRIGGER IncreaseProductVersionTrigger BEFORE UPDATE ON Product
	FOR EACH ROW BEGIN
	SET NEW.version = NEW.version + 1;
END;	
--------------------------------------------------------------------------------------------------------------------------------------
USE `wsms`|
DROP TRIGGER IF EXISTS IncreaseCustomerVersionTrigger|

CREATE TRIGGER IncreaseCustomerVersionTrigger BEFORE UPDATE ON Customer
	FOR EACH ROW BEGIN
	SET NEW.version = NEW.version + 1;
END;	
--------------------------------------------------------------------------------------------------------------------------------------
USE `wsms`|
DROP TRIGGER IF EXISTS IncreaseProviderVersionTrigger|

CREATE TRIGGER IncreaseProviderVersionTrigger BEFORE UPDATE ON Provider
	FOR EACH ROW BEGIN
	SET NEW.version = NEW.version + 1;
END;	
--------------------------------------------------------------------------------------------------------------------------------------
USE `wsms`|
DROP TRIGGER IF EXISTS wsms.SupplyOrderTrigger|
CREATE TRIGGER SupplyOrderTrigger BEFORE DELETE ON SupplyOrder
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

    END;
--------------------------------------------------------------------------------------------------------------------------------------
USE `wsms`|
DROP TRIGGER IF EXISTS CurrentValuesSupplyOrderTrigger|

CREATE TRIGGER CurrentValuesSupplyOrderTrigger BEFORE INSERT ON SupplyOrderHasProduct
	FOR EACH ROW BEGIN
	
		SELECT priceSupply, version, description, priceSale 
		INTO @currentPriceSupply, @currentVersion, @currentDescription, @currentPriceSale
		FROM Product
		WHERE  sku = NEW.sku;

		SET	NEW.currentPriceSale := @currentPriceSale;
		SET	NEW.currentPriceSupply := @currentPriceSupply;
		SET	NEW.currentVersion := @currentVersion;
		SET	NEW.currentDescription := @currentDescription;
END;	


-------------------------------------------------------------------------------------------------------------

USE `wsms`|
DROP TRIGGER IF EXISTS wsms.SaleOrderTrigger|
CREATE TRIGGER SaleOrderTrigger BEFORE DELETE ON SaleOrder
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
    END;

------------------------------------------------------------------------------------------------------------------

USE `wsms`|

DROP TRIGGER IF EXISTS wsms.SupplyOrderHasProductTrigger|
CREATE TRIGGER SupplyOrderHasProductTrigger BEFORE DELETE ON SupplyOrderHasProduct
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

    END;


--------------------------------------------------------------------------------------------------------------------

USE `wsms`|

DROP TRIGGER IF EXISTS wsms.SaleOrderHasProductTrigger|
CREATE TRIGGER SaleOrderHasProductTrigger BEFORE DELETE ON SaleOrderHasProduct
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

    END;
DELIMITER ;

