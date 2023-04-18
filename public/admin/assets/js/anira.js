
$("#add_morepartner").click(
    function () {

        let template = '<div id="partner" class="row"><div class="col-md-4"><div class="form-group"><label class="col-form-label">Name</label><input id="partner_details" type="text" name="partner_details[name][]" class="form-control"/></div></div><div class="col-md-2"><div class="form-group"><label class="col-form-label">Pan</label><input id="partner_details" type="text" name="partner_details[pan][]" class="form-control"/></div></div><div class="col-md-2"><div class="form-group"><label class="col-form-label">DOB</label><input id="partner_details" type="date" name="partner_details[dob][]" class="form-control"/></div></div><div class="col-md-2"><div class="form-group"><label class="col-form-label">Anniversary</label><input id="partner_details" type="date" name="partner_details[anniversary][]" class="form-control"/></div></div><div class="col-md-2" style="margin-top: 3.8rem"><a id="Deleteparter" class="btn btn-danger mr-2">Remove</a></div></div>';

        $(".morepartner").append(template);
    }
);
$("body").on("click", "#Deleteparter", function () {
    $(this).parents("#partner").remove();
})

//previous product
$("#add_item").click(
    function () {

        let template = '<div id="product" class="row"> <div class="col-md-5"><div class="form-group"><label class="col-form-label">Product Name</label><input id="previous_product_details" type="text" name="previous_product_details[name][]" class="form-control"/></div></div><div class="col-md-5"><div class="form-group"><label class="col-form-label">Brand</label><input id="previous_product_details" type="text" name="previous_product_details[brand][]" class="form-control"/></div></div><div class="col-md-2" style="margin-top: 3.8rem"><a id="Deleteproduct" class="btn btn-danger mr-2">Remove</a></div></div>';

        $(".previous_productitems").append(template);
    }
);

$("body").on("click", "#Deleteproduct", function () {
    $(this).parents("#product").remove();
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


//business type for proitership
$('#establishment_type').on('change', function () {
    let type = this.value;
    if(type==1){
        $('.partner').attr('style', 'display:none;');

    }
});


