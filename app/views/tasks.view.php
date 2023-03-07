<?php require('app/views/partials/head.php'); ?>

<div class="section-container">
    <h1 class="heading-1">Add a new tasks here!</h1>
    <div class="add-task-form-container">
        <form action="/tasks" method="POST">
            <textarea class="new-task-textarea" name="description" placeholder="Buy 2 oranges" require><?= isset($_POST['description']) ? $_POST['description'] : ''; ?></textarea>
            <?php if (isset($errors['description'])) : ?>
                <p class="error-message"><?= $errors['description']; ?></p>
            <?php endif; ?>
            <button class="submit-button" type="submit">New Task</button>
        </form>
    </div>

    <h2 class="heading-2">Here are all your tasks!</h2>
    <?php require('app/views/partials/notes/no-tasks.view.php'); ?>
    <div class="task-section-container">
        <?php foreach ($tasksUncompleted as $task) : ?>
            <?php require('app/views/partials/notes/task-card.view.php'); ?>
        <?php endforeach; ?>

    </div>

    <h2 class="heading-2">Look how many tasks you've finished!</h2>
    <?php require('app/views/partials/notes/no-completed-tasks.view.php'); ?>
    <div class="task-section-container">
        <?php foreach ($tasksCompleted as $task) : ?>
            <?php require('app/views/partials/notes/task-card.view.php'); ?>
        <?php endforeach; ?>
    </div>
</div>


<?php require('app/views/partials/footer.php'); ?>