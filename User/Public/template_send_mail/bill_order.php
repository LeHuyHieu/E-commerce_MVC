<?php 
$customValue = getenv("CUSTOM_VARIABLE") ?: "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Hello <?php echo $fullname;?></h3>
    <h3>Email: <?php echo $email_address;?></h3>
    <h3>Phone number: <?php echo $phone_number;?></h3>
    <h3>Shipping address: <?php echo $shipping_address;?></h3>
</body>
</html>