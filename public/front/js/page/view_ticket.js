$(document).ready(function () {
    function tableData() {
        $('#tickets_listing').dataTable({
            "processing": true,
            "serverSide": true,
            'destroy': true,
            'ordering': true,
            'searching': true,
            "order": [[0, "desc"]],
            'language': {
                'loadingRecords': '&nbsp;',
                'processing': '<div class="spinner"></div>'
            },
            "ajax": {
                "url": "get-all-tickets",
                "dataType": "json",
                "type": "POST",
                "data": {
                    // ad_type:$('#ad_type').val(),
                    // click_type:$('#click_type').val(),
                    // start_date:$('#start_date').val(),
                    // end_date:$('#end_date').val() 
                }
            },
            "columns": [
            {"data": "ticket_no"},
            {"data": "message"},
            {"data": "subject"},
            {"data": "status"},
            {"data": "action"}
            ]
        });
    }
    // tableData();

    $(document).on('click','.acttionli', function(e) {
        $type = $(this).data('type');
        if(confirm('Are You Sure '+$type+' Ticket')) {
            $id = $(this).data('id');
            return true;
        } else {
            e.preventDefault();
        }
    });


    $("#frmticketmsg").on('submit', function (e) {
        e.preventDefault();
        var ext = $('#attachment').val().split('.').pop().toLowerCase(); 
        var receiverId = $("#receiverId").val();
        var fd = new FormData();
        var files = $('#attachment')[0].files[0];
        var message = $('.send-message').val();
        var ticket_no = $('#ticket_no').val();
        fd.append('attachment',files);
        fd.append('sendMessage',message);
        fd.append('ticket_no',ticket_no);
        fd.append('receiverId',receiverId);
        if(message.trim() == '' && files == undefined) {
            alert("Message can't blank ")
            return false;
        }
        if(files != undefined && $.inArray(ext, ['pdf','png','jpg','jpeg']) == -1) {
            alert('invalid extension!'); 
            return false;
        }
        var formData = new FormData($(this)[0]);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_sendTicketMessage,
            type: "POST",
            data: fd,
            processData: false,
            contentType: false,
            cache: false,
            dataType: "json",
            beforeSend: function () {
            },
            success: function (res) {
                if (res.status == true)
                {
                    $('#attachment').val('');
                    $(".ticket-message").append(res.data);
                    $("#frmSendMsg").trigger('reset');
                    $('.chat-conversation-box').scrollTop($('.chat-conversation-box')[0].scrollHeight);

                }else {
                    flashMessage('error', res.message);
                }
            },
            compelete: function () {
            },
            error: function (jqXHR, exception, res) {
                if (jqXHR.status == 422) {
//                    flashMessage('error', jqXHR.responseJSON.message);
}
}
});
        $('.send-message').val('');
        $('#attachment').val('');
        
    });
    getChatMessage();

   // Load more Tickest History 
   $("#loadMoreTicketsHistory").on('click',function(){

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         url: url_ticketView_load_more,
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
              $("#tickest-history-listing").append(res.data);
              $("#lastId").val(res.nextId)
              if(res.visible==false){
                $("#loadMoreTicketsHistory").addClass('d-none')
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
});

function getChatMessage()
{
    var id = $('#id').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url_getTicketMessage,
        dataType: "json",
        type: "POST",
        data: {id: id},
        beforeSend: function () {
            $(document).find('.loader-icon').show();
        },
        success: function (res) {
            $(document).find('.loader-icon').hide();
            if (res.status == true)
            {
                $('.ticket-message').html('');
                $('.ticket-message').html(res.data);
                // $('#receiverId').val(id);
                // $('.chat-conversation-box').scrollTop($('.chat-conversation-box')[0].scrollHeight);
            } else {
                flashMessage('error', res.message);
            }
        },
        compelete: function () {
            $(document).find('.loader-icon').hide();
        }
    });

}


$('input[type="file"]').change(function(e){
    var fileName = e.target.files[0].name;
    $('#sendMessage').attr('readonly');
    $('#sendMessage').val(fileName);
});
