$(document).ready(function(){

    $('.big-slider').flexslider({
        animation: "slide"
    });

    $('.owl-carousel').owlCarousel({
        // loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });
    

    $('.btnToCart').click(function () {

        let frm = $(this).parent();
        let url = $(this).parent().attr('action');
        $.ajax({
            url:url,
            method:'get',
            dataType:'json',
            data:frm.serialize()

        }).done(function (data) {
            
            if(data.status=='success'){
                $('.mini-basket .basket-count').text(data.totalCount);
                ShowNotify("Product added to basket");
            }else{
                ShowNotify("Error added to basket");
            }

        });

    });


    $('.btnToFavorits').click(function () {

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var id = $(this).data('id');

        $.ajax({
            
            url:'/favorits/add',
            method:'post',
            dataType:'json',
            data:{product_id:id,_token: CSRF_TOKEN}

        }).done(function (data) {

            if(data.status=='notAuthorized'){
                ShowNotify("You need authorize to add favorits");
            }else{ 
                ShowNotify("Add to favorits success");
            }

        });
    });


    $('.btnToCompare').click(function () {

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var id = $(this).data('id');

        $.ajax({
            
            url:'/compare/add',
            method:'post',
            dataType:'json',
            data:{product_id:id,_token: CSRF_TOKEN}

        }).done(function (data) {

            if(data.status=='notAuthorized'){
                ShowNotify("You need authorize to add compare");
            }else{ 
                ShowNotify("Add to favorits success");
            }

        });
    });




    $('.product-item .fa-trash-alt').click(function () {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var id = $(this).data('id');

        $.ajax({
            url:'/favorits/remove',
            method:'POST',
            dataType:'json',
            data:{id:id, _token: CSRF_TOKEN}
        }).done(function (data) {

            ShowNotify("Product removed from favorits");

            id.parent().parent().remove();
        });
    });


    $('.plus-minus.plus').click(function () {
        $(this).prev().val(+$(this).prev().val() + 1);
    });

    $('.plus-minus.minus').click(function () {
        if ($(this).next().val() > 0) $(this).next().val(+$(this).next().val() - 1);
    });
    

    $('.product-gallery img').click(function(){
        $('.product-detail .product-image img').attr('src', $(this).attr('data-img'));
        $('.product-detail .product-gallery .image-wrapp').removeClass('active');
        $(this).parent().addClass('active');
    });

});


function ShowNotify(txt){

    toastr.options = {
      // "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      // "progressBar": false,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "200",
      "hideDuration": "1000",
      "timeOut": "3000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }
    
    toastr["success"](txt);
}