<h1>Post</h1>
<br>
<br>

<?php foreach($data as $item) : ?>

    <p class="sku">Код: <?php echo $item['sku'] ?></p>
        <h4><?php echo $item['name'] ?></h4>
        <p> Ціна: <span class="price"><?php echo $item['price'] ?></span> грн</p>
        <p> Кількість: <?php echo $item['qty'] ?></p>
        <p><?php if (!$item['qty'] > 0) {
                echo 'Нема в наявності';
            } ?></p>
            <hr>

<?php endforeach; ?>