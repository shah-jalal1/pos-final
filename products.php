<?php
include "header.php";
?>

script src="http://code.jquery.com/jquery-latest.js"></script>
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


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2>Manage Products</h2>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i>Homepage</a></li>
                            <li class="breadcrumb-item active">Manage Products</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>





        <!-- Main content -->
        <section class="content">

            <div class="card">
                <div class="card-header">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddProduct">
                        Add User
                    </button>
                </div>


                <div class="card-body">

                    <div class="box">

                        <table class="table table-bordered table-striped table-responsive-sm mydatatable">      <!-- dt resposinve is from datatable-->

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Code</th>
                                <th>description</th>
                                <th>Category</th>
                                <th>Stock</th>
                                <th>Buying Price</th>
                                <th>Sell Price</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>

                            <?php

                            include "connection.php";

                            //                        $query = "SELECT * FROM products";
                            $query = "SELECT products.code, products.id, products.image, products.buying_price, products.selling_price, products.date, products.stock, products.description, category.category FROM products
                                    LEFT JOIN category ON category.id = products.id_category ORDER BY products.id DESC";
                            $result = mysqli_query($conn, $query);

                            $count = 0;


                            while ($row = mysqli_fetch_assoc($result)){
                                $count++;
                                ?>

                                <tr>
                                    <td><?= $count ?></td>
                                    <td><img src="<?= $row['image'] ?>" alt="" class="img-thumbnail" width="50px"></td>
                                    <td><?= $row['code'] ?></td>
                                    <td><?= $row['description'] ?></td>
                                    <td><?= $row['category'] ?></td>
                                    <td><?= $row['stock'] ?></td>
                                    <td><?= $row['buying_price'] ?></td>
                                    <td><?= $row['selling_price']  ?></td>
                                    <!--                                <td>--><?//= $row['sales'] ?><!--</td>-->
                                    <td><?= $row['date'] ?></td>
                                    <td>

                                        <div class="btn-group">

                                            <button class="btn btn-warning btnEditProduct" data-toggle="modal" data-target="#modalEditProduct-<?= $row['id'] ?>"><i class="fa fa-pen"></i></button>

                                            <!--                                        <button class="btn btn-danger" ><i class="fa fa-times"></i></button>-->
                                            <a href="controllers/deleteProduct.controller.php?product_delete=<?= base64_encode($row['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete')"><i class="fa fa-times"></i></a>


                                        </div>


                                    </td>
                                </tr>

                                <?php
                            }
                            ?>

                            <?php
                                include_once "controllers/addProduct.controller.php";
                            ?>

                            </tbody>

                        </table>


                    </div>

                </div>

            </div>

            <!-- /.card -->

        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->



    <!--====================================================================================================-->
    <!--                                        Modal Add Products              -->
    <!--==================================================================================================== -->




    <div id="modalAddProduct" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">


                <!--====================================================================================================-->
                <!--                                        Modal Header            -->
                <!--==================================================================================================== -->

                <div class="modal-header" style="background: #3c8dbc; color: white;">

                    <h4 class="modal-title">Add Products</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!--====================================================================================================-->
                <!--                                        Modal Body          -->
                <!--==================================================================================================== -->

                <div class="modal-body">

                    <div class="box-body">
                        <form action="" method="post" enctype="multipart/form-data">



                            <!--                    ENTRY FOR Brand Name-->

                            <div class="form-group">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-product-hunt"></i></span>
                                    </div>
                                    <input type="text" class="form-control input-lg" name="productDescription" placeholder="Brand Name" required>
                                </div>

                            </div>


                            <!--                    ENTRY Product Name-->

                            <div class="form-group">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-code"></i></span>
                                    </div>
                                    <input type="text" class="form-control input-lg" name="productCode" placeholder="product name" required>
                                </div>

                            </div>

                   

                            <!--                    INPUT Generic Name-->

                            <div class="form-group">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-check"></i></span>
                                    </div>
                                    <input type="text"  class="form-control input-lg" name="productStock" min="0"  placeholder="Stock" required>
                                </div>

                            </div>

                            <!--                    INPUT Generic Name -->

                            <div class="form-group">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-check"></i></span>
                                    </div>
                                    <input type="number" class="form-control input-lg" name="buyingPrice" min="0" step="any" placeholder="Generic Name" required>   <!-- STEP ANY FOR DECIMAL-->
                                </div>

                            </div>

                            <!--                    INPUT FOR Power-->

                            <div class="form-group">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-check"></i></span>
                                    </div>
                                    <input type="number" class="form-control input-lg" name="sellingPrice" min="0" step="any" placeholder="Selling Price" required>   <!-- STEP ANY FOR DECIMAL-->
                                </div>

                            </div>

                            <!--                    INPUT FOR Pcs Selling Price-->

                            <div class="form-group">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-check"></i></span>
                                    </div>
                                    <input type="number" class="form-control input-lg" name="sellingPrice" min="0" step="any" placeholder="Selling Price" required>   <!-- STEP ANY FOR DECIMAL-->
                                </div>

                            </div>

                             <!--                    INPUT FOR Original Price-->

                            <div class="form-group">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-check"></i></span>
                                    </div>
                                    <input type="number" class="form-control input-lg" name="sellingPrice" min="0" step="any" placeholder="Original Price" required>   <!-- STEP ANY FOR DECIMAL-->
                                </div>

                            </div>

                            <!--                    INPUT FOR Quantity-->

                            <div class="form-group">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-check"></i></span>
                                    </div>
                                    <input type="number" class="form-control input-lg" name="sellingPrice" min="0" step="any" value="0" required>   <!-- STEP ANY FOR DECIMAL-->
                                </div>

                            </div>

                            <!--                    INPUT FOR Type-->

                            <div class="form-group">

                                <div class="input-group">
                                    <section>  
                                        <option value="">Tablet</option> 
                                        <option value="">Capsule</option> 
                                        <option value="">Ampoules</option> 
                                        <option value="">Syringe </option> 
                                        <option value="">Powder For suspengion</option> 
                                        <option value="">Syrap</option> 
                                        <option value="">Oral Solution</option> 
                                        <option value="">Sr Tablet</option> 
                                        <option value="">Soft galeting tablet</option> 
                                        <option value="">Lotin</option> 
                                        <option value="">Eye ointment</option> 
                                        <option value="">Injection</option> 
                                        <option value="">IV injection</option> 
                                        <option value="">Gel</option> 
                                        <option value="">Oral Cream</option> 
                                    </section>
                                </div>
                            </div>

                            <!--                    INPUT FOR Per box Rate-->

                            <div class="form-group">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-check"></i></span>
                                    </div>
                                    <input type="number" class="form-control input-lg" name="Per Box Rate" min="0" step="any" value="0" required>   <!-- STEP ANY FOR DECIMAL-->
                                </div>

                            </div>


                            <!--                    INPUT FOR Location-->

                            <div class="form-group">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-check"></i></span>
                                    </div>
                                    <input type="number" class="form-control input-lg" name="sellingPrice" placeholder="locaion" value="0" required>   <!-- STEP ANY FOR DECIMAL-->
                                </div>

                            </div>

                              <!--                    INPUT Category-->

                            <div class="form-group">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-check"></i></span>
                                    </div>
                                    <input type="text"  class="form-control input-lg" name="productStock" min="0"  placeholder="ready" readonly>
                                </div>

                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="saveProducts">Save</button>
                            </div>

                        </form>



                    </div>

                </div>


            </div>

        </div>
    </div>




