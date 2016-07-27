<div class="boxed_content action_button" id="edit_message">
    <form method="GET" action="<?php echo ROOT_URL . 'edit_message.php';?>">
        <button name="edited_message" id="edit_message_button"
            value="<?php echo $message_id ?>" >
        Редактировать <br /> сообщение
        </button>
    </form>
</div>