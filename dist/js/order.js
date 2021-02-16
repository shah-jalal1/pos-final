
$(document).ready(function () {

    // <!--=======================================================================-->
    // <!--                     Add Product Row       -->
    //  <!--======================================================================= -->

    $(document).on('click', '.btnAdd', function (){

        var html='';
        html+='<tr>';
        html+='<td><input type="hidden" class="form-control productName" name="productName[]" readonly></td>';

        html+='<td><select class="form-control productId" name="productId[]"><option value=""><?php $obj = new Product; echo $obj->fillProduct() ?></option></select></td>';

        html+='<td><input type="number" class="form-control productStock" name="productStock[]" readonly></td>';

        html+='<td><input type="number" class="form-control productPrice" name="productId[]" readonly></td>';

        html+='<td><input type="number" class="form-control productQty" name="productQty[]" ></td>';

        html+='<td><input type="number" class="form-control productTotal" name="productTotal[]" readonly></td>';

        html+='<td><button type="button" name="remove" class="btn btn-danger btnRemove"><span class="fa fa-times"></span></button></td>';

        $('#productTable').append(html);

    })

    // <!--=======================================================================-->
    // <!--                     Remove Product Row       -->
    //  <!--======================================================================= -->


    $(document).on('click', '.btnRemove', function (){

        $(this).closest('tr').remove();

    })


});