<?php


include "connection.php";

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);


while ($row = mysqli_fetch_assoc($result)){
    $id = $row['id'];



    $query = "SELECT * FROM products WHERE `id` = '$id'";
    $p_category = $row['id_category'];

    $query_category = "SELECT * FROM category ";
    $category_info = mysqli_query($conn, $query);
    $editCategoryInfo = mysqli_fetch_assoc($category_info);


    $product_info = mysqli_query($conn, $query);
    $editPoductsInfo = mysqli_fetch_assoc($product_info);


    ?>


    <!-- Modal -->
    <div id="modalEditProduct-<?= $row['id'] ?>" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                <!--            <form  method="post" action="" enctype="multipart/form-data"></form>-->

                <!--====================================================================================================-->
                <!--                                        Modal Header            -->
                <!--==================================================================================================== -->

                <div class="modal-header" style="background: #3c8dbc; color: white;">

                    <h4 class="modal-title">Edit User</h4>

                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!--====================================================================================================-->
                <!--                                        Modal Body          -->
                <!--==================================================================================================== -->

                <div class="modal-body">

                    <div class="box-body">

                        <form action="" method="post" enctype="multipart/form-data">


                            <!--                    ENTRY FOR PRODUCT NAME-->

                            <div class="form-group">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control input-lg" name="editProductDesc" value="<?= $editPoductsInfo['description'] ?>" required>
                                    <input type="hidden" class="form-control" name="id"  value="<?= $editPoductsInfo['id'] ?>" required>    <!--HIDDEN ID PASS-->
                                </div>

                            </div>



                            <!--                    ENTRY FOR CODE-->

                            <div class="form-group">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-code"></i></span>
                                    </div>
                                    <input type="text" class="form-control input-lg" name="editProductCode" value="<?= $editPoductsInfo['code'] ?>" required>
                                </div>

                            </div>


                            <!--                    ENTRY FOR SELECT Category-->

                            <div class="form-group">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-users"></i></span>
                                    </div>
                                    <select class="form-control input-lg" name="editProductCategory" >

                                        <?php

                                        include_once "connection.php";

                                        $sql2 = "SELECT * FROM category where id = '$p_category'";
                                        $res2 = mysqli_query($conn, $sql2);
                                        $row2 = mysqli_fetch_assoc($res2);
//                                        echo "<option value='{$row2['id']}'>{$row2['category']}</option>";
                                        echo "<option value=''>{$row2['category']}</option>";

                                        $sql3 = "SELECT * FROM category ";
                                        $res3 = mysqli_query($conn, $sql3);
                                        while ($row3 = mysqli_fetch_assoc($res3)) {

//                                            if ($row2['category'] == $row3['category']) {
//                                                $selected = "";
//                                            }

                                            echo "<option value='{$row3['id']}'>{$row3['category']}</option>";




                                        }

                                        ?>


                                    </select>
                                </div>

                            </div>


                            <!--                    ENTRY FOR Stock-->

                            <div class="form-group">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-code"></i></span>
                                    </div>
                                    <input type="text" class="form-control input-lg" name="editProductStock" value="<?= $editPoductsInfo['stock'] ?>" required>
                                </div>

                            </div>

                            <!--                    ENTRY FOR BUYING PRICE-->

                            <div class="form-group">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-code"></i></span>
                                    </div>
                                    <input type="number" class="form-control input-lg" name="editBuyingPrice" min="0" step="any" value="<?= $editPoductsInfo['buying_price'] ?>" required>
                                </div>

                            </div>

                            <!--                    ENTRY FOR SELLING PRICE-->

                            <div class="form-group">

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-code"></i></span>
                                    </div>
                                    <input type="number" class="form-control input-lg" name="editSellingPrice" min="0" step="any" value="<?= $editCategoryInfo['selling_price'] ?>"  required>
                                </div>

                            </div>


                            <!--                    ENTRY FOR PICTURE-->

                            <div class="form-group">

                                <div class="panel">Upload Picture</div>

                                <input type="file" class="newPicture" name="editPicture">

                                <p class="help-block">Maximum picture size 200MB </p>

                                <img src="<?= $editPoductsInfo['image'] ?>" class="img-thumbnail preview" width="100px">
                                <input type="hidden" name="currentPicture" id="currentPicture">

                            </div>




                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" name="updateProduct">Update User</button>
                            </div>

                        </form>
                    </div>

                </div>



            </div>
        </div>
    </div>

    <?php

}


