<div
    class="comments boxed_content"
    id="comment_field">
    <form
    action="index.php"
    method="GET">
        <textarea
            rows="1"
            cols="30"
            type="text"
            placeholder="Имя"
            maxlength="50"
            required
            name="comment_author"></textarea><br />
        <textarea
            rows="10"
            cols="60"
            maxlength="1000"
            placeholder="Комментарий"
            required
            name="comment_text"></textarea><br />
        <div>
            <Button>Добавить комментарий</button>
        </div>
            
        <input
            type="hidden"
            name="controller"
            value="SelectMessage" />
        <input
            type="hidden"
            name="action"
            value="PostComment" />
        <input
            type="hidden"
            name="message_id"
            value="<?php echo $this->templates['comment_field']['message_id']; ?>" />
    </form>
</div>

