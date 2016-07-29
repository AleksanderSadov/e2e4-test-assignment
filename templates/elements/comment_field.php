<div id="comment_field">
    <form
    action=""
    method="POST">
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
            cols="30"
            maxlength="1000"
            placeholder="Комментарий"
            required
            name="comment_text"></textarea><br />
        <div>
            <Button
                name="post_commit"
                type="submit">Добавить комментарий</button>
        </div>
        <input
            type="hidden"
            name="comment_topic"
            value="<?php echo $this->vars['id']; ?>" />
    </form>
</div>

