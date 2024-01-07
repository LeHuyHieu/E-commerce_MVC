<?php
$list = new ListProduct();
$product_id = isset($_POST['product_id']) ? $_POST['product_id'] : 0;
$color_id = isset($_POST['color_id']) ? $_POST['color_id'] : 0;
$discount_percent = isset($_POST['discount_percent']) ? $_POST['discount_percent'] : 0;
$list_size = $list->getSizeChangeColor($color_id, $product_id)->fetchAll();
?>

<?php
if (count($list_size) > 0) {
?>
    <div class="produt-variants-size">
        <label>Dimension</label>
        <select class="list_size" name="size_id" id="selectSizeId<?php echo $product_id;?>">
            <?php
            foreach ($list_size as $size) {
                if ($discount_percent == 0) {
            ?>
                    <option value="<?php echo $size['size_id']; ?>" data-id-product="<?php echo $product_id;?>" data-price-size="<?php echo number_format($size['price']);?>" data-color-id="<?php echo $color_id;?>"><?php echo $size['name'];?></option>
                <?php } else { ?>
                    <option value="<?php echo $size['size_id']; ?>" data-id-product="<?php echo $product_id;?>" data-price-size="<?php echo number_format($size['price'] - ($size['price'] * $discount_percent) / 100); ?>" data-color-id="<?php echo $color_id;?>"><?php echo $size['name']; ?></option>
            <?php }
            } ?>
        </select>
    </div>
<?php } ?>