<?php

    if (isset($_POST['editClient'])) {

        include 'connection.php';

        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $address = $_POST['address'];
        $shipment = $_POST['shipment'];
        $contact = $_POST['contact'];
        $date = $_POST['date'];
        $note = $_POST['note'];
        $payed_amount = $_POST['payed_amount'];
        $due_amount = $_POST['due_amount'];

        $query= "UPDATE `clients` SET `full_name`='$full_name',`address`='$address',`shipment`='$shipment',`contact`='$contact', `date`='$date', `note`='$note',`payed_amount`='$payed_amount',`due_amount`='$due_amount' WHERE  `id`='$id'";
        $result = mysqli_query($conn, $query);

    }

?>

