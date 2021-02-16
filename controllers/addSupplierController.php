<?php

include "connection.php";

if (isset($_POST['saveSupplier'])) {

    $company_name = $_POST['company_name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $contact_person = $_POST['contact_person'];
    $date = $_POST['date'];
    $note = $_POST['note'];
    $payed_amount = $_POST['payed_amount'];
    $due_amount = $_POST['due_amount'];

    $query = "INSERT INTO `suppliers`(`company_name`, `address`, `contact_person`, `contact`, `date`, `note`, `payed_amount`, `due_amount`) VALUES('$company_name','$address', '$contact_person', '$contact', '$date', '$note', '$payed_amount', '$due_amount')";
    
    $result = mysqli_query($conn, $query);

}

?>