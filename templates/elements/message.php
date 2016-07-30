<div class="message_content">
    <?php isset($this->templates["message"]["header"]) ?
        $this->LoadTemplate("message_header") :
        null; ?>
    <?php isset($this->templates["message"]["brief"]) ?
        $this->LoadTemplate("message_brief") :
        null; ?>
    <?php isset($this->templates["message"]["text"]) ?
        $this->LoadTemplate("message_text") :
        null; ?>
</div>