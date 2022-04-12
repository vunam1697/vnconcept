$('.btn_register:not(".disabled")').click(function(e){

    e.preventDefault();

    const el = $(this);

    const UrlContact =el.parents('form').attr('action');

    const data = el.parents('form').serialize();

    el.addClass('disabled');

    $('.fr-error').html('');

    el.html(loading);

    $.ajax({

        type: 'POST',

        url: UrlContact,

        dataType: "json",

        data: data,

        success:function(data){

            el.removeClass('disabled');

            if(data.success==false)
            {
                if(data.errorMessage){

                    $.each(data.errorMessage, function(field, item) {

                        $('.error_'+field).html(item);

                    });
                }else{
                    toastr["error"](data.message, "Thông báo");
                }
            }

            if (data.success==true) {

                toastr["success"](data.message, "Thông báo");

                el.parents('form')[0].reset();

            }

            el.html('Đăng ký');

        },error:function(){

            el.html('Đăng ký');
        }

    });

});

// $('.btn_like_product').click(function () {

// });

function getParamPrice() {
    price = '';
    $('input[data-type="price"]').each(function() {
        if($(this).is(':checked')){

            var param = ($(this)).val();

            price = price+param+'-';
        }

    });
    return price.substring(0, price.length - 1);
}

function getParamColor() {
    color = '';
    $('input[data-type="color"]').each(function() {
        if($(this).is(':checked')){

            var param = ($(this)).val();

            color = color+param+',';
        }

    });
    return color.substring(0, color.length - 1);
}

function getParamCollection() {
    collection = '';
    $('input[data-type="collection"]').each(function() {
        if($(this).is(':checked')){

            var param = ($(this)).val();

            collection = collection+param+',';
        }

    });
    return collection.substring(0, collection.length - 1);
}

function getParamDesigner() {
    designer = '';
    $('input[data-type="designer"]').each(function() {
        if($(this).is(':checked')){

            var param = ($(this)).val();

            designer = designer+param+',';
        }

    });
    return designer.substring(0, designer.length - 1);
}

function getParamFabricMaterial() {
    fabric_material = '';
    $('input[data-type="fabric_material"]').each(function() {
        if($(this).is(':checked')){

            var param = ($(this)).val();

            fabric_material = fabric_material+param+',';
        }

    });
    return fabric_material.substring(0, fabric_material.length - 1);
}

$(document).ready(function(){
    var base = $('input[name="base_url"]').val();

    function getAjaxProducts(param, html= true) {

        $('.loadingcover').show();

        $.ajax({

            url: base + '/filter-products',

            type: 'POST',

            data: param,

        })

        .done(function(data) {

            $('.loadingcover').hide();


            $('.products__content').html(data);

        })

    }

    function paramArray(){
        var price = getParamPrice();
        var color = getParamColor();
        var collection = getParamCollection();
        var designer = getParamDesigner();
        var fabric_material = getParamFabricMaterial();

        var category = $('#category_base').val();

        param = {

            _token: $('meta[name="_token"]').attr('content'),

            price_checked : price,
            color_checked : color,
            collection_checked : collection,
            designer_checked : designer,
            fabric_material_checked : fabric_material,
            category : category,
        }

        return param;

    }

    $('.filter-check-box').click(function () {
        param = paramArray();

        getAjaxProducts(param);
    });

})
