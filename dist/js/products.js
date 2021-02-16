// <!--====================================================================================================-->
//     <!--                                        DYANAMIC TABLE      -->
// <!--==================================================================================================== -->

$.ajax({

    url: "ajax/datatable-products.ajax.php",
    success:function(answer) {

        console.log("answer", answer);

    }

})

$('.productsTabled').DataTable( {
    "ajax": "ajax/datatable-products.ajax.php"
} );



<!--====================================================================================================-->
<!--                                        Upload image          -->
<!--==================================================================================================== -->

$(".newImage").change(function (){

    var img = this.files[0];


    <!--====================================================================================================-->
    <!--                    VALIDATE FORMATE IN JPG OR PNG AND SIZE NOTE MORE THAN 2MB         -->
    <!--==================================================================================================== -->

    if (img["type"] != "image/jpeg" && img["type"] != "image/png") {
        $("newImage").val("");

        swal({
            title: "Image Formate Problem",
            text: "image only support JPG or PNG format",
            icon: "error",
            confirmButtonText: "!close!"
        });

    } else if(img["size"] > 2000000) {           //  Javascript support byte 2mb = 2000000byte

        swal({
            title: "Image size Problem",
            text: "image size dont upload more than 2MB! ",
            icon: "error",
            confirmButtonText: "!close!"
        });

    } else {

        var dataImage = new FileReader;
        dataImage.readAsDataURL(img);

        $(dataImage).on("load", function(event) {

            var routeImage = event.target.result;

            $(".preview").attr("src", routeImage);

        })

    }

})
