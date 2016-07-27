<form method="GET" action=<?php echo ROOT_URL . 
        "add_message_formhandler.php"?> >
    <fieldset>
        <legend><?php echo $input_fieldset_legend ?> </legend>
        <h3><?php echo $input_header_legend ?> </h3>
        <input name="input_header" type="text" placeholder="Заголовок"
               required size="101" class="input_message"/>
        <h3><?php echo $input_brief_legend ?> </h3>
        <textarea id="input_brief" name="input_brief" maxlength="500"
                  placeholder="Краткое содержание" class="input_message"
                  required wrap="hard" cols="100" rows="10"></textarea>
        <h3><?php echo $input_text_legend ?> </h3>
        <textarea id="input_text" name="input_text" maxlength="30000"
                  placeholder="Основной текст" class="input_message"
                  required wrap="hard" cols="100" rows="20"></textarea>
        <input type="submit" value=<?php echo $submit_legend ?> />
    </fieldset>
</form>
