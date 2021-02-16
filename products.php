<?php
include "header.php";
?>

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

include_once 'controllers/updateProduct.php';

?>

    <!--====================================================================================================-->
    <!--                                        Modal Edit User End             -->
    <!--==================================================================================================== -->





<?php
include "footer.php";
?>