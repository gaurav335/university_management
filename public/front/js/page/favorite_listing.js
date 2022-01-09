$('.delete_favorite_product').click(function () {
    var favCount = $('.f-product').length;
    if (confirm("Are You Sure Delete Favorite Product?")) {
        $id = $(this).data('id');
        $.ajax({
            url: BASE_URL + "front/Favorite/deleteFavoriteProduct",
            type: "POST",
            data: {id: $id},
            dataType: "json",
            beforeSend: function () {
                $(document).find('.loader-icon').show();
            },
            success: function (res) {
                $(document).find('.loader-icon').hide();
                if (res.status)
                {
                    if(favCount == 1) {
                        $('#pills-delivery').append('<div class="products-empty">'+'<img src='+BASE_URL+'front/images/empty-product-grey.png alt="Img">'
                                +'<h4>You havent added any favorite products.</h4>'+'</div>');
                        $('.favorite-product-' + $id).remove();
                    } else {
                        $('.favorite-product-' + $id).remove();
                        flashMessage('success', res.message);
                    }
                }
                else {
                    flashMessage('error', res.message);
                }
            }
        });
    }
    return false;
});


$('.delete_favorite_store').click(function () {
    if (confirm("Are You Sure Delete Favorite Store?")) {
        $id = $(this).data('id');
        $.ajax({
            url: BASE_URL + "front/Favorite/deleteFavoriteStore",
            type: "POST",
            data: {id: $id},
            dataType: "json",
            beforeSend: function () {
                $(document).find('.loader-icon').show();
            },
            success: function (res) {
                $(document).find('.loader-icon').hide();
                if (res.status)
                {
                    $('.favorite-store-' + $id).remove();
                    flashMessage('success', res.message);
                }
                else {
                    flashMessage('error', res.message);
                }
            }
        });
    }
    return false;
});

