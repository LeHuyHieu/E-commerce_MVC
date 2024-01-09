<?php
$order_db = new Orders();
$list_districts = [];
if (isset($_POST['city_id']) && $_POST['city_id'] == 'Please choose') {
    $list_districts = [];
}else {
    $id = $_POST['city_id'];
    $list_districts = $order_db->getDistrict($id);
}
?>

<div class="country-select clearfix">
    <label>District <span class="required">*</span></label>
    <select class="nice-select wide" name="district" id="selectDistrict">
        <?php 
            if (count($list_districts) > 0) {
            foreach ($list_districts as $district) { 
        ?>
            <option value="<?php echo $district['id'];?>"><?php echo $district['name'];?></option>
        <?php } }else { ?>
            <option value="">Choose city</option>
        <?php } ?>
    </select>
</div>