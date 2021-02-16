<?php
require_once "../connection.php";
if (isset($_GET['product_delete'])) {
    $id = base64_decode($_GET['product_delete']);

    $query = "DELETE FROM `products` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $query);
    unlink("");

    header("location: ../products.php");

}
?>