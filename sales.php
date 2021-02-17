
<!DOCTYPE html>
<html>
<head>
	<!-- js -->		
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
<title>
POS
</title>
    <link rel="shortcut icon" href="images/pos.jpg">
<?php
	require_once('auth.php');
?>
       
		<link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
  <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

	<!-- combosearch box-->	
	
	  <script src="vendors/jquery-1.7.2.min.js"></script>
    <script src="vendors/bootstrap.js"></script>

	<link rel="stylesheet" href="select2.min.css" />
	
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script>
function sum() {
	
			var txtFirstNumberValue = document.getElementById('qty').value;
            var txtSecondNumberValue = document.getElementById('price').value;
			var result = parseFloat(txtFirstNumberValue) * parseFloat(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('totalp').value = result;
				
            }
				
	
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
			var first = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue)/100;
            var result = parseInt(txtFirstNumberValue) - parseInt(first);
            if (!isNaN(result)) {
                document.getElementById('txt3').value = result;
				document.getElementById('grand').value = result;
            }
			
			
			 var txtFirstNumberValue = document.getElementById('txt3').value;
            var txtSecondNumberValue = document.getElementById('tax').value;
			var first = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue)/100;
            var result = parseInt(txtFirstNumberValue) + parseInt(first);
            if (!isNaN(result)) {
                document.getElementById('grand').value = result;
				document.getElementById('taxpaid').value = first;
				
            }
			
			
			 var txtFirstNumberValue = document.getElementById('payment').value;
            var txtSecondNumberValue = document.getElementById('grand').value;
            var result = parseInt(txtSecondNumberValue)- parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('change').value = result;
				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt4').value;
			 var result = parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt5').value = result;
				}

			
        }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>


</head>




<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode=date("mdy").'-'.createRandomPassword();
?>



<body>
<?php include('navfixed.php');?>
	<?php
$position=$_SESSION['SESS_LAST_NAME'];
 {
?>
	
<?php include('nav.php');?>
<?php } ?>				
          
	<div class="span10">
		<div class="contentheader">
			<i class="icon-money"></i> Sales
			</div>
			<ul class="breadcrumb">
			<a href="index.php"><li>Dashboard</li></a> /
			<li class="active">Sales</li>
			</ul>
<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
</div>
													
<form action="incomingsales.php" method="post" >
User Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<input readonly type="text" name="ptype" value="<?php echo $position;  ?>"  style="width: 215px; background:#0066cc; color:#fff;font-size: 10px;"/></br>
Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<input  readonly type="text" name="date" value="<?php date_default_timezone_set('Asia/Dhaka'); echo date("Y-m-d"); ?>" style="width: 90px; background:#ff0000; color:#fff;font-size: 10px;"/>	</br>							
Transaction ID:<input readonly type="text" name="invoice" value="<?php echo $_GET['invoice']; ?>"  style="width: 215px; background:#0066cc; color:#fff;font-size: 10px;"/></br>


<input list="myCompanies" autocomplete="off" name="product" id="product" style="width:150px;font-size: 15px;" placeholder="Select Product" required/>
<datalist id="myCompanies">

	
 <script>  
 $(document).ready(function(){  
      $('#product').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"search3.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                         $('#myCompanies').fadeOut();
                         $("#myCompanies").html(data);
                           
                     }  
                });  
           }  
      });  
  
 });  
 </script>
</datalist>
  

 <script>  
 $(document).ready(function(){  
      $('#product').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"search1.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                         document.getElementById('name').value = data;
                           
                     }  
                });  
           }  
      });  
  
 });  
 </script>

 <script>  
 $(document).ready(function(){  
      $('#product').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"search5.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                         document.getElementById('price').value = data;
                           
                     }  
                });  
           }  
      });  
  
 });  
 </script>

<input type="text" name="name" value="" id="name"  style="width: 300px; height: 35px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" readonly> 



<input type="text" name="qty" id="qty" onkeyup="sum();" value="0" step="any" placeholder="Qty" autocomplete="off" style="width: 68px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:10px;background:#000099; color:#fff;" required>
<input type="text" name="price"  id="price" onkeyup="sum();" value=""  step="any" placeholder="Price"  style="width: 68px;  padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:10px;background:#000099; color:#fff;"  required>
<input type="text" name="totalp" id="totalp" onkeyup="sum();" value=""  placeholder="Total" style="width: 68px;  padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:10px;background:#000099; color:#fff;" required>

<Button type="submit" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;" /><i class="icon-plus-sign icon-large"></i> Add</button>

</form>
<script src='insert.js'></script>

