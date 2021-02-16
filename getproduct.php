<?php

include_once "connection.php";

$id = $_GET["id"];


$sql = "SELECT * FROM student where id = '$id'";
$res2 = mysqli_query($conn, $sql2);
$row = mysqli_fetch_assoc($res2);
$responce = $row;

header('content-type: application/json');

echo json_encode($responce);


// if($result->num_rows > 0){
//     $data = array();
//     while($row = $result->fetch_assoc()){
//         $data[] = $row;
//     }
// }
// echo json_encode($data)t

// $select=$pdo->prepare("SELECT * FROM `products` where id = :ppid");
// $select->bindParam(":ppid", $id);
// $select->exceute();

// $row=$select->fetch(PDO::FETCH_ASSOC);

// $responce = $row;

// header('content-type: application/json');

// echo json_encode($responce);
?>