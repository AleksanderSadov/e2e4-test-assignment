<div
    class="comments boxed_content"
    id="comment_field">
    <form
    action="index.php?controller=Messages&action=View&id=<?php echo $this->vars['message']['id']; ?>"
    method="POST">
        <textarea
            rows="1"
            cols="30"
            type="text"
            placeholder="Имя"
            maxlength="50"
            required
            name="author"></textarea><br />
        <textarea
            rows="10"
            cols="60"
            maxlength="1000"
            placeholder="Комментарий"
            required
            name="text"></textarea><br />
        <input
            type="hidden"
            name="topic"
            value="<?php echo $this->vars['message']['id']; ?>" />
        <div>
            <Button>Добавить комментарий</button>
        </div>
    </form>
</div>

