<?php 
class ListProduct {
    function listProducts ($data) {
        $where = $data['where'];
        $start = $data['start'];
        $limit = $data['limit'];
        $orderBy = $data['orderby'];
        $condition = $data['condition'];
        $title = $data['title'];
        $category_id_string = isset($_GET['category_id']) ? [$_GET['category_id']] : ['SELECT id FROM categories'];

        if(!isset($_GET['arr_category_id'])) {
            $category_id = implode(',', $category_id_string);
        }else {
            if(isset($_GET['arr_category_id']) && $_GET['arr_category_id'] !== '') {
                $category_id = $_GET['arr_category_id'];
            }else {
                $category_id = implode(',', $category_id_string);
            }
        }

        $arrSizeCondition = '';
        $arrColorCondition = '';
        if (isset($_GET['arr_size_id']) && $_GET['arr_size_id'] != '') {
            $arrSizeCondition = ' AND size.id IN (' . $_GET['arr_size_id'] . ') ';
        }
        if (isset($_GET['arr_color_id']) && $_GET['arr_color_id'] != '') {
            $arrColorCondition = ' AND color.id IN (' . $_GET['arr_color_id'] . ') ';
        }

        $db = new Connect();
        $select = '';
        switch ($where) {
            case 'hot-deal-product':
                $count = 'WITH RECURSIVE CategoryCTE AS
                            (SELECT id, parent_id, name FROM categories WHERE id IN (' . $category_id . ')
                            UNION ALL SELECT c.id, c.parent_id, c.name FROM categories c
                            INNER JOIN CategoryCTE ON c.parent_id = CategoryCTE.id)
                            SELECT COUNT(products.id) AS countIdProduct
                            FROM products
                                LEFT JOIN product_sale ON product_sale.product_id = products.id
                                LEFT JOIN discounts ON discounts.id = products.discount_id
                                LEFT JOIN detail_product dp_size ON dp_size.product_id = products.id
                                LEFT JOIN size ON size.id = dp_size.size_id
                                LEFT JOIN detail_product dp_color ON dp_color.product_id = products.id
                                LEFT JOIN color ON color.id = dp_color.color_id
                            WHERE product_sale.active = 1 AND products.category_id IN (SELECT id FROM CategoryCTE) AND products.deleted_at IS NULL AND product_sale.time_sale > CURDATE() ';
                (isset($arrSizeCondition) && $arrSizeCondition != '') ? $count .= $arrSizeCondition : '';
                (isset($arrColorCondition) && $arrColorCondition != '') ? $count .= $arrColorCondition : '';
                $count .= ($title !== '') ? ' AND products.title LIKE "%'.$title.'%" ' : '';
                $count .= ' GROUP BY (products.id)';
                $categories = 'SELECT categories.id AS id_category,
                                        categories.name AS categoryName
                                FROM categories
                                WHERE  parent_id = 0';
                $select = 'WITH RECURSIVE CategoryCTE AS
                            (SELECT id, parent_id, name FROM categories WHERE id IN (' . $category_id . ')
                            UNION ALL SELECT c.id, c.parent_id, c.name FROM categories c
                            INNER JOIN CategoryCTE ON c.parent_id = CategoryCTE.id)
                        SELECT
                            product_sale.time_sale AS productSaleTime,
                            discounts.discount_percent AS discountPercent, products.title,products.description, products.id
                        FROM
                            products
                            LEFT JOIN product_sale ON product_sale.product_id = products.id
                            LEFT JOIN discounts ON discounts.id = products.discount_id
                            LEFT JOIN categories ON categories.id = products.category_id
                            LEFT JOIN detail_product dp_size ON dp_size.product_id = products.id
                            LEFT JOIN size ON size.id = dp_size.size_id
                            LEFT JOIN detail_product dp_color ON dp_color.product_id = products.id
                            LEFT JOIN color ON color.id = dp_color.color_id
                        WHERE
                            product_sale.active = 1
                            AND products.category_id IN ( SELECT id FROM CategoryCTE ) 
                            AND products.deleted_at IS NULL
                            AND product_sale.time_sale > CURDATE() AND products.deleted_at IS NULL ';
                    (isset($arrSizeCondition) && $arrSizeCondition != '') ? $select .= $arrSizeCondition : '';
                    (isset($arrColorCondition) && $arrColorCondition != '') ? $select .= $arrColorCondition : '';
                    $select .= ($title !== '') ? ' AND products.title LIKE "%'.$title.'%" ' : '';
                    $select .= 'GROUP BY products.id ORDER BY ' . $condition . ' ' . $orderBy .' LIMIT ' . $start .', ' . $limit;
                break;
            case 'featured-product':
                $count = 'WITH RECURSIVE CategoryCTE AS (
                            SELECT id, parent_id, name
                            FROM categories
                            WHERE id IN ('. $category_id .') UNION ALL
                        SELECT c.id, c.parent_id, c.name
                            FROM categories c
                            INNER JOIN CategoryCTE ON c.parent_id = CategoryCTE.id)
                        SELECT COUNT(products.id) AS countIdProduct
                            FROM products
                                LEFT JOIN product_sale ON product_sale.product_id = products.id
                                LEFT JOIN discounts ON discounts.id = products.discount_id
                                LEFT JOIN detail_product dp_size ON dp_size.product_id = products.id
                                LEFT JOIN size ON size.id = dp_size.size_id
                                LEFT JOIN detail_product dp_color ON dp_color.product_id = products.id
                                LEFT JOIN color ON color.id = dp_color.color_id
                            WHERE products.product_hot = 1 AND products.category_id IN (SELECT id FROM CategoryCTE) 
                                AND products.deleted_at IS NULL ';
                (isset($arrSizeCondition) && $arrSizeCondition != '') ? $count .= $arrSizeCondition : '';
                (isset($arrColorCondition) && $arrColorCondition != '') ? $count .= $arrColorCondition : '';
                $count .= ($title !== '') ? ' AND products.title LIKE "%'.$title.'%" ' : '';
                $count .= ' GROUP BY (products.id)';
                $categories = 'SELECT categories.id AS id_category,
                                        categories.name AS categoryName
                                FROM categories
                                WHERE  parent_id = 0';
                $select = 'WITH RECURSIVE CategoryCTE AS
                            (SELECT id, parent_id, name FROM categories WHERE id IN (' . $category_id . ')
                            UNION ALL SELECT c.id, c.parent_id, c.name FROM categories c
                            INNER JOIN CategoryCTE ON c.parent_id = CategoryCTE.id)
                            SELECT discounts.discount_percent AS discountPercent, products.title,products.description, products.id
                            FROM products
                                LEFT JOIN discounts ON discounts.id = products.discount_id
                                LEFT JOIN categories ON categories.id = products.category_id
                                LEFT JOIN detail_product dp_size ON dp_size.product_id = products.id
                                LEFT JOIN size ON size.id = dp_size.size_id
                                LEFT JOIN detail_product dp_color ON dp_color.product_id = products.id
                                LEFT JOIN color ON color.id = dp_color.color_id
                            WHERE products.product_hot = 1
                            AND products.category_id IN (SELECT id FROM CategoryCTE) AND products.deleted_at IS NULL ';
                    (isset($arrSizeCondition) && $arrSizeCondition != '') ? $select .= $arrSizeCondition : '';
                    (isset($arrColorCondition) && $arrColorCondition != '') ? $select .= $arrColorCondition : '';
                    $select .= ($title !== '') ? ' AND products.title LIKE "%'.$title.'%" ' : '';
                    $select .= 'GROUP BY category_id ORDER BY ' . $condition . ' ' . $orderBy .' LIMIT ' . $start .', ' . $limit;
                break;
            case 'category':
                $count = 'WITH RECURSIVE CategoryCTE AS
                                (SELECT id, parent_id, name FROM categories WHERE id IN (' . $category_id . ')
                                UNION ALL SELECT c.id, c.parent_id, c.name FROM categories c
                                INNER JOIN CategoryCTE ON c.parent_id = CategoryCTE.id)
                            SELECT COUNT(products.id) AS countIdProduct
                            FROM products
                                LEFT JOIN detail_product dp_size ON dp_size.product_id = products.id
                                LEFT JOIN size ON size.id = dp_size.size_id
                                LEFT JOIN detail_product dp_color ON dp_color.product_id = products.id
                                LEFT JOIN color ON color.id = dp_color.color_id
                            WHERE category_id IN (SELECT id FROM CategoryCTE) AND products.deleted_at IS NULL ';
                (isset($arrSizeCondition) && $arrSizeCondition != '') ? $count .= $arrSizeCondition : '';
                (isset($arrColorCondition) && $arrColorCondition != '') ? $count .= $arrColorCondition : '';
                $count .= ($title !== '') ? ' AND products.title LIKE "%'.$title.'%" ' : '';
                $count .= ' GROUP BY (products.id)';
                $categories = 'WITH RECURSIVE CategoryCTE AS ( SELECT id, parent_id, name FROM categories WHERE id IN (' . $category_id . ')
                                    UNION ALL SELECT c.id, c.parent_id, c.name
                                    FROM categories c INNER JOIN CategoryCTE ON c.parent_id = CategoryCTE.id
                                    WHERE c.parent_id IN (' . $category_id . ') )
                                SELECT categories.id AS id_category,
                                    categories.name AS categoryName,
                                    COUNT(products.category_id) AS countCategoryProduct
                                FROM products
                                    LEFT JOIN categories ON categories.id = products.category_id
                                WHERE products.category_id IN ( SELECT id FROM CategoryCTE )
                                GROUP BY products.category_id';
                $select = 'WITH RECURSIVE CategoryCTE AS
                            (SELECT id, parent_id, name FROM categories WHERE id IN (' . $category_id . ')
                            UNION ALL SELECT c.id, c.parent_id, c.name
                            FROM categories c INNER JOIN CategoryCTE ON c.parent_id = CategoryCTE.id)
                            SELECT discounts.discount_percent AS discountPercent, products.title,products.description, products.id
                            FROM products
                                LEFT JOIN discounts ON discounts.id = products.discount_id
                                LEFT JOIN categories ON categories.id = products.category_id
                                LEFT JOIN detail_product dp_size ON dp_size.product_id = products.id
                                LEFT JOIN size ON size.id = dp_size.size_id
                                LEFT JOIN detail_product dp_color ON dp_color.product_id = products.id
                                LEFT JOIN color ON color.id = dp_color.color_id
                            WHERE category_id IN (SELECT id FROM CategoryCTE) AND products.deleted_at IS NULL ';
                    (isset($arrSizeCondition) && $arrSizeCondition != '') ? $select .= $arrSizeCondition : '';
                    (isset($arrColorCondition) && $arrColorCondition != '') ? $select .= $arrColorCondition : '';
                    $select .= ($title !== '') ? ' AND products.title LIKE "%'.$title.'%" ' : '';
                    $select .= 'GROUP BY id ORDER BY ' . $condition . ' ' . $orderBy .' LIMIT ' . $start .', ' . $limit;
                break;
            default:
                $count = 'WITH RECURSIVE CategoryCTE AS
                                (SELECT id, parent_id, name FROM categories WHERE id IN (' . $category_id . ')
                                UNION ALL SELECT c.id, c.parent_id, c.name FROM categories c
                                INNER JOIN CategoryCTE ON c.parent_id = CategoryCTE.id)
                            SELECT COUNT(products.id) AS countIdProduct
                            FROM products
                                LEFT JOIN detail_product dp_size ON dp_size.product_id = products.id
                                LEFT JOIN size ON size.id = dp_size.size_id
                                LEFT JOIN detail_product dp_color ON dp_color.product_id = products.id
                                LEFT JOIN color ON color.id = dp_color.color_id
                            WHERE products.category_id IN (SELECT id FROM CategoryCTE) AND products.deleted_at IS NULL ';
                (isset($arrSizeCondition) && $arrSizeCondition != '') ? $count .= $arrSizeCondition : '';
                (isset($arrColorCondition) && $arrColorCondition != '') ? $count .= $arrColorCondition : '';
                $count .= ($title !== '') ? ' AND products.title LIKE "%'.$title.'%" ' : '';
                $count .= ' GROUP BY (products.id)';
                $categories = 'SELECT categories.id AS id_category,
                                        categories.name AS categoryName
                                FROM categories
                                WHERE  parent_id = 0';
                $select = 'WITH RECURSIVE CategoryCTE AS
                                (SELECT id, parent_id, name FROM categories
                                WHERE id IN (' . $category_id . ')
                                UNION ALL SELECT c.id, c.parent_id, c.name
                                FROM categories c
                                INNER JOIN CategoryCTE ON c.parent_id = CategoryCTE.id)
                            SELECT discounts.discount_percent AS discountPercent, products.title,products.description, products.id
                            FROM products
                                LEFT JOIN discounts ON discounts.id = products.discount_id
                                LEFT JOIN categories ON categories.id = products.category_id
                                LEFT JOIN detail_product dp_size ON dp_size.product_id = products.id
                                LEFT JOIN size ON size.id = dp_size.size_id
                                LEFT JOIN detail_product dp_color ON dp_color.product_id = products.id
                                LEFT JOIN color ON color.id = dp_color.color_id
                            WHERE products.category_id IN (SELECT id FROM CategoryCTE) AND products.deleted_at IS NULL ';
                (isset($arrSizeCondition) && $arrSizeCondition != '') ? $select .= $arrSizeCondition : '';
                (isset($arrColorCondition) && $arrColorCondition != '') ? $select .= $arrColorCondition : '';
                $select .= ($title !== '') ? ' AND products.title LIKE "%'.$title.'%" ' : '';
                $select .= 'GROUP BY id ORDER BY ' . $condition . ' ' . $orderBy .' LIMIT ' . $start .', ' . $limit;
                break;
        }
        $result = [];
        $result['count'] = $db->getList($count)->rowCount();
        $result['list_products'] = $db->getList($select);
        $result['categories'] = $db->getList($categories);
        return $result;
    }

    function getImageProduct($id) {
        $db = new Connect();
        $select = "SELECT image FROM product_images WHERE product_id = $id";
        $result = $db->getList($select);
        return $result;
    }

    function getPriceImageQuantity($id) {
        $db = new Connect();
        $select = "SELECT price, quantity, image_product, size_id, color_id, size.name as sizeName, color.name colorName
                    FROM detail_product 
                    LEFT JOIN size ON size.id = detail_product.size_id
                    LEFT JOIN color ON color.id = detail_product.color_id
                    WHERE product_id = $id";
        $result = $db->getList($select);
        return $result;
    }

    function getColorProduct($idProduct) {
        $db = new Connect();
        $select = 'SELECT detail_product.product_id,
                            detail_product.color_id,
                            detail_product.image_product, 
                            detail_product.price,
                            detail_product.size_id,
                            color.name
                    FROM detail_product
                    LEFT JOIN color ON color.id = detail_product.color_id
                    LEFT JOIN products ON products.id = detail_product.color_id
                    WHERE detail_product.product_id = '. $idProduct .' GROUP BY (detail_product.color_id)';
        $result = $db->getList($select);
        return $result;
    }

    function getSizeProduct($idProduct) {
        $db = new Connect();
        $select = 'SELECT size.id, size.name, detail_product.price, detail_product.color_id
                    FROM size
                        LEFT JOIN detail_product ON detail_product.size_id = size.id
                    WHERE detail_product.product_id = ' . $idProduct . ' GROUP BY (detail_product.size_id)';
        $result = $db->getList($select);
        return $result;
    }

    function getSizeChangeColor($color_id, $product_id) {
        $db = new Connect();
        $select = "SELECT size.name, price, size_id FROM detail_product LEFT JOIN size ON size.id = detail_product.size_id WHERE product_id = $product_id and color_id = $color_id";
        $result = $db->getList($select);
        return $result;
    }

    //get list color all
    function getColor () {
        $db = new Connect();
        $select = 'SELECT color.name AS color_name, color.id AS color_id FROM color';
        $result = $db->getList($select);
        return $result;
    }
    
    //get list size all
    function getSize () {
        $db = new Connect();
        $select = 'SELECT size.name AS size_name, size.id AS size_id FROM size';
        $result = $db->getList($select);
        return $result;
    }
}
