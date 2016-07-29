<div class="message_content">
    <?php isset($this->vars["message"]->header) ?
        $this->AddTemplate("message_header") :
        null; ?>
    <?php isset($this->vars["message"]->brief) ?
        $this->AddTemplate("message_brief") :
        null; ?>
    <?php isset($this->vars["message"]->text) ?
        $this->AddTemplate("message_text") :
        null; ?>
</div>