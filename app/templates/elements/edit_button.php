<div
    class="boxed_content action_button"
    id="edit_button">
    <form
        method="GET"
        action="index.php">
        <button 
            name="navigation"
            value="edit_message" >
        Редактировать <br /> сообщение
        </button>
        <input
            type="hidden"
            name="id"
            value=<?php echo $this->templates['edit_button']['message_id']; ?> /> 
    </form>
</div>