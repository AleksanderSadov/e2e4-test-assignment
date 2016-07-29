<div
    class="boxed_content action_button"
    id="edit_message">
    <form
        method="GET"
        action="index.php">
        <button 
            name="navigation"
            id="edit_message_button"
            value="edit_message" >
        Редактировать <br /> сообщение
        </button>
        <input
            type="hidden"
            name="id"
            value=<?php echo $this->vars['id']; ?> /> 
    </form>
</div>