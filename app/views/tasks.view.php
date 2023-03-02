<?php require('app/views/partials/head.php'); ?>

<div class="section-container">
    <h1 class="heading-1">Add a new tasks here!</h1>
    <div class="add-task-form-container">
        <form action="/tasks" method="POST">
            <textarea class="new-task-textarea" name="description" placeholder="Buy green vegetables and 2 oranges" require><?= isset($_POST['description']) ? $_POST['description'] : '' ?></textarea>
            <?php if (isset($errors['description'])) : ?>
                <p class="error-message"><?= $errors['description']; ?></p>
            <?php endif; ?>
            <button class="submit-button" type="submit">New Task</button>
        </form>
    </div>

    <h2 class="heading-2">Here are all your tasks!</h2>
    <h5 class="heading-3">Pick the one and mark it as done!</h5>
    <div class="task-section-container">

        <?php foreach ($tasksUncompleted as $task) : ?>
            <?php require('app/views/partials/notes/task-card.view.php'); ?>
        <?php endforeach; ?>

    </div>

    <h2 class="heading-2">Look how many tasks you've finished!</h2>
    <h5 class="heading-3">You can always add these tasks in your To-do list again!</h5>
    <a href="/tasks/statistics" class="submit-button" style="width: 270px; margin-bottom: 4rem; text-align: center;">See the statistics</a>
    <div class="task-section-container">
        <?php foreach ($tasksCompleted as $task) : ?>
            <?php require('app/views/partials/notes/task-card.view.php'); ?>
        <?php endforeach; ?>
    </div>

</div>


</div>


<?php require('app/views/partials/footer.php'); ?>