<?php

include "connection.php";

if (isset($_POST['saveProducts'])) {

    $brand_name = $_POST['brand_name'];
    $product_name = $_POST['product_name'];
    $ganeric_name = $_POST['ganeric_name'];
    $orginal_Price = $_POST['orginal_Price'];
    $box_per_rate = $_POST['box_per_rate'];
    $power = $_POST['power'];
    $box_per_rate = $_POST['box_per_rate'];
    $location = $_POST['location'];
    $category = $_POST['category'];
    $date = $_POST['date'];

    $query = "INSERT INTO `products`(`brand_name`, `product_name`, `ganeric_name`,  `power`, `selling_price`, `orginal_Price`, `quantity`, `box_per_rate`, `location`,`category`,`date`); 
              VALUES ('$brand_name', '$product_name', '$ganeric_name', '$power', '$selling_price', '$orginal_Price', '$quantity', '$box_per_rate', '$location', '$category', '$date')";
    $result = mysqli_query($conn, $query);

}

?>