//<!--====================================================================================================-->
//            <!--                                        Update User          --
//--==================================================================================================== -->

<?php
			function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}
				include('../connect.php');
				$d1=$_GET['product'];
				$result = $db->prepare("SELECT *, price * qty as total FROM products WHERE p_id= :a ORDER BY product_id ASC");
				$result->bindParam(':a', $d1);
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
				$total=$row['total'];
				$availableqty=$row['qty'];
				$brandid=$row['brand'];
				
				
				if ($availableqty < 10) {
				echo '<tr class="alert alert-warning record" style="color: #fff; background:rgb(255, 95, 66);">';
				}
				else {
				echo '<tr class="record">';
				}
			?>
		
<td><?php echo $row['product_id']; ?></td>
			<td>
			
			<?php
	$resulta = $db->prepare("SELECT * FROM supliers WHERE suplier_id= :a");
	$resulta->bindParam(':a', $brandid);
	$resulta->execute();
	for($i=0; $rowa = $resulta->fetch(); $i++){
	echo $brandname=$rowa['suplier_name'];
	
	}
	?>
			
			</td>
			<td><?php echo $row['gen_name']; ?> </td>
			<td><?php echo $row['gen_name_info']; ?> </td>
			<td><?php echo $row['power']; ?></td>
			<td><?php echo $row['package_type']; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td><h4><?php echo $row['location']; ?></h4></td>
	
		
			<td><?php
			$pprice=$row['price'];
			echo formatMoney($pprice, true);
			?></td>
			
			<td><?php echo $row['qty']; ?></td>
			<td><a rel="facebox" title="Click to edit the product" href="editproduct.php?id=<?php echo $row['product_id']; ?>"><button class="btn btn-warning"><i class="icon-edit"></i> </button> </a>
			<a href="#" id="<?php echo $row['product_id']; ?>" class="delbutton" title="Click to Delete the product"><button class="btn btn-danger"><i class="icon-trash"></i></button></a>
			</td>
			</tr>
			<?php
				}
				
			?>
		
		
		
	</tbody> 
</table>



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



include_once 'controllers/updateProduct.php';

?>

    <!--====================================================================================================-->
    <!--                                        Modal Edit User End             -->
    <!--==================================================================================================== -->


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


<?php
include "footer.php";
?>