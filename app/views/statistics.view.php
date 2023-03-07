<?php require('app/views/partials/head.php'); ?>

<div class="section-container">
    <h1>Let's check your stats!</h1>
    <div class="statistics-container">
        <form class="count-tasks-form border-container" method="POST" action="/tasks/statistics">
            <label for="completed_at">Pick your date</label>
            <input type="date" name="completed_at" id="completed_at" cols="30" rows="2" required placeholder="DD/MM/YYYY"></input>
            <button type="submit" class="submit-button">Submit</button>
        </form>

        <div class="border-container result-counter-tasks-container">
            <span class="title-span">And check your score</span>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                require('app/views/partials/notes/count-tasks-picker.view.php');
            }
?>
        </div>
    </div>

    <h3 style="margin-top: 4rem;">Have a look on a full picture!</h3>
    <?php require('app/views/partials/notes/statistics-per-date.view.php'); ?>

</div>

<?php require('app/views/partials/footer.php'); ?>