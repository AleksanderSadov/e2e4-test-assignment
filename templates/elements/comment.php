<div class="comments boxed_content">
    <p><b><?php echo $this->templates['comment']['author']; ?></b></p>
    <p><?php echo $this->templates['comment']['date']; ?></p>
    <textarea 
        readonly
        rows="10"
        cols="60"
        maxlength="1000"><?php echo $this->templates['comment']['text']; ?></textarea>
</div>