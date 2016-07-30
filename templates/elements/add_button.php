<div 
    class="boxed_content action_button"
    id="add_button">
    <form
        method='<?php echo $this->templates["add_button"]["method"]; ?>'
        action='<?php echo $this->templates["add_button"]["action"]; ?>' >
        <button
            name='<?php echo $this->templates["add_button"]["name"]; ?>'
            value='<?php echo $this->templates["add_button"]["value"]; ?>'>
            <?php echo $this->templates["add_button"]["content"]; ?>
        </button>
    </form>
</div>
