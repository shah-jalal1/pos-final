<?php 
include 'connection.php'; 
if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM products WHERE gen_name LIKE '".$_POST["query"]."%' OR p_id LIKE '".$_POST["query"]."' ";  
      $result = mysqli_query($connect, $query);  
      $output = '<select>';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                
                $output .= '<option value='.$row["p_id"].' style="width:100%;font-size:16px;">'.$row["gen_name"].'-'.$row["power"].'-'.$row["package_type"].'-Price-'.$row["price"].'-Qty:'.$row["qty"].'</option>';  
           }  
      }  
      else  
      {  
           $output .= '<option>Product Not Found</option>';  
      }  
      $output .= '</select>';  
      echo $output;  
 }  
 ?> 