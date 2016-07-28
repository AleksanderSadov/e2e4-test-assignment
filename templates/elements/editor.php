<div
    class="editor">
    <form 
        method="POST"
        action='<?php echo ROOT_URL . "index.php";?>' >
        <fieldset>
            <legend><?php $this->RequestItem("editor_legend"); ?> </legend>
            <h3>Введите заголовок</h3>
            <textarea 
                id="input_header"
                name="input_header"
                maxlength="200"
                placeholder="Заголовок"
                class="input_message"
                required wrap="hard"
                cols="100"
                rows="5"><?php  ;?></textarea>
            <h3>Введите краткое содеражние</h3>
            <textarea
                id="input_brief"
                name="input_brief"
                maxlength="500"
                placeholder="Краткое содержание"
                class="input_message"
                required wrap="hard"
                cols="100"
                rows="10"><?php ;?></textarea>
            <h3>Введите основной текст</h3>
            <textarea
                id="input_text"
                name="input_text"
                maxlength="30000"
                placeholder="Основной текст"
                class="input_message"
                required wrap="hard"
                cols="100" rows="20"><?php ;?></textarea>
            <input
                type="submit"
                name="add_message"
                value='<?php $this->RequestItem("add_message_submit_legend"); ?>' />
        </fieldset>
    </form>
</div>

