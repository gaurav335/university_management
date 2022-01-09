function getChatMessage()
{
    var order_id = $('#order_id').val();
    var driver_id = $('#driver_id').val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url_chat_shopper_message,
        dataType: "json",
        type: "POST",
        data: {order_id: order_id,driver_id:driver_id},
        beforeSend: function () {
            $(document).find('.loader-icon').show();
        },
        success: function (res) {
            $(document).find('.loader-icon').hide();
            if (res.status)
            {
                $('.order-chat-content').html('');
                $('.order-chat-content').html(res.data);
                $('.order-chat-content').scrollTop($('.order-chat-content')[0].scrollHeight);
            }
        },
        compelete: function () {
            $(document).find('.loader-icon').hide();
        }
    });

}


// Send message Simple message
function sendMessage()
{
    var message = $('#sendMessage').val();
    var order_id = $('#order_id').val();
    var store_id = $('#store_id').val();
    console.log(message);
    if (message.trim() != '' || $('#attachment').val().trim() != '') {
        var formData = new FormData($('#frmSendMsg')[0]);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_send_shopper_message,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            dataType: "json",
            beforeSend: function () {

            },
            success: function (res) {
                $(document).find('.loader-icon').hide();

                if (res.status)
                {
                    var message_text = '';
                    var attachment = '';
                    if (res.data.attachment!=null){
                        attachment += '<a href="'+res.data.attachment+'" target="_blank"><i class="fa fa-paperclip" aria-hidden="true"></i></a><br/>';
                    }
                    message_text = '<div class="order-chat-list-sec right-chat"><div class="order-chat-area">'+attachment+res.data.chat_message+'</div></div>';
                    $(".order-chat-content").append(message_text);
                    $('.order-chat-content').scrollTop($('.order-chat-content')[0].scrollHeight);

                    $("#sendMessage").val('');
                    $("#attachment").val('');

                } else {
                    flashMessage('error',res.message);
                }
            },
            compelete: function () {
                $(document).find('.loader-icon').hide();
            },
            error: function (jqXHR, exception, res) {
                if (jqXHR.status == 422) {

                }
                else {

                }
            }
        });
        $('#sendMessage').val('');
    } else {
        alert("Message can't blank ");
    }
}
$("#frmSendMsg").on('submit', function (e) {
    e.preventDefault();
    sendMessage();
});
$(".chat-msg-send-btn").on('click', function (e) {
    e.preventDefault();
    sendMessage();
});
$(document).ready(function ()
{
    getChatMessage();
});

$('input[type="file"]').change(function(e){
    var fileName = e.target.files[0].name;
    $('#sendMessage').attr('readonly');
    $('#sendMessage').val(fileName);
});