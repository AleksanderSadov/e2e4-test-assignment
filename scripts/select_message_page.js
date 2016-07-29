window.addEventListener("DOMContentLoaded", main);
function main() 
{
    var button = document.getElementById("delete_message_button");
    var DeleteMessageButton = function() 
    {
        if (confirm("Вы дейстительно хотите удалить сообщение?"))
        {
            button.setAttribute("form", "delete_message_form");
        }
    };
    document.getElementById("delete_message").onclick = DeleteMessageButton;
}

