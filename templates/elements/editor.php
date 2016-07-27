<form method="POST" action=<?php echo $formhandler ?> >
    <fieldset>
        <legend><?php echo $input_fieldset_legend ?> </legend>
        <input type="hidden" name="message_id" value=<?php echo $message_id; ?> />
        <h3>Введите заголовок</h3>
        <textarea id="input_header" name="input_header" maxlength="200"
                  placeholder="Заголовок" class="input_message"
                  required wrap="hard" cols="100" rows="5"><?php echo isset($messages) ? $messages[0]->brief : "" ?></textarea>
        <h3>Введите краткое содеражние</h3>
        <textarea id="input_brief" name="input_brief" maxlength="500"
                  placeholder="Краткое содержание" class="input_message"
                  required wrap="hard" cols="100" rows="10"><?php echo isset($messages) ? $messages[0]->brief : "" ?></textarea>
        <h3>Введите основной текст</h3>
        <textarea id="input_text" name="input_text" maxlength="30000"
                  placeholder="Основной текст" class="input_message"
                  required wrap="hard" cols="100" rows="20"><?php echo isset($messages) ? $messages[0]->text : "" ?></textarea>
        <input type="submit" value=<?php echo $submit_legend ?> />
    </fieldset>
</form>
