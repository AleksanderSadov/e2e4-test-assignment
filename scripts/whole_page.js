window.addEventListener("DOMContentLoaded", main);
function main() 
{
    var DeleteMessageButton = function() 
    {
        if (confirm("Вы дейстительно хотите удалить сообщение?"))
        {
            var headers = document.getElementsByClassName("message_header");
            var message_id = headers[0].id;
            var button = document.getElementById("delete_message_button");
            button.setAttribute("value", message_id);
            button.setAttribute("form", "hidden_form");
            this.form.submit();
        }
    };
    document.getElementById("delete_message").onclick = DeleteMessageButton;
}

