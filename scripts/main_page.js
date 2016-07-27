window.addEventListener("DOMContentLoaded", main);
function main() 
{
    var headers = document.getElementsByClassName("message_header");
    var onclickMessageHeader = function() 
    {
        var message_id = this.getAttribute("id");
        var hidden_input = document.getElementById("hidden_input_id_message");
        hidden_input.setAttribute("value", message_id);
        hidden_input.form.submit();
    };
    for (var i = 0; i < headers.length; i++)
    {
        headers[i].addEventListener("click", onclickMessageHeader);
    }
}