<?php  
include 'connection.php'; 
if(isset($_POST["query"])) 
 {  
      $output = '';  
      $query = "SELECT * FROM products WHERE p_id LIKE '".$_POST["query"]."'";  
      $result = mysqli_query($connect, $query);  
      
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                
                $price = $row["price"];
                
           }  
      }  
   
 
      echo $price;
 }  
 ?> 