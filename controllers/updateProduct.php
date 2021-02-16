<?php

if (isset($_POST['updateProduct'])) {

    include "connection.php";

    $id = $_POST['id'];
    $brand_name = $_POST['brand_name'];
    $product_name = $_POST['product_name'];
    $selling_price = $_POST['selling_price'];
    $original_price = $_POST['original_price'];
    $qty = $_POST['qty'];

    $query= "UPDATE `products` SET `brand_name`='$brand_name',`product_name`='$product_name',`selling_price`='$selling_price', `original_price`='$original_price',`qty`='$qty',`selling_price`='$editSellingPrice'";

    $result = mysqli_query($conn, $query);

}


?>
