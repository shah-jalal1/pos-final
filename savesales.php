<?php

session_start();
include('../connect.php');
$a = $_POST['txt1'];
$b = $_POST['txt2'];
$c = $_POST['txt3'];
$d = $_POST['tax'];
$e = $_POST['taxpaid'];
$f = $_POST['grand'];
$g = $_POST['customer'];
$ghi = $_POST['customer1'];
$h = $_POST['payment'];
$i = $_POST['change'];
$j = $_POST['employee'];
$k = $_POST['user'];
$l = $_POST['date'];
$m = $_POST['invoice'];
$tim = $_POST['tim'];


// query
$sql = "INSERT INTO sales (invoice,total,discount,af_discount,tax,net_tax,grand,customer,customer1,cus_payed,changes,employee,users,date,status,curtime)
VALUES (:a,:b,:c,:d,:e,:f,:g,:h,:hi,:i,:j,:k,:l,:m,:n,:o)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$m,':b'=>$a,':c'=>$b,':d'=>$c,':e'=>$d,':f'=>$e,':g'=>$f,':h'=>$g,':hi'=>$ghi,':i'=>$h,':j'=>$i,':k'=>$j,':l'=>$k,':m'=>$l,':n'=>'Sales Complete',':o'=>$tim));

$sql = "UPDATE settings 
        SET amount=amount+?
		WHERE pr_id=1";
$q = $db->prepare($sql);
$q->execute(array($h));

$du=$f-$h;

$sql = "UPDATE customer 
        SET due=due+?, payed=payed+?, total=total+?
		WHERE customer_id=?";
$q = $db->prepare($sql);
$q->execute(array($du,$h,$f,$g));

header("location: sales.php?invoice=$m");


?>