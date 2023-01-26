<?php require('app/views/partials/head.php'); ?>

<div class="section-container">
    <h2 class="heading-1">Let's add a new tasks in you list!</h2> 
    <div class="add-task-form">
        <form action="/tasks" method="POST">
                <input name="description"></input>
                <button class="submit-button" type="submit">New Task</button>
        </form>
    </div>

    <h2 class="heading-2">Here are all your tasks!</h2>
    <h5 class="heading-3">Pick the one and mark it as done!</h5>
    <div class="task-section-container">
        <div class="task-container">
            <?php foreach ($tasksUncompleted as $task) : ?> 
                <?php require('app/views/partials/task-card.view.php'); ?>
            <?php endforeach; ?>
        </div>
    </div>
        
    <h2 class="heading-2">Look how many tasks you've finished!</h2>
    <h5 class="heading-3">You can always add these tasks in your To-do list again!</h5>
    <div class="task-section-container">
        <div class="task-container">
            <?php foreach ($tasksCompleted as $task) : ?> 
                <?php require('app/views/partials/task-card.view.php'); ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>


</div>


<?php require('app/views/partials/footer.php'); ?>