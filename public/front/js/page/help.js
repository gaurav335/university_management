$(document).ready(function () {

    //  From Validation and Ajax
    $("#chat-support").validate({
        errorClass:"text-danger", 
        rules: {
            'reason_id': {required: true},
            'reason_text': {required: true},
        },
        messages: {
            'reason_id': {
                required: "Reason field is required",
            },
            'reason_text': {
                required: "Reason text field is required.",
            }
        },
        submitHandler: function (form,event) {
            // var supportUrl = BASE_URL + "view-ticket";
            event.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url_chatSupportReason,
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
                    $("#chat-support").trigger('reset');
                    $(document).find('.loader-icon').hide();
                    if(res.status){
                        flashMessage('success',res.message);
                        setTimeout(function(){
                            window.location.href= res.url;
                        },2000)
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
    function getChatMessage()
    {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_getChatMessage,
            dataType: "json",
            type: "POST",
            beforeSend: function () {
                $(document).find('.loader-icon').show();
            },
            success: function (res) {
                $(document).find('.loader-icon').hide();
                if (res.status)
                {
                    $('.chat-messages').html('');
                    $('.chat-messages').html(res.data);
                    // $('#receiverId').val(id);
                    // $('.chat-conversation-box').scrollTop($('.chat-conversation-box')[0].scrollHeight);
                }
            },
            compelete: function () {
                $(document).find('.loader-icon').hide();
            }
        });

    }

    getChatMessage();
});

$("#frm_send_msg").on('submit', function (e) {
    e.preventDefault();
    var message = $('.sendMessage').val();
    var fd = new FormData();
    var files = $('#media')[0].files[0];
    var message = $('#sendMessage').val();
    fd.append('media',files);
    fd.append('message',message);
    if(message.trim() == '' && files == undefined) {
        alert("Message can't blank ")
    }else {
        $.ajax({
            url: BASE_URL + "send-message",
            type: "POST",
            data: fd,
            processData: false,
            contentType: false,
            cache: false,
            dataType: "json",
            beforeSend: function(){
                $(document).find('.loader-icon').show();
            },
            success: function (res) {
                $(document).find('.loader-icon').hide();
                if (res.status == true)
                {
                    $(".chat-messages").append(res.data);
                    $("#frm_send_msg").trigger('reset');
                }

            },
            compelete: function(){
                $(document).find('.loader-icon').hide();
            },
            error: function (jqXHR, exception, res) {
                $(document).find('.loader-icon').hide();
                if (jqXHR.status == 422) {
                }
            }
        });
        $('.sendMessage').val(''); 
    }
        
});


 $('input[type="file"]').change(function(e){
    var fileName = e.target.files[0].name;
    $('#sendMessage').attr('readonly');
    $('#sendMessage').val(fileName);
});