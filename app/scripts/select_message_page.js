window.addEventListener("DOMContentLoaded", main);
function main() 
{
    var button = document.getElementById("delete_message_button");
    var DeleteMessageButton = function() 
    {
        if (document.getElementsByClassName("comments").length <= 1)
        // comment field is comments class too so it counts as 1
        {
            if (confirm("Вы действительно хотите удалить сообщение?"))
            {
                button.setAttribute("form", "delete_message_form");
            } 
        }
        else
        {
            alert("Нельзя удалить пост, в котором были оставлены комментарии");
        }
    };
    document.getElementById("delete_message_button").onclick = DeleteMessageButton;
}

