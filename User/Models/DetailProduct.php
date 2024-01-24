<?php
class DetailProduct extends Connect
{
    private $db;
    public function __construct()
    {
        $this->db = new Connect();
    }

    public function getDetailProduct($idProduct)
    {
        $select = 'SELECT DISTINCT products.title, products.category_id,products.description, products.id, discounts.discount_percent AS discountPercent
                    FROM products
                    LEFT JOIN discounts ON discounts.id = products.discount_id
                    WHERE products.id = ' . $idProduct;
        $result = $this->db->getInstance($select);
        return $result;
    }

    public function getListProductGetCategory($category_id, $product_id)
    {
        $select = "WITH RECURSIVE CategoryCTE AS (SELECT id, parent_id, name FROM categories WHERE id IN ($category_id) UNION ALL
                    SELECT c.id, c.parent_id, c.name FROM categories c INNER JOIN CategoryCTE ON c.parent_id = CategoryCTE.id)
                    SELECT products.title, products.description, products.id , discounts.discount_percent AS discountPercent FROM products
                    LEFT JOIN discounts ON discounts.id = products.discount_id
                    WHERE category_id IN (SELECT id FROM CategoryCTE) AND products.id != $product_id AND products.deleted_at IS NULL ORDER BY RAND() LIMIT 15";
        $result = $this->db->getList($select);
        return $result;
    }
}
