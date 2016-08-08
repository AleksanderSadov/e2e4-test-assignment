<div 
    class="boxed_content action_button"
    id="delete_button">
    <button id="delete_message_button"> 
        Удалить <br /> сообщение
    </button>
</div>

<form 
    action="index.php"
    method="GET"
    id="delete_message_form" >
        <input
            type="hidden"
            name="controller"
            value="SelectMessage" />
        <input
            type="hidden"
            name="action"
            value="Delete" />
        <input
            type="hidden"
            name="id"
            value="<?php echo $this->templates['delete_button']['message_id']; ?>" />
</form>