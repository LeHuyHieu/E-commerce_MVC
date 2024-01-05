<?php 
class DetailProduct {
    function getDetailProduct($idProduct) {
        $db = new Connect();
        $select = 'SELECT DISTINCT products.*,
                            discounts.discount_percent AS discountPercent
                    FROM products
                    LEFT JOIN discounts ON discounts.id = products.discount_id
                    WHERE products.id = ' . $idProduct;
        $result = $db->getInstance($select);
        return $result;
    }

    function getListProductGetCategory($category_id, $product_id) {
        $db = new Connect();
        $select = 'WITH RECURSIVE CategoryCTE AS
                        (SELECT id,
                                parent_id,
                                name
                        FROM categories
                        WHERE id IN ('.$category_id.')
                        UNION ALL SELECT c.id,
                                        c.parent_id,
                                        c.name
                        FROM categories c
                        INNER JOIN CategoryCTE ON c.parent_id = CategoryCTE.id)
                        SELECT products.*,
                            discounts.discount_percent AS discountPercent
                        FROM products
                        LEFT JOIN discounts ON discounts.id = products.discount_id
                        WHERE category_id IN
                            (SELECT id
                            FROM CategoryCTE)
                            AND products.id != ' . $product_id .'
                            AND products.deleted_at IS NULL
                        ORDER BY RAND()
                        LIMIT 15';
        $result = $db->getList($select);
        return $result;
    }
}
