<?php

use App\Core\App;

?>

<?php require('app/views/partials/head.php'); ?>
    
<?php if (App::get('auth')->isAuthenticated()) {
    require('app/views/partials/log-out.view.php');
} else {
    require('app/views/partials/log-in.view.php');
} ?>

<?php require('app/views/partials/footer.php'); ?>