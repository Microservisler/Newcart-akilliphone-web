
$(function() {
    const BasketService = {
        int : function (){
            $('body').on('change', '.decrease-increase', function (){
                $.ajax( "/basket/set/" + $(this).data('variyantid') + '/' + $(this).val() )
                    .done(function(basket) {
                        $('.shopping-cart.mini').html(basket.mini);
                        $('#basket-table').html(basket.table);
                        Swal.fire({
                            title: 'Ürün Adedi Değiştirildi.',
                            toast: true,
                            position: 'top-end',
                            timer: 3000,
                            icon: 'success',
                            showConfirmButton: false,
                        });

                    })
                    .fail(function() {
                        alert( "error" );
                    })
                    .always(function() {
                        //alert( "complete" );
                    });
            });
            $('body').on('click', '.value-button.decrease', function(){
                var value = $(this).parent().find('[data-value]').val();
                if(value > 0) {
                    value--;
                    $(this).parent().find('[data-value]').val(value);
                    $(this).parent().find('[data-value]').change();
                }
            });
            $('body').on('click', '.value-button.increase', function(){
                var value = $(this).parent().find('[data-value]').val();
                if(value < 100) {
                    value++;
                    $(this).parent().find('[data-value]').val(value);
                    $(this).parent().find('[data-value]').change();
                }
            });
            $('body').on('change', '.decrease-increase', function(){
                var value = $(this).val();
                if(value == undefined || isNaN(value) == true || value < 0) {
                    $(this).val(0);
                } else if(value >= 101) {
                    $(this).val(100);
                }
            });
            $('body').on('click', '.addtocart', function (){
                $.ajax( "/basket/add/" + app.variant.variantId + '/' + $('#product-qty').val() )
                    .done(function(basket) {
                        $('.shopping-cart').html(basket.mini);
                        Swal.fire({
                            title: 'Ürün Sepete Eklendi.',
                            toast: true,
                            position: 'top-end',
                            timer: 3000,
                            icon: 'success',
                            showConfirmButton: false,
                        });

                    })
                    .fail(function() {
                        Swal.fire({
                            title: 'Ürün Spete Eklenemedi.',
                            toast: true,
                            position: 'top-end',
                            timer: 3000,
                            icon: 'error',
                            showConfirmButton: false,
                        });

                    })
                    .always(function() {
                        //alert( "complete" );
                    });
            });
        }
    }
    BasketService.int();
});

