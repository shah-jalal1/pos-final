<?php

include "connection.php";

if (isset($_POST['saveClient'])) {

    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $shipment = $_POST['shipment'];
    $contact = $_POST['contact'];
    $date = $_POST['date'];
    $note = $_POST['note'];
    $payed_amount = $_POST['payed_amount'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    $query = "INSERT INTO `clients`(`full_name`, `address`, `shipment`, `contact`, `date`, `note`, `payed_amount`, `user_name`, `password`) VALUES('$full_name','$address', '$shipment', '$contact', '$date', '$note', '$payed_amount', '$user_name', '$password')";
    $result = mysqli_query($conn, $query);

}

?>