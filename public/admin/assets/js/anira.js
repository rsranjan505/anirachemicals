
let PartnerRow=0;
let PreProductRow=0;
$("#add_morepartner").click(
    function () {

        var partner_name = $('#partner_name').val();
        var partner_pan = $('#partner_pan').val();
        var partner_dob = $('#partner_dob').val();
        var partner_anniversary = $('#partner_anniversary').val();

        let template = '<div id="partner" class="row"><div class="col-md-4"><div class="form-group"><input id="partner_details" type="text" name="partner_details['+PartnerRow+'][name]" value="'+partner_name+'" class="form-control" readonly/></div></div><div class="col-md-2"><div class="form-group"><input id="partner_details" type="text"  value="'+partner_pan+'" name="partner_details['+PartnerRow+'][pan]" class="form-control" readonly/></div></div><div class="col-md-2"><div class="form-group"><input id="partner_details" type="date"  value="'+partner_dob+'" name="partner_details['+PartnerRow+'][dob]" class="form-control" readonly/></div></div><div class="col-md-2"><div class="form-group"><input id="partner_details" type="date"  value="'+partner_anniversary+'" name="partner_details['+PartnerRow+'][anniversary]" class="form-control" readonly/></div></div><div class="col-md-2" ><a id="Deleteparter" class="btn btn-danger mr-2">X</a></div></div>';

        $(".morepartner").append(template);

        $('#partner_name').val('');
        $('#partner_pan').val('');
        $('#partner_dob').val('');
        $('#partner_anniversary').val('');
        PartnerRow++;

    }
);
$("body").on("click", "#Deleteparter", function () {
    $(this).parents("#partner").remove();
    PartnerRow--;
})

//previous product
$("#add_item").click(
    function () {

        var name = $('#previous_product_details_name').val();
        var brand = $('#previous_product_details_brand').val();

        let template = '<div id="product" class="row"> <div class="col-md-5"><div class="form-group"><input id="previous_product_details" type="text" name="previous_product_details['+PreProductRow+'][name]"  value="'+name+'" class="form-control" readonly/></div></div><div class="col-md-5"><div class="form-group"><input id="previous_product_details" type="text" name="previous_product_details['+PreProductRow+'][brand]"  value="'+brand+'" class="form-control" readonly/></div></div><div class="col-md-2" style="margin-top: 3.8rem"><a id="Deleteproduct" class="btn btn-danger mr-2">Remove</a></div></div>';

        $(".previous_productitems").append(template);

        $('#previous_product_details_name').val('');
        $('#previous_product_details_brand').val('');
        PreProductRow++;
    }
);

$("body").on("click", "#Deleteproduct", function () {
    $(this).parents("#product").remove();
    PreProductRow--;
})

 //support document
 $("#add_document").click(
    function () {

        let template = '<div id="document" class="row"> <div class="col-md-5"><div class="form-group"><input id="support_document" type="file" name="document[]" class="form-control"/></div></div><div class="col-md-2"><a id="Deletedocument" class="btn btn-danger mr-2">Remove</a></div></div>';

        $(".support_document").append(template);
    }
);

$("body").on("click", "#Deletedocument", function () {
    $(this).parents("#document").remove();
})


//state change
$('#state').on('change', function () {
    let state_id = this.value;
    $.ajax({
        url: "/city/"+state_id,
        type: "get",

        success: function (res) {
            let html = "";
            html += '<select id="city" type="text" name="city" search class="form-control">';
            res.forEach((val, key) => {
                html += "<option value=" + val.id + ">" + val.name + "</option>";
            });
            html += '</select>';
            $("#city").html("");
            $("#city").html(html);
        },
    });
});

//state change
$('#state_id').on('change', function () {
    let state_id = this.value;
    $.ajax({
        url: "/city/"+state_id,
        type: "get",

        success: function (res) {
            let html = "";
            html += '<select id="city_id" type="text" name="city_id" search class="form-control">';
            res.forEach((val, key) => {
                html += "<option value=" + val.id + ">" + val.name + "</option>";
            });
            html += '</select>';
            $("#city_id").html("");
            $("#city_id").html(html);
        },
    });
});


//business type for proitership
$('#establishment_type').on('change', function () {
    let type = this.value;
    if(type==1 || type == 3 || type == 4){
        $('.partner').attr('style', 'display:none;');
    }else{
         $('.partner').removeAttr('style');
    }
});



