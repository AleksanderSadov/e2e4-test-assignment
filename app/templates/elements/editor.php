<div
    class="editor">
    <form 
        method="POST"
        action="<?php echo $this->templates['editor']['form_action']; ?>" >
        <fieldset>
            <legend><?php echo $this->templates['editor']['legend']; ?> </legend>
            <h3>Введите заголовок</h3>
            <textarea 
                id="input_header"
                name="header"
                maxlength="200"
                placeholder="Заголовок"
                class="input_message"
                required wrap="hard"
                cols="100"
                rows="5"><?php echo $this->templates['editor']['header']; ?></textarea>
            <h3>Введите краткое содеражние</h3>
            <textarea
                id="input_brief"
                name="brief"
                maxlength="500"
                placeholder="Краткое содержание"
                class="input_message"
                required wrap="hard"
                cols="100"
                rows="10"><?php echo $this->templates['editor']['brief']; ?></textarea>
            <h3>Введите основной текст</h3>
            <textarea
                id="input_text"
                name="text"
                maxlength="30000"
                placeholder="Основной текст"
                class="input_message"
                required wrap="hard"
                cols="100"
                rows="20"><?php echo $this->templates['editor']['text'];?></textarea>
            <button id="editor_submit_button">
                <?php echo $this->templates['editor']['submit_legend']; ?>
            </button>
            
        </fieldset>
    </form>
</div>

