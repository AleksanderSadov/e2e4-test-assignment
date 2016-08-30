window.addEventListener("DOMContentLoaded", main);
function main() 
{
    var button = document.getElementById("delete_message_button");
    var DeleteMessageButton = function() 
    {
        if (document.getElementsByClassName("comments").length <= 1)
        // Поле добавления комментариев принадлежит классу comments поэтому сравнение от 1
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

