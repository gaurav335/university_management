$(document).ready(function () {

    // Load more Product on Order Tracking  
    $("#loadMoreOrdertarcking").on('click',function(){

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_order_tracking_load_more,
            type: "POST",
            dataType: "json",
            data:{lastId:$("#lastId").val(),type:1},
            beforeSend: function(){
                $(document).find('.loader-icon').show();
            },
            success:function(res) {
                console.log(res);
                $(document).find('.loader-icon').hide();
                if(res.status){
                    $("#order-tracking-listing").append(res.data);
                    $("#lastId").val(res.nextId)
                    if(res.visible==false){
                        $("#loadMoreOrdertarcking").addClass('d-none')
                    }
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

    $("#loadMoreOrdertarckingPickup").on('click',function(){

        $.ajax({
            url: BASE_URL + "order-tracking",
            type: "POST",
            dataType: "json",
            data:{lastId:$("#lastIdPickup").val(),type:2},
            beforeSend: function(){
                $(document).find('.loader-icon').show();
            },
            success:function(res) {
                console.log(res);
                $(document).find('.loader-icon').hide();
                if(res.status){
                    $("#order-pickup-listing").append(res.data);
                    $("#lastIdPickup").val(res.nextId)
                    if(res.visible==false){
                        $("#loadMoreOrdertarckingPickup").addClass('d-none')
                    }
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
});