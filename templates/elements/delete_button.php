<div 
    class="boxed_content action_button"
    id="delete_message">
    <button 
        name="delete_message"
        id="delete_message_button"
        value="<?php echo $this->vars["id"]; ?>" >
        Удалить <br /> сообщение
    </button>
</div>

<form 
    style="display: hidden"
    action="index.php"
    method="POST"
    id="delete_message_form" >
</form>