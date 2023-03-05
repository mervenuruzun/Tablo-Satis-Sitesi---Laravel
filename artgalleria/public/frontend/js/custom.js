$(document).ready(function() {
    $('.addToCartBtn').click(function(e){
        e.preventDefault();

        var urun_id = $(this).closest('.urun_data').find('.urun_id').val();
        var urun_adet = $(this).closest('.urun_data').find('.adt').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'urun_id': urun_id,
                'urun_adet': urun_adet,
            },
            success: function (responce){
                alert(responce.status);
            }

        });

    });

    $('.increment-btn').click(function(e){
        e.preventDefault();

        var inc_value = $(this).closest('.urun_data').find('.adt').val();
        var value = parseInt(inc_value,10);
        value = isNaN(value) ? 0 : value;
        if(value < 10 )
        {
            value++;
            $(this).closest('.urun_data').find('.adt').val(value);

        }

    });

    $('.decrement-btn').click(function(e){
        e.preventDefault();

        var dec_value = $(this).closest('.urun_data').find('.adt').val();
        var value = parseInt(dec_value,10);
        value = isNaN(value) ? 0 : value;
        if(value > 1 )
        {
            value--;
            $(this).closest('.urun_data').find('.adt').val(value);

        }

    });


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('.delete-cart-item').click(function(e){
        e.preventDefault();

        var urun_id = $(this).closest('.urun_data').find('.urun_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/delete-cart-item",
            data: {
                'urun_id': urun_id,
            },
            success: function (responce){
                window.location.reload();
            }
        });
    });

    $('.changeAdet').click(function(e){
        e.preventDefault();

        var urun_id = $(this).closest('.urun_data').find('.urun_id').val();
        var adet = $(this).closest('.urun_data').find('.adt').val();
        data = {
            'urun_id': urun_id,
            'urun_adet': adet,
        },
        $.ajax({
            method: "POST",
            url: "update-sepet",
            data: data,
            success: function (responce){
                window.location.reload();
            }
        });
    });
});




