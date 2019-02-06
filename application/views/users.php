<?php foreach ($users as $user): ?>

        <h3><?=$user['id'];?></h3>
        <div class="main">
                <?=$user['hash']; ?>
        </div>
         <?=$user['visits']; ?>

<?php endforeach; ?>