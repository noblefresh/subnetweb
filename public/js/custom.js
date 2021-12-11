$(document).ready(function() {
    window.addEventListener('scroll',function (){
        $scrolled = window.scrollY;
        if($scrolled > 150){
            $('.topNav').addClass('shadow-lg md:bg-opacity-100')
        }else{
            $('.topNav').removeClass('shadow-lg md:bg-opacity-100')
        }
    })
    $('.bars').on('click',function(){
        $('.menu').toggleClass('hidden flex')
    })

    
    //Load Cart Count
    function loadCartCount(){
        $.ajax({
            type:'get',
            url:'/loadCartCount',
            dataType:'JSON',
            success:function(res){
                $('#cart').text(res.data);
                $('#cart2').text(res.data);
            },
            error:function(e,r,error){
                console.log(error);
            }
        });
    }
    loadCartCount();
    function successfullAdded(){
        $('.message').removeClass('hidden')
        var inter = setInterval(() => {
            $('.message').addClass('hidden')
            clearInterval(inter)
        }, 5000);
        
    }
    $('.closeMessage').on('click',function () {
        $('.message').addClass('hidden')
    })
    // Function Add Product To Cart
    $('.addToCart').on('click', function(){
        let product_id = $(this).attr('id');
        $.ajax({
            type:'get',
            url:'/addToCart',
            data:{product_id:product_id},
            success:function(){
                loadCartCount();
                successfullAdded();
            },
            error:function(r,e,error){
                console.log('FAIDED'+error);
            }
        });
    });

    //Checkout 
    $('.checkOut').on('click',function(){
        let name = $('#name').val();
        let email = $('#email').val();
        let phone = $('#phone').val();
        let address = $('#address').val();
        let amount = $('#amount').val();


        if(name == '' || email == '' || phone == '' || address == ''){
            alert("Please provide your Delivery Details completly");
        }else{
            //processing code

            payWithRave() // TRIGGER PAYWITHRAVE TO POP-UP
    
            function payWithRave() {
    
                var x = getpaidSetup({
                    // FLWPUBK-ff9268493fa87b738ca4da04acb65589-X
                    PBFPubKey: 'FLWPUBK_TEST-26cfc4234cf0aff44fe588346ba2b84c-X',
                    customer_email: email,
                    amount: amount,
                    customer_phone: phone,
                    currency: "NGN",
                    txref: "rave-123456",
                    meta: [{
                        metaname: "flightID",
                        metavalue: "AP1234"
                    }],
                    onclose: function() {
                        $('#msg').html('');
                    },
                    callback: function(response) {
                        var txref = response.tx.txRef; // collect txRef returned and pass to a                  server page to complete status check.
                        console.log("This is the response returned after a charge", response);
                        if (
                            response.tx.chargeResponseCode == "00" ||
                            response.tx.chargeResponseCode == "0"
                        ) {
                            // saving order
                            $.ajax({
                                type:'get',
                                url:'/save_order',
                                data:{email:email, phone:phone, name:name, address:address, amount:amount},
                                dataType:'json',
                                // beforeSend: function(){
                                //     $('#caption').text('Proccessing Order');
                                //     $('#loaderModal').modal('show');
                                // },
                                success: function(res){
                                    if(res.status == 'success'){
                                        // swal({
                                        //     title: "Bravos",
                                        //     text: res.message,
                                        //     icon: "success",
                                        // });
                                        alert(res.message);
                                        window.location.reload();
                                    }
                                    // console.log('outside', res);
                                },
                                error: function(e,r,error){
                                    console.log(error);
                                }
                            });
        
                        } else {
                            $('#errorModal').on('show.bs.modal', function(){
                                $('#modalMsg').text("An error occured while proccessing payment, try again later");
                            });
                            $('#errorModal').modal('show');
                        }
        
                        x.close(); // use this to close the modal immediately after payment.
                    }
                });
            }
        }
    });
})