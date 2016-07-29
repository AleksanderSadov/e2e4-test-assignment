<div class="comments">
    <hr />
    <p><b><?php echo $this->vars['comment']->author; ?></b></p>
    <p><?php echo $this->vars['comment']->date; ?></p>
    <textarea 
        readonly
        rows="10"
        cols="60"
        maxlength="1000"><?php echo $this->vars['comment']->text; ?></textarea>
</div>