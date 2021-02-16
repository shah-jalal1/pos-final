<?php

class ProductsTable
{

    //-====================================================================================================-->
//                                          SHOW PRODUCTS TABLE
// <==================================================================================================== -->

    public function showProductsTable() {

        $image = "<img src='dist/img/products/aspirador-industrial.png' width='40px;'></img>";
        $buttons = "<div class='btn-group'><button class='btn btn-warning'><i class='fa fa-pen'></i></button><button class='btn btn-danger'><i class='fa fa-times'></i></button></div>";

        include "../connection.php";

//                        $query = "SELECT * FROM products";
        $query = "SELECT products.code, products.image, products.buying_price, products.selling_price, products.date, products.stock, products.description, category.category FROM products
                                    LEFT JOIN category ON category.id = products.id_category";
        $result = mysqli_query($conn, $query);

        $count = 0;


        while ($row = mysqli_fetch_assoc($result)) {
            $count++;

            echo '{
  "data": [
    
    [
      "",
      "' . $image . '",
      "Donna Snider",
      "Donna Snider",
      "Customer Support",
      "New York",
      "4226",
      "2011/01/25",
      "' . $buttons . '"
    ]
  ]
}';

        }
    }
}

$sowProducts = new ProductsTable();
$sowProducts -> showProductsTable();

?>