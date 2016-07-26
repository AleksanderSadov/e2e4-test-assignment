<form method="GET" action=<?php echo ROOT_URL . 
        "add_message_formhandler.php"?> >
    <fieldset>
        <legend>Добавление сообщения</legend>
        <h3>Введите заголовок</h3>
        <input name="input_header" type="text" placeholder="Заголовок"
               required size="101" class="input_message"/>
        <h3>Введите краткое содержание</h3>
        <textarea id="input_brief" name="input_brief" maxlength="500"
                  placeholder="Краткое содержание" class="input_message"
                  required wrap="hard" cols="100" rows="10"></textarea>
        <h3>Введите основной текст</h3>
        <textarea id="input_text" name="input_text" maxlength="30000"
                  placeholder="Основной текст" class="input_message"
                  required wrap="hard" cols="100" rows="20"></textarea>
        <input type="submit" value="Добавить сообщение"/>
    </fieldset>
</form>
