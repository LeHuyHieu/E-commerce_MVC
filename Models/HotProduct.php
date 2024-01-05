<?php 
class HotProduct {
    function getHotProducts() {
        $db = new Connect();
        $select = 'SELECT product_sale.time_sale AS productSaleTime,
                            products.id,
                            products.title,
                            products.images,
                            products.price,
                            products.description,
                            discounts.discount_percent AS discountPercent
                    FROM products
                    JOIN product_sale ON product_sale.product_id = products.id
                    JOIN discounts ON discounts.id = products.discount_id
                    WHERE product_sale.active = 1
                    AND products.deleted_at IS NULL
                    AND product_sale.time_sale > CURDATE()
                    ORDER BY RAND() DESC
                    LIMIT 8';
        $result = $db->getList($select);
        return $result;
    }

    function getFeaturedProducts() {
        $db = new Connect();
        $select = 'SELECT discounts.discount_percent AS discountPercent, products.id, products.title, products.images, products.price, products.description  FROM products LEFT JOIN discounts ON discounts.id = products.discount_id WHERE products.product_hot = 1 AND products.deleted_at IS NULL ORDER BY RAND() DESC LIMIT 10';
        $result = $db->getList($select);
        return $result;
    }

    function getCategoryListProduct($id) {
        $db = new Connect();
        $select = 'WITH RECURSIVE CategoryCTE AS (
                    SELECT id, parent_id, name
                    FROM categories
                    WHERE id = ' . $id . '
                
                    UNION ALL
                
                    SELECT c.id, c.parent_id, c.name
                    FROM categories c
                    INNER JOIN CategoryCTE ON c.parent_id = CategoryCTE.id
                )
                SELECT discounts.discount_percent AS discountPercent,
                    products.id, products.title, products.images, products.price, products.description
                FROM products
                LEFT JOIN discounts ON discounts.id = products.discount_id
                WHERE category_id IN
                    (SELECT id
                    FROM CategoryCTE)
                AND product_hot = 0
                AND products.id NOT IN
                    (SELECT product_id
                    FROM product_sale)
                AND products.deleted_at IS NULL
                ORDER BY RAND()
                LIMIT 8';
        $result = $db->getList($select);
        return $result;
    }
}