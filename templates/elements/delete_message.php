<div class="boxed_content action_button" id="delete_message">
    <button name="deleted_message" id="delete_message_button" value="0">
        Удалить <br /> сообщение
    </button>
</div>

<form style="display: hidden"
      action="<?php echo ROOT_URL . 'delete_message_formhandler.php';?>"
      method="GET" id="hidden_form" >
</form>