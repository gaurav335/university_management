$(document).ready(function () {
	$(document).on('click','.package' , function(){
		$("#paymentWalletFrm").trigger('reset');
		var $this = $(this);
		var package_id = $this.data('id');
		$("#paymentWalletModal").modal('show');
		$("#paymentWalletModal").find("#package_id").val(package_id);	
	});

  $(document).on('click','.subscribed' , function(){
    $("#subscribedPackage").modal('show');
  });

  if($("#paymentWalletFrm").length){

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

   var form = document.getElementById('paymentWalletFrm');

   $(document).on('click', '#paymentWalletFrm', function (e) { 
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
     var form  = $('#paymentWalletFrm').serializeArray();
     $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        } ,
       type: "POST",
       url: url_changePackage,
       dataType: "json",
       data: {stripeToken:token.id,form:form},
       beforeSend: function () {
         $(document).find('.loader-icon').show();
       },
       success: function (res) {
         $(document).find('.loader-icon').hide();
         if (res.status) {
          $("#paymentWalletModal").modal('hide');
          $("#paymentWalletFrm").trigger('reset');
          $(".select-plan-btn").removeClass('subscribed');
          $(".custom-control-input").removeClass('subscribed');
          $(".select-plan-btn").addClass('package');
          $(".custom-control-input").addClass('package');
          flashMessage('success', res.message);
          $('#package'+res.id).html('Subscribed');
          $('#package'+res.id).removeClass('package');
          $('#packages'+res.id).removeClass('package');
          $('#package'+res.id).addClass('subscribed');
          $('#packages'+res.id).addClass('subscribed');
        } else {
          $("#paymentWalletModal").modal('hide');
          $("#paymentWalletFrm").trigger('reset');
          flashMessage('error', res.message);
        }
      }
    });
           // form.submit();
         }
       }

     });