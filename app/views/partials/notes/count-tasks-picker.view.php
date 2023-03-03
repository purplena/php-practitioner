<p>Date: <?= dateReformat($_POST['completed_at']); ?> </p>

<p>You completed <span class="bold-span"><?= $number['count']; ?></span> task(s)! </p>

<?php
if ($number['count'] === 0) {
    echo "
            <p class='feedback-message'>Zero tasks completed!</p>
        ";
} else {
    echo "
                <p class='feedback-message'>Bravo! Shoulders back!</p>
            ";
}
?>