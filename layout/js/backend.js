$(function () {
    'use strict';
    // Hid text Placeholder
    $('[placeholder]').focus(function () {
        $(this).attr('text', $(this).attr('placeholder'));
        $(this).attr('placeholder', '');
    }).blur(function () {
        $(this).attr('placeholder', $(this).attr('text'));
    });


    $(document).on("click", ".add_cart", function (event) {
        event.preventDefault();
        var pid = $(this).attr("pid");
        var name = $("#namecart").val();
        var price = $("#pricecart").val();
        var action = "add";
        $.ajax({
            url: "cart_action.php",
            method: "POST",
            data: {'proId': pid, 'name': name, 'price': price, 'action': action},
            success: function (data) {
                if (data == "add") {
                    /*alert('Add To Cart Succssfully')*/
                    count_item();
                    Swal.fire('Add To Cart Succssfully')
                } else {
                    alert('Product is already in the cart...!')

                }

            }
        })

    })
    //Count user cart items funtion
    function count_item(){
        $.ajax({
            url : "cart_action.php",
            method : "POST",
            data : {count_item:1},
            success : function(data){
                document.getElementById("ba").innerHTML = data;
            }
        })
    }

    $(document).on("click", ".plus", function (event) {
        event.preventDefault();
        var id = $(this).attr('cid');
        var input = document.getElementById('qid'+id);
        var qty =input.value;
        qty++;
        input.value=qty
        console.log(id)
        console.log(qty)
        $(".overlay").show();
        $.ajax({
            url: "cart_action.php",
            method: "POST",
            data: {plusQuantity: 1, quantity: qty,cartID:id},
            success: function (data) {
                if (data == "CheckQuantity") {
                    //alert("done+");

                }

            }

        });

    });
    $(document).on("click", ".minus", function (event) {
        event.preventDefault();
        var id = $(this).attr('cid');
        var input = document.getElementById('qid'+id);
        var qty =input.value;
        if (qty > 1){
            qty--;
        }
        input.value=qty
        console.log(id)
        console.log(qty)
        $(".overlay").show();
        $.ajax({
            url: "cart_action.php",
            method: "POST",
            data: {minusQuantity: 1, quantity: qty,cartID:id},
            success: function (data) {
                if (data == "CheckQuantity") {
                    //alert("done+");

                }

            }

        });

    });


    /*$(document).ready(function () {
        count_item();

    });
        //Add Product into Cart End Here
    //Count user cart items funtion
    function count_item(){
        $.ajax({
            url : "cart_action.php",
            method : "POST",
            data : {count_item:1},
            success : function(data){
                $('.badge').html(data);
            }
        })
    }*/


});
