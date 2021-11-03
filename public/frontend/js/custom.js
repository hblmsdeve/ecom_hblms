$(document).ready(function(){

    loadCart();
    loadWishlist();
    
    function loadCart(){
        $.ajax({
            method: "GET",
            url: "/load-cart-data",
            success:function (response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
            }
        });
    }

    function loadWishlist(){
        $.ajax({
            method: "GET",
            url: "/load-wishlist-data",
            success:function (response) {
                $('.wishlist-count').html('');
                $('.wishlist-count').html(response.count);
            }
        });
    }

    $('.addToCart-btn').click(function (e) {
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.qte-input').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                'product_id': product_id,
                'product_qty': product_qty,
            },
            success:function (response) {
                swal(response.status);
                loadCart();
            }
        });
    });

    $('.add-to-wishlist').click(function (e) {
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                'product_id': product_id,
            },
            success:function (response) {
                swal(response.status);
                loadWishlist();
            }
        });

    });

    $('.increment-btn').click(function (e) {
        e.preventDefault();
        
        var inc_value = $(this).closest('.product_data').find('.qte-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10){
            value++;
            $(this).closest('.product_data').find('.qte-input').val(value);
        }
    });

    $('.decrement-btn').click(function (e) {
        e.preventDefault();
        var decr_value = $(this).closest('.product_data').find('.qte-input').val();
        var value = parseInt(decr_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1){
            value--;
            $(this).closest('.product_data').find('.qte-input').val(value);
        }
    });

    $('.delete-cart-item').click(function (e) {
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data: {
                'prod_id': prod_id,
            },
            success:function (response) {
                $('#id'+prod_id).remove();
                loadCart();
                swal("", response.status, "success");
                
            }
        });        
    });

    $('.delete-wishlist-item').click(function (e) {
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "delete-wishlist-item",
            data: {
                'prod_id': prod_id,
            },
            success:function (response) {
                $('#id'+prod_id).remove();
                loadWishlist();
                swal("", response.status, "success");
            }
        });        
    });

    $('.changeQty').click(function (e) {
        e.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qte-input').val();
        data = {
            'prod_id': prod_id,
            'prod_qty': qty,
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success:function (response) {
               window.location.reload();
            }
        });   
    });

});