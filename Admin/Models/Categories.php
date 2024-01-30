<?php
class Categories extends DB
{
    private $db;
    public function __construct()
    {
        $this->db = new DB();
    }

    public function getCategory()
    {
        $select = 'SELECT name, id, banner_image FROM categories WHERE parent_id = 0';
        $result = $this->db->getList($select);
        return $result;
    }

    public function getAllCategories()
    {
        $select = "SELECT c1.name, c1.id, c1.banner_image, c1.parent_id, c1.created_at, c2.name AS parent_name 
                    FROM categories c1 LEFT JOIN categories c2 ON c1.parent_id = c2.id";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getAllCategoriesPagination($start, $limit)
    {
        if (isset($_GET['name']) && !empty($_GET['name'])) {
            $name = $_GET['name'];
        }
        if (isset($_GET['parent_id']) && !empty($_GET['parent_id'])) {
            $parent_id = $_GET['parent_id'];
        }
        $select = "SELECT c1.name, c1.id, c1.banner_image, c1.parent_id, c1.created_at, c2.name AS parent_name 
                    FROM categories c1 LEFT JOIN categories c2 ON c1.parent_id = c2.id
                    WHERE 1";
        isset($parent_id) ? $select .= " and c1.parent_id = $parent_id" : '';
        isset($name) ? $select .= " and c1.name like '%$name%'" : '';
        $select .= " ORDER BY c1.id DESC LIMIT $start, $limit";
        $result = $this->db->getList($select);
        return $result;
    }

    public function getCategoryEdit($id)
    {
        $select = "SELECT DISTINCT name, id, banner_image, parent_id FROM categories WHERE id = $id";
        $result = $this->db->getInstance($select);
        return $result;
    }

    public function getSubCategory($id)
    {
        $select = 'SELECT name, id FROM categories WHERE parent_id = ' . $id;
        $result = $this->db->getList($select);
        return $result;
    }

    public function selectCategories($categories, $selected = 0, $selectedCategory = null, $prefix = '')
    {
        while ($item = $categories->fetch()) {
            $isSelected = ($selected == $item['id']) ? 'selected' : '';

            echo '<option ' . $isSelected . ' value="' . $item['id'] . '">' . $prefix . $item['name'] . '</option>';

            $subCategories = $this->getSubCategory($item['id']);
            if ($subCategories->rowCount() > 0) {
                $this->selectCategories($subCategories, $selected, $selectedCategory, $prefix.'-- ');
            }
        }
    }

    //crud category
    public function insertCategory($data)
    {
        $result = $this->db->insert('categories', $data);
        return $result;
    }

    public function updateCategory($data, $condition)
    {
        $result = $this->db->update('categories', $data, $condition);
        return $result;
    }

    public function deleteCategory($id)
    {
        $query = "DELETE FROM categories WHERE id = $id";
        $result = $this->db->exec($query);
        return $result;
    }
}