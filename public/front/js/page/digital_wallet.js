$("#btnAddWalletAmount").click(function(){
    $("#paymentWalletForm").trigger('reset');
    $("#paymentWalletModal").modal('show');
});

$("#loadMoredigitalWallet").on('click',function(){
$.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url_digital_wallet_history,
        type: "POST",
        dataType: "json",
        data:{lastId:$("#lastId").val()},
        beforeSend: function(){
            $(document).find('.loader-icon').show();
        },
        success:function(res) {
            console.log(res);
            $(document).find('.loader-icon').hide();
            if(res.status){
              $("#digital_wallet-listing").append(res.data);
              $("#lastId").val(res.nextId)
              if(res.visible==false){
                $("#loadMoredigitalWallet").addClass('d-none')
            }

        } else {

        }
    },
    compelete: function(){
        $(document).find('.loader-icon').hide();
    },
    error: function(jqXHR, exception) {
        $(document).find('.loader-icon').hide();
        flashMessage('error',jqXHR.statusText);
    }
});
});

if($("#paymentWalletForm").length){

var elements = stripe.elements();
var style = {
 base: {
   fontWeight: 400,
   fontFamily: '"Open Sans", sans-serif',
   fontSize: '15px',
   lineHeight: '25px',
   color: '#495057',

   '::placeholder': {
     color: '#888',
   },
 },
 invalid: {
   color: '#ff3737',
 }
};

var cardElement = elements.create('cardNumber', {
 style: style
});
cardElement.mount('#card_number');

var exp = elements.create('cardExpiry', {
 'style': style
});
exp.mount('#card_expiry');

var cvc = elements.create('cardCvc', {
 'style': style
});
cvc.mount('#card_cvc');
var resultContainer = document.getElementById('paymentResponse');
cardElement.addEventListener('change', function(event) {
 if (event.error) {
           // resultContainer.innerHTML = '<p>'+event.error.message+'</p>';
           flashMessage('error', event.error.message);
         } else {
           // resultContainer.innerHTML = '';
         }
       });

var form = document.getElementById('paymentWalletForm');

$(document).on('click', '#paymentWalletForm', function (e) { 
 e.preventDefault();
 createToken();
});
function createToken() {
 stripe.createToken(cardElement).then(function(result) {
   if (result.error) {
               // resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
               flashMessage('error', result.error.message);
             } else {

               stripeTokenHandler(result.token);
             }
           });
}
function stripeTokenHandler(token) {
 var amount  = $('#amount').val();
 $.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
   type: "POST",
   url: url_add_digital_wallet,
   dataType: "json",
   data: {stripeToken:token.id,amount:amount},
   beforeSend: function () {
     $(document).find('.loader-icon').show();
   },
   success: function (res) {
     $(document).find('.loader-icon').hide();
     if (res.status) {
    
      flashMessage('success', res.message);
      setTimeout(function(){
        window.location.reload();
      },1000)
             } else {
      
      flashMessage('error', res.message);
    }
  }
});
        
     }
   }

$("#frm_walletPay").submit(function(e){
 var amount  =  $('#amount').val();
 $("#walletPay_amount").val(amount);
    $("#frm_walletPay").submit();

});

var getUrlParameter = function getUrlParameter(sParam) {
var sPageURL = window.location.search.substring(1),
    sURLVariables = sPageURL.split('&'),
    sParameterName,
    i;

for (i = 0; i < sURLVariables.length; i++) {
    sParameterName = sURLVariables[i].split('=');

    if (sParameterName[0] === sParam) {
        return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
    }
}
return false;
};

if(getUrlParameter('PayerID')) {
setTimeout(function(){
  var url = new URL(window.location.href);
var c = url.searchParams.get("PayerID");
  flashMessage('success', "Wallet Balance updating soon Ref No :"+c);
},1000)
}