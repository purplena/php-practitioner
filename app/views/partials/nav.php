<?php

use App\Core\App;

?>

<div class="nav-container">
    <nav>
        <a href="/">Home</a>
        <a href="/tasks">Tasks</a>
        <a href="/tasks/statistics">Statistics</a>
        <a href="/log">
            <?php

            if (App::get('auth')->isAuthenticated()) {
                $user = App::get('auth')->getUser();
                echo 'Hi ' . $user['user_name'] . '!';
            } else {
                echo 'Log In';
            } ?>
        </a>
    </nav>
</div>
<div class="underline-container">
    <div class="underline"></div>
</div>