/* == LOGIN == */
$('input.user-login').keyup(function(){
    if(validateEmail($(this).val()))
    {
        check_user('email',$(this).val());
        $('.invalid-user-login').text("Email tidak ditemukan");
        $('.login-validation input[name="type"]').val('email');
    }
    else if(validatePhone($(this).val()))
    {
        check_user('phone',$(this).val());
        $('.invalid-user-login').text("Nomor Handphone tidak ditemukan");
        $('.login-validation input[name="type"]').val('phone');
    }
    else
    {
        $('.invalid-user-login').text("Email / Nomor Handphone tidak valid");
        $('input.user-login').removeClass('valid');
        $('input.user-login').addClass('is-invalid');
    }
});

function validateEmail(email) {
    var email_regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return email_regex.test(email);
}

function validatePhone(phone) {
    var phone_regex = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/g;
    return phone_regex.test(phone);
}

function check_user(type,value) {
    $.ajax({
    type: 'POST',
    data: {
        type: type,
        value: value
    },
    url: base_url+'login/user_'+type,
    cache: false,
    success: function(data){
        if(data == 'success')
        {
            $('input.user-login').addClass('valid');
            $('input.user-login').removeClass('is-invalid');
        }
        else
        {
            $('input.user-login').removeClass('valid');
            $('input.user-login').addClass('is-invalid');
        }
    }
    });
}

$('.btn-login').click(function() {
    event.preventDefault();
    $.ajax({
    type: 'POST',
    data: $('.login-validation').serialize(),
    url: base_url+'login/user_login',
    cache: false,
    success: function(data){
        if(data == 'success')
        {
            $('.login-validation').submit();
        }
        else
        {
            if($('.login-validation input[name="type"]').val() == '')
            {
                $('input.user-login').removeClass('valid');
                $('input.user-login').addClass('is-invalid');
            }
            else
            {
                check_user($('.login-validation input[name="type"]').val(),$('.login-validation input[name="user_access"]').val())
            }
            $('input[name="user_password"]').removeClass('valid');
            $('input[name="user_password"]').addClass('is-invalid');
        }
    }
    });
});
/* == #LOGIN == */

/* == PRODUCT == */
$('.input-product').keyup(function(){
    var maxsku = $('.input-sku').data('max');
    if(($(this).val().length) <= maxsku)
    {
        $('.input-sku').val($(this).val());
        $('.inputmax-sku').text($(this).val().length);
    }
});

$('.input-count-income').on('change keyup', function(e){
    var product_price_real = ($('input[name="product_price_real"]').val()).split('.').join(''); 
    var product_price_cost = ($('input[name="product_price_cost"]').val()).split('.').join('');
    var total_income = product_price_real-product_price_cost;
    if(total_income < 0)
    {
        $('.total-income strong').html('<span class="text-danger">Rp '+(total_income).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+'</span>');
    }
    else
    {
        $('.total-income strong').html('Rp '+(total_income).toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
    }
    count_discount($('.input-count-discount').val())
});

$('.input-count-discount').on('change keyup', function(e){
    count_discount($(this).val());
});

function count_discount(discount)
{
    var product_price_real = ($('input[name="product_price_real"]').val()).split('.').join(''); 
    var total_discount = product_price_real-(product_price_real*discount/100);
    $('.total-discount strong').html('Rp '+(total_discount).toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));    
}
/* == #PRODUCT == */