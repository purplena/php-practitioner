<?php

use App\Core\App;
?>
<?php require('app/views/partials/head.php'); ?>
<div class="log-in-section">


    <?php if (App::get('auth')->isAuthenticated()) {
        echo
        '<div>
            <h1>You are logged in</h1>
            <p class="log-in-message">Click <a href="/logout" class="logout-button">log out</a> to disconnect</p>
        </div>';
    } else {
        echo '
    <h1>Log in</h1>
    <form class="auth-form" name="frmUser" method="post" action="/login">
        <div class="row">
            <label>E-mail</label>
            <input type="text" name="email" required>
        </div>
        <div class="row">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <div class="row">
            <input type="submit" name="submit" value="Log in">
        </div>
</form>';
    } ?>

</div>

<?php require('app/views/partials/footer.php'); ?>