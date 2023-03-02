<?php require('app/views/partials/head.php'); ?>

<div class="section-container">
    <h1>Let's check your stats!</h1>
    <div class="statistics-container">
        <form method="POST" action="/tasks/statistics">
            <label for="completed_at">Type your date</label>
            <input type="date" name="completed_at" id="completed_at" cols="30" rows="2" required placeholder="YYYY-mm-dd"></input>
            <button type="submit">Submit</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require('app/views/partials/notes/count-tasks-picker.view.php');
        }
        ?>
    </div>

    <?php require('app/views/partials/notes/statistics-per-date.view.php'); ?>

</div>

<?php require('app/views/partials/footer.php'); ?>