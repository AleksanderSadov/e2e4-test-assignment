<?php
    $this->setMain_template("editor_page");
    $this->title = "E2E4 TEST ASSIGNMENT";
    
    $this->templates['main_section_header']['content'] = "Редактор сообщений";
    
    $this->templates['editor']['legend'] = "Добавление сообщения";
    // as we creating new message no text should appear in textarea
    $this->templates['editor']['header'] = "";
    $this->templates['editor']['brief'] = "";
    $this->templates['editor']['text'] = "";
    $this->templates['editor']['submit_name'] = "add_message";
    $this->templates['editor']['submit_legend'] = "Добавить сообщение";
    $this->templates['editor']['submit_value'] = "placeholder_for_user_name";
?>