<table class="table table-bordered" id="resultTable" data-responsive="table">
	<thead>
		<tr>
			<th> Product Name </th>
	
			<th> Qty </th>
		
		
			<th> Rate </th>
			<th> Amount </th>
			
			
			<th width="40%"> Action </th>
		</tr>
	</thead>
	<tbody>
		

			
			<?php



				$id=$_GET['invoice'];
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
				$result->bindParam(':userid', $id);
				$result->execute();
				for($i=1; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			
			
			<td hidden><?php echo $row['p_id']; ?></td>
			<td><?php echo $row['p_name']; ?></td>
	
			<td><?php echo $row['qty']; ?></td>
			
			<td><?php echo $row['rate']; ?></td>
			<td> <?php echo $row['total']; ?></td>
	
			<td >

			<a href="deletesales.php?id=<?php echo $row['p_id']; ?>&invoice=<?php echo $_GET['invoice']; ?>&qty=<?php echo $row['qty'];?>&code=<?php echo $row['product'];?>&tid=<?php echo $row['transaction_id'];?>"><button class="btn btn-mini btn-warning"><i class="icon icon-remove"></i> Cancel </button></a></td>
			</tr>	
			<?php
				}
			?>
		
			
			
			
			<tr >
			<form action="savesales.php" method="POST">
				<th colspan="4"><strong style="font-size: 12px; color: #222222;"></strong>
				
				<?php
				
				$sdsd=$_GET['invoice'];
				$resultas = $db->prepare("SELECT * FROM sales WHERE invoice= :a");
				$resultas->bindParam(':a', $sdsd);
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$fgfgas=$rowas['status'];
				echo ($fgfgas);
				}
				?>
				
				
				</th>
				<td colspan="1" style="background:#66ccff; color:#000000;font-size: 10px;">
				
				Total Amount:&nbsp;&nbsp;&nbsp;<b><input type="text" name="txt1" onkeyup="sum();" value="<?php
				
				$sdsd=$_GET['invoice'];
				$resultas = $db->prepare("SELECT sum(total) FROM sales_order WHERE invoice= :a");
				$resultas->bindParam(':a', $sdsd);
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$fgfg=$rowas['sum(total)'];
				echo ($fgfg);
				}
				?>"  id="txt1" style="width: 150px; background:#000099; color:#fff;font-size: 12px;" > Tk</b>
				
			</td>
				
			</tr>
			
			<tr>
				<th colspan="4"></th>
				
				<td style="background:#ffffff; color:#000000;">
		
			<!--    Discount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  :  ---><b><input type="hidden" id="txt2" onkeyup="sum();" name="txt2" style="width: 50px; background:#fff; color:#000;font-size: 10px;" placeholder="Discount"
			    value="0" hidden/> </b> <!-- % -->
			<!-- 	After Discount :--><b><input type="hidden" id="txt3" name="txt3" style="width: 150px; background:#fff; color:#000;font-size: 10px;" placeholder="After Discount"
				
				value="<?php
				
				$sdsd=$_GET['invoice'];
				$resultas = $db->prepare("SELECT sum(total) FROM sales_order WHERE invoice= :a");
				$resultas->bindParam(':a', $sdsd);
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$fgfg=$rowas['sum(total)'];
				echo ($fgfg);
				}
				?>" hidden/> </b> </br>
			<!-- 	Tax &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :---><b><input type="hidden" name="tax"  id="tax" onkeyup="sum();"  placeholder="Tax" 
				value="0" hidden/></b> <!-- %--->
				
			<!-- 	Net Tax &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :---><b><input type="hidden" name="taxpaid"  id="taxpaid" onkeyup="sum();" style="width: 100px; background:#fff; color:#000;font-size: 10px;" placeholder="Tax paid"
				value="<?php
				
				$sdsd=$_GET['invoice'];
				$resultas = $db->prepare("SELECT * FROM sales WHERE invoice= :a");
				$resultas->bindParam(':a', $sdsd);
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$fgfg=$rowas['net_tax'];
				echo ($fgfg);
				}
				?>" hidden/></b> 
				</br>   
				Grand Total &nbsp;&nbsp;&nbsp;&nbsp; :<input type="text" name="grand"  id="grand" onkeyup="sum();" style="width: 200px;height:25px; background:#000; color:#fff;font-size: 13px;" placeholder="Grand Total"
				value="<?php
				
				$sdsd=$_GET['invoice'];
				$resultas = $db->prepare("SELECT sum(total) FROM sales_order WHERE invoice= :a");
				$resultas->bindParam(':a', $sdsd);
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$fgfg=$rowas['sum(total)'];
				echo ($fgfg);
				}
				?>">
				</br>
				Customer Name&nbsp; :<input type="text" name="customer1"   style="width: 200px;height:25px; background:#000; color:#fff;font-size: 13px;" placeholder="Customer name"
				value="Walking Customer" >
				</br> 
				Company Name:




