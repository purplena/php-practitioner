<?php require('app/views/partials/head.php'); ?>

<h3>All Users</h3>
<?php foreach ($users as $user) : ?>
    <li>
        <?= $user->name; ?>
    </li>
<?php endforeach; ?>


<h1>Submit your name</h1>
<form action="/users" method="POST">
    <input name="name"></input>
    <button type="submit">Submit</button>
</form>

<?php require('app/views/partials/footer.php'); ?>