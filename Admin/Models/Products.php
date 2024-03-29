<?php
class Products extends DB
{
    private $db;
    public function __construct()
    {
        $this->db = new DB();
    }

    //product attributes
    public function insertAttrColor($data)
    {
        $result = $this->db->insert('color', $data);
        return $result;
    }

    public function insertAttrSize($data)
    {
        $result = $this->db->insert('size', $data);
        return $result;
    }

    public function getAttrColor()
    {
        $result = $this->db->getList("SELECT * FROM color ORDER BY id DESC");
        return $result;
    }

    public function getAttrSize()
    {
        $result = $this->db->getList("SELECT * FROM size ORDER BY id DESC");
        return $result;
    }

    public function getAllDiscount()
    {
        $result = $this->db->getList("SELECT name, discount_percent, id, description FROM discounts where active = 1 AND deleted_at IS NULL ORDER BY id DESC");
        return $result;
    }
    public function getAllProducts()
    {
        if (isset($_GET['category_id']) && !empty($_GET['category_id'])) {
            $category_id = $_GET['category_id'];
        }
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $title = $_GET['title'];
        }

        $select = "SELECT pr.id, product_hot, title, pr.created_at, discounts.name AS discount_name, categories.name AS category_name
                    FROM products pr
                    LEFT JOIN discounts ON discounts.id = pr.discount_id
                    LEFT JOIN categories ON categories.id = pr.category_id
                    WHERE pr.deleted_at IS NULL ";
        isset($category_id) ? $select .= " AND pr.category_id = $category_id " : "";
        isset($title) ? $select .= " AND pr.title like '%$title%'" : "";
        $result = $this->db->getList($select);
        return $result;
    }
    public function getAllProductsPagination($start, $limit)
    {
        if (isset($_GET['category_id']) && !empty($_GET['category_id'])) {
            $category_id = $_GET['category_id'];
        }
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $title = $_GET['title'];
        }
        $select = "SELECT pr.id, product_hot, title, pr.created_at, discounts.name AS discount_name, categories.name AS category_name
                    FROM products pr
                    LEFT JOIN discounts ON discounts.id = pr.discount_id
                    LEFT JOIN categories ON categories.id = pr.category_id
                    WHERE pr.deleted_at IS NULL ";
        isset($category_id) ? $select .= " AND pr.category_id = $category_id " : "";
        isset($title) ? $select .= " AND pr.title like '%$title%'" : "";
        $select .= " ORDER BY pr.created_at DESC LIMIT $start, $limit";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getDetailProductOneRow($product_id)
    {
        $select = "SELECT DISTINCT price,quantity,image_product FROM detail_product d_pr LEFT JOIN products ON products.id = d_pr.product_id WHERE d_pr.product_id = $product_id";
        $result = $this->db->getInstance($select);
        return $result;
    }

    public function getDetailproductAllRow($product_id)
    {
        $select = "SELECT price, quantity, image_product, color_id, size_id, id FROM detail_product d_pr WHERE d_pr.product_id = $product_id";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getListImageDetailProduct($product_id)
    {
        $select = "SELECT image, id FROM product_images WHERE product_id = $product_id";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getProductSale ($product_id) 
    {
        $select = "SELECT time_sale FROM product_sale WHERE product_id = $product_id AND active = 1";
        $result = $this->db->getInstance($select);
        return $result;
    }
}
