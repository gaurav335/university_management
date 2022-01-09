
$('.pick-status').on('click' ,function(){
    var order_id = $(this).data('id');
    var status = $(this).data('status');
    $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url_pickup_status_change,
        dataType: "json",
        type: "POST",
        data: {order_id:order_id,status:status},
        success: function (data) {
            if (data.status == true) {
                flashMessage('success',data.message);
            } else {
                flashMessage('success',data.message);
            }
        },
        compelete: function () {

        }
    });
});

$("#shpper_review_form").validate({
        errorClass:"text-danger", 
        rules: {
          'ratting': {
            required: true,
            email:true,
          },
          'remark':{required: true},
        },
        messages: {
          'ratting': {
            required: "Ratting required",
          },
          'remark': {
            required: "Remarks required",
          }
        },
        submitHandler: function (form,event) {
          event.preventDefault();
          $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_shopperReview,
            type: "POST",
            data:new FormData(form),
            processData:false,
            contentType:false,
            cache:false,
            dataType: "json",
            beforeSend: function(){
              $(document).find('.loader-icon').show();
            },
            success:function(res) {
              $(document).find('.loader-icon').hide();
              if(res.status){
                $('#reviewmodal').modal('hide');
                flashMessage('success',res.message);
                window.location.reload();
              } else {
                flashMessage('error',res.message);
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
        },
      });

       $(document).on('show.bs.modal', '#reviewmodal', function (e) {
         $("#shpper_review_form").trigger('reset'); 
       });

       $('.store-review-edit').click(function(){
    var review_id = $(this).data('store-review-id');  
    $.ajax({
        url: BASE_URL + "get-store-review",
        type: "POST",
        data: {review_id:review_id},
        dataType: "json",
        beforeSend: function(){
            $(document).find('.loader-icon').show();
        },
        success:function(res) {
            if(res.status == true) {
                $('#store_remark').html(' ');
                $("#shpper_review_form").trigger('reset');
                $(document).find('.loader-icon').hide();
                var stars = $('#stars li').parent().children('li.star');
                for (i = 0; i < res.data.review; i++) {
                    $(stars[i]).addClass('selected');
                }
                $('#store_review_id').val(res.data.id);
                $("#store_id").attr("disabled", "disabled"); 
                $("#store_id option[value="+res.data.store_id+"]").attr('selected', 'selected'); 
                $('#store_remark').html(res.data.remark);
                $('#reviewmodal').modal('show');
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
})