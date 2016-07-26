window.addEventListener("DOMContentLoaded", main);
function main() 
{
    var DeleteMessageButton = function() 
    {
        if (confirm("Вы дейстительно хотите удалить сообщение?"))
        {
            document.getElementById("hidden_form").submit();
        }
    };
    document.getElementById("delete_message").onclick = DeleteMessageButton;
}

