<h1>Post</h1>
<br>
<br>

<?php foreach($data as $item) : ?>

    <h3><?php echo $item['title'] ?></h3>
    <br>
    <p><?php echo $item['small_text'] ?></p>
    <hr>

<?php endforeach; ?>