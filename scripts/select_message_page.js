window.addEventListener("DOMContentLoaded", main);
function main() 
{
    var button = document.getElementById("delete_message_button");
    var DeleteMessageButton = function() 
    {
        if (document.getElementsByClassName("comments").length <= 1)
        // comment field is comments class too
        {
            if (confirm("Вы дейстительно хотите удалить сообщение?"))
            {
                button.setAttribute("form", "delete_message_form");
            } 
        }
        else
        {
            alert("Нельзя удалить пост, в котором были оставлены комментарии");
        }

    };
    document.getElementById("delete_message").onclick = DeleteMessageButton;
}

