<div class="message_content">
    <?php isset($this->vars["message"]->header) ?
        $this->AddElement("message_header") :
        null; ?>
    <?php isset($this->vars["message"]->brief) ?
        $this->AddElement("message_brief") :
        null; ?>
    <?php isset($this->vars["message"]->text) ?
        $this->AddElement("message_text") :
        null; ?>
</div>