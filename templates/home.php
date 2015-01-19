<?php include __DIR__ . '/partials/top.php' ?>

<div class="container">
    <h2 class="text-center">Hello World!</h2>
    <a href="<?php echo $app->urlFor('users-list') ?>">Users list</a>
</div>

<?php include __DIR__ . '/partials/bottom.php' ?>