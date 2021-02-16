<?php

    if (isset($_POST['editSupplier'])) {

        include 'connection.php';

        $id = $_POST['id'];
        $full_name = $_POST['company_name'];
        $address = $_POST['address'];
        $contact_person = $_POST['contact_person'];
        $contact = $_POST['contact'];
        $note = $_POST['note'];
        $payed_amount = $_POST['payed_amount'];
        $due_amount = $_POST['due_amount'];

        $query= "UPDATE `clients` SET `company_name`='$company_name',`address`='$address',`contact_person`='$contact_person',`contact`='$contact',`note`='$note',`payed_amount`='$payed_amount',`due_amount`='$due_amount' WHERE  `id`='$id'";
        $result = mysqli_query($conn, $query);

    }

?>