<select name="customer" id="country" style="width:250px;height:80px;"  >

<option></option>
	<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM customer ");
		$result->bindParam(':userid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
	
		<option value="<?php echo $row['customer_id'];?>"> <?php echo $row['customer_name']; ?></option>
	<?php
				}
			?>
</select>

</br>
</br>
				Cus Payment &nbsp;&nbsp; :<input type="text" name="payment"  id="payment" onkeyup="sum();" style="width: 200px;height:25px; background:#000; color:#fff;font-size: 13px;" placeholder="Cus Payment"
				value="<?php
				
				$sdsd=$_GET['invoice'];
				$resultas = $db->prepare("SELECT * FROM sales WHERE invoice= :a");
				$resultas->bindParam(':a', $sdsd);
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$fgfg=$rowas['cus_payed'];
				echo ($fgfg);
				}
				?>" required>
				</br>
				Change &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :<input type="text" name="change"  id="change" onkeyup="sum();" style="width: 200px;height:25px; background:#000; color:#fff;font-size: 13px;" placeholder="Change"
				value="<?php
				
				$sdsd=$_GET['invoice'];
				$resultas = $db->prepare("SELECT * FROM sales WHERE invoice= :a");
				$resultas->bindParam(':a', $sdsd);
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$fgfg=$rowas['changes'];
				echo ($fgfg);
				}
				?>">
				</br>
                <input  name="ptype" value="<?php echo $_GET['id']?>" hidden/>
				<input  name="invoice" value="<?php echo $_GET['invoice']?>" hidden/>
				<input  name="cashier" value="<?php echo $_SESSION['SESS_LAST_NAME'];?>" hidden/>
				<input type="hidden" name="date" value="<?php echo date("Y-m-d"); ?>" hidden/>
				<input type="hidden" name="tab" value="<?php
				
				$sdsd=$_GET['invoice'];
				$resultas = $db->prepare("SELECT tab FROM table_order WHERE invoice= :a");
				$resultas->bindParam(':a', $sdsd);
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$fgfg=$rowas['tab'];
				echo ($fgfg);
				}
				?>" > 
				 </b>
				 </br>
				Employee ID:<input type="text" name="employee"  style="width: 200px;height:25px; background:#000; color:#fff;font-size: 13px;"
				value="<?php
				
				
				echo $_SESSION['SESS_MEMBER_ID'];
				?>" readonly>
				
</br>

<input type="hidden" name="user" value="<?php echo $position;  ?>"  style="width: 215px; background:#0066cc; color:#fff;font-size: 10px;"/></br>
<input type="hidden" name="date" value="<?php echo date("Y-m-d"); ?>" style="width: 90px; background:#ff0000; color:#fff;font-size: 10px;"/>	</br>	
Timestamp:      <input type="text" name="tim" value="<?php date_default_timezone_set('Asia/Dhaka'); echo date("h:i"); ?>" style="width: 100px; background:#ff0000; color:#fff;font-size: 10px;" readonly/>	</br>
<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>"  style="width: 215px; background:#0066cc; color:#fff;font-size: 10px;"/></br>

<?php
				
				$sdsd=$_GET['invoice'];
				$resultas = $db->prepare("SELECT * FROM sales WHERE invoice= :a");
				$resultas->bindParam(':a', $sdsd);
				$resultas->execute();
				for($i=0; $rowas = $resultas->fetch(); $i++){
				$s=$rowas['status'];
			
				}	
	
                
                if($s=="Sales Complete"){
                    echo'<button class="btn btn-success  btn-block" disabled>Sales</button>'

;
                }
                
               else
				{
				    echo'<button  class="btn btn-success  btn-block">Sales</button>';
				    
				}
				
                ?>

				</form>

				<?php 
include('../connect.php');
				$query0 = mysql_query("SELECT MAX(transaction_id) as maximum FROM sales"); 
				$row0 = mysql_fetch_array($query0);
				$highest_id = $row0['maximum'];
				?>
				
				<a href="sales.php?invoice=<?php echo $_SESSION['SESS_LAST_NAME'];?>-<?php echo $finalcode?>-<?php echo $highest_id+12341;?>"><button class="btn btn-danger  btn-block"><i class="icon "></i> New Sale</button></a>
				</td>
				
				
			
				
				
			</tr>
			
				
		
	</tbody>
</table><br>


<div class="clearfix"></div>
</div>
</div>
</br>
</br>
</br>

</div>
<script src="select2.min.js"></script>
<script>
$("#country").select2( {
 placeholder: "Select Company",
 allowClear: true
 } );
</script>

</body>
<?php include('footer.php');?>
</html>