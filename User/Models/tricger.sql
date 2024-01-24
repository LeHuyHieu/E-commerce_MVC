-- Drop the existing trigger if it exists
DROP TRIGGER IF EXISTS delete_order_detail;

-- Change the delimiter for the following trigger creation
DELIMITER //
CREATE TRIGGER delete_order_detail
BEFORE DELETE ON orders
FOR EACH ROW
BEGIN
    DELETE FROM order_details WHERE order_id = OLD.id;
END;
//
DELIMITER ;
