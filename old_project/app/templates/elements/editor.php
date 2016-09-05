<div
    class="editor">
    <form 
        method="POST"
        action="<?php echo $this->vars['editor']['form_action']; ?>" >
        <fieldset>
            <legend><?php echo $this->vars['editor']['legend']; ?> </legend>
            <h3>Введите заголовок</h3>
            <textarea 
                id="input_header"
                name="header"
                maxlength="200"
                placeholder="Заголовок"
                class="input_message"
                required wrap="hard"
                cols="100"
                rows="5"><?php if (!empty($this->vars['message']['header'])) : 
                    echo $this->vars['message']['header']; endif; ?></textarea>
            <h3>Введите краткое содеражние</h3>
            <textarea
                id="input_brief"
                name="brief"
                maxlength="500"
                placeholder="Краткое содержание"
                class="input_message"
                required wrap="hard"
                cols="100"
                rows="10"><?php if (!empty($this->vars['message']['header'])) : 
                    echo $this->vars['message']['brief']; endif; ?></textarea>
            <h3>Введите основной текст</h3>
            <textarea
                id="input_text"
                name="text"
                maxlength="30000"
                placeholder="Основной текст"
                class="input_message"
                required wrap="hard"
                cols="100"
                rows="20"><?php if (!empty($this->vars['message']['header'])) : 
                    echo $this->vars['message']['text']; endif; ?></textarea>
            <button id="editor_submit_button">
                <?php echo $this->vars['editor']['submit_legend']; ?>
            </button>
            
        </fieldset>
    </form>
</div>