///Vendors List
// $('#vendor-table').DataTable({
//     processing: true,
//     serverSide: true,
//     language:
//     {
//         "processing": "<i class='fa-solid fa-spinner fa-4x'></i>",
//     },
//     ajax: "{{ route('vendor-list') }}",
//     columns: [
//       {
//           data: "DT_RowIndex",
//           name: "SL No",
//           className: "text-center",
//           orderable: false,
//           // searchable: false,
//       },
//       {data: 'Business Name', name: 'Business Name'},
//       {data: 'Establishment Type', name: 'Establishment Type'},
//       {data: 'Pan', name: 'Pan'},
//       {data: 'Gst', name: 'Gst'},
//       {data: 'Address', name: 'Address'},
//       {data: 'City', name: 'City'},
//       {data: 'State', name: 'State'},
//       {data: 'Pincode', name: 'Pincode'},
//       {data: 'Email', name: 'Email'},
//       {data: 'Mobile', name: 'Mobile'},
//       {data: 'Key Person', name: 'Key Person'},
//       {data: 'DOB', name: 'DOB'},
//       {data: 'Marriage Aniversory', name: 'Marriage Aniversory'},
//       {data: 'Created By', name: 'Created By'},
//       {data: 'Created Date', name: 'Created Date'},
//       {data: 'Status', name: 'Status'},
//       {data: 'action', name: 'action', orderable: false, searchable: false},
//     ],
//     columnDefs: [
//         {
//             targets: 0, // your case first column
//             className: "text-center",
//             width: "8%",
//         },
//     ],

// });





//add order page
$('#customer_id').on('change', function () {
    let vendor_id = this.value;
    $.ajax({
        url: "/admin/order/vendor/"+vendor_id,
        type: "get",

        success: function (res) {
            console.log(res.vendor.id);
            let name_html = "";
            let email_html = "";
            let mobile_html = "";
            let state_html = "";
            let city_html = "";

            name_html += '<div class="form-group"><label class="col-form-label">Name Of Customer</label><input id="customer_name" value="'+res.vendor.name_of_establishment+'" type="text" name="customer_name" class="form-control"/></div>';

            email_html += '<div class="form-group"><label class="col-form-label">Email</label><input id="email" value="'+res.vendor.email+'" type="text" name="email" class="form-control"/></div>';

            mobile_html += '<div class="form-group"><label class="col-form-label">Mobile</label><input id="mobile" value="'+res.vendor.mobile+'" type="text" name="mobile" class="form-control"/></div>';


            $(".vendor_name").html("");
            $(".vendor_name").html(name_html);

            $(".vendor_email").html("");
            $(".vendor_email").html(email_html);

            $(".vendor_mobile").html("");
            $(".vendor_mobile").html(mobile_html);
        },
    });
});


//Add more Products
// $("#add_product").click(
//     function () {

//         let template = ' <tr><td><select id="product_id" type="text" name="product_id[]" class="form-control-sm"><option value="" >Select Product Name</option> </select></td><td><input id="quantity" type="number" name="quantity[]" class="form-control"/></td><td> <input id="unit" type="number" name="unit[]" class="form-control"/></td><td><input id="unit_price" type="decimal" name="unit_price[]" class="form-control"/></td><td><input id="total_price" type="decimal" name="total_price[]" class="form-control"/> </td><td><a id="Deleteproduct" class="btn btn-danger mr-2">Remove</a></td> </tr>';

//         $("#moreProduct").append(template);
//     }
// );

// $("body").on("click", "#Deleteproduct", function () {
//     $(this).parents("#product").remove();
// })


    function calculateValueByTextChange() {
        $(this).change(function(){
            var quantity = $('#input_quantity').val();
            var unit_price = $('#input_unit_price').val();
            $('#input_total_price').val(quantity * unit_price);
        });
    }

    function openModel(id)
    {
        var url = "/admin/order-items/" + id;
        var modelHtml = "";
        $("#orderItemsmodel").modal('show');

        $.ajax({
            url: url,
            type: "get",
            success: function (res) {
                console.log(res);
                let html = "";
                res.forEach((val, key) => {

                    html += "<tr><td>" + val.product.name +  "</td><td>" + val.packing_size + "</td><td>" + val.quantity + "</td><td>" + val.unit + "</td><td>" + val.unit_price + "</td><td>" + val.total_price + "</td></tr>";
                });

                // $("#product_items").html("");
                $("#product_items").html(html);
            },
        });
    }

    //Modal image
    function imageView(id) {
        var modal = document.getElementById("modalImg");

        var img = document.getElementById("imgV"+id);
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");

        modal.style.display = "block";
        modalImg.src = img.src;
        captionText.innerHTML = img.alt;

    }

    function closeModal() {
        var modal = document.getElementById("modalImg");
        modal.style.display = "none";
    }





