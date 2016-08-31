<div 
    class="boxed_content action_button"
    id="edit_button">
    <form
        method='GET'>
        <button>
            Редактировать <br /> сообщение
        </button>
        
        <input
            type="hidden"
            name="controller"
            value="Messages" />
        <input
            type="hidden"
            name="action"
            value="Edit" />
        <input
            type="hidden"
            name="id"
            value="<?php echo $this->vars["message"]["id"]; ?>" />
    </form>
</div>
