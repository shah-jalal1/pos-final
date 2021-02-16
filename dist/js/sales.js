$.ajax({

    url: "ajax/datatable-sales.ajax.php",
    success:function(answer) {

        console.log("answer", answer);

    }
})




// $(document).ready(function() {
//
//
//     function showdata(){
//         output = "";
//         $.ajax({
//             url: "retrieve.php",
//             method:"GET",
//             dataType:"json",
//             success:function(data){
//                 if(data){
//                     x = data;
//                 }else {
//                     x= "";
//                 }
//                 for(i = 0;i < x.length; i++){
//                     output += "<tr><td>" +
//                         x[i].id +
//                         "</td><td>"
//                         + x[i].code +
//                         "</td><td>" +
//                         x[i].description +
//                         "</td><td>" +
//                         x[i].stock +
//                         "</td><td> <button class='btn btn-warning btn-edit' data-sid=" + x[i].id +
//                         ">Edit</button> <button class='btn btn-danger btn-del' data-sid=" + x[i].id +
//                         ">Delete</button></td></tr>";
//                 }
//                 $("#tbody").html(output);
//             },
//         });
//     }
//     showdata();
// });




$(document).ready(function() {


    function showdata(){
        output = "";
        $.ajax({
            url: "retrieve.php",
            method:"GET",
            dataType:"json",
            success:function(data){
                $('#example').DataTable({
                   data: data,
                            "columns" : [

             {"data": "id"},
            {"data": "code"},
            {"data": "description"},
            {"data": "stock"},
              {
                  defaultContent: '<button class="btn btn-danger">Add</button>'

            }
            ]
                });
            },
        });
    }
    showdata();
});



// $(document).ready(function(){
//
//     $("#example").DataTable({
//
//         "ajax":{
//             "url": "retrieve.php",
//             "dataSrc" : ""
//         },
//         "columns" : [
//             {"data": "id"},
//             {"data": "code"},
//             {"data": "description"},
//             {"data": "stock"}
//         ]
//
//     });
//
// });