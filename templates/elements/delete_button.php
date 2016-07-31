<div 
    class="boxed_content action_button"
    id="delete_button">
    <button 
        name="delete_message"
        id="delete_message_button"
        value="<?php echo $this->templates['delete_button']['message_id']; ?>" >
        Удалить <br /> сообщение
    </button>
</div>

<form 
    style="display: hidden"
    action="index.php"
    method="POST"
    id="delete_message_form" >
</form>