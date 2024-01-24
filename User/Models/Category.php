<?php
class Category extends Connect
{
    private $db;
    public function __construct()
    {
        $this->db = new Connect();
    }
    
    public function getCategory()
    {
        $select = 'SELECT name, id, banner_image FROM categories WHERE parent_id = 0';
        $result = $this->db->getList($select);
        return $result;
    }

    public function getSubCategory($id)
    {
        $select = 'SELECT name, id FROM categories WHERE parent_id = ' . $id;
        $result = $this->db->getList($select);
        return $result;
    }

    public function displayCategories($categories, $selectedCategory = null, $prefix = '')
    {
        while ($item = $categories->fetch()) {
            $isSelected = (isset($_GET['arr_category_id']) && $_GET['arr_category_id'] == $item['id']) ? 'selected' : '';

            echo '<option ' . $isSelected . ' value="' . $item['id'] . '">' . $prefix . $item['name'] . '</option>';

            $subCategories = $this->getSubCategory($item['id']);
            $this->displayCategories($subCategories, $selectedCategory, $prefix . '-- ');
        }
    }
}
