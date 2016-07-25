$(document).ready(function()
{
    // When header of message clicked id of this message will be posted to next page
    $(".message_header > h2").click(function()
    {
        $("#hidden_input_id_message").val(this.id);
        $("#hidden_form").submit();
    });
    
});