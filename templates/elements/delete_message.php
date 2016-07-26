<div class="boxed_content action_button" id="delete_message">
    <button id="delete_message_button">
        Удалить <br /> сообщение
    </button>
</div>

<form style="display: hidden"
      action="<?php echo ROOT_URL . '#';?>"
      method="GET" id="hidden_form" >
    <input type="hidden"
           name="delete_message" 
           value="0" />
</form>