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
        <?php foreach ($tasks as $task) : ?> 
            <div class="task-color-container" style="<?php echo ($task->completed) ?'opacity: 0.5;' : 'opacity: 1'; ?>">
                <div class="task-description"> 
                    <?php if ($task->completed) : ?> 
                        <strike> <?= $task->description; ?> </strike> 
                    <?php else: ?> 
                        <?=($task->description); ?>
                    <?php endif;?> 
                </div>
                <!-- Logic for Done/Undone buttons -->
                <?php if ($task->completed) {
                    $taskButtonText = "Undone";
                } else { 
                    $taskButtonText = "Done";
                }?> 
                

                <div class="task-button-container">
                    <div class="task-button"><a href="/tasks/changeStatus?id=<?php echo $task->id; ?>"><?php print $taskButtonText; ?></a></div>
                    
                    <!-- Edit  -->
                    <div class="task-button"><a href="/tasks/edit?id=<?php echo $task->id; ?>">Edit</a></div>

                    <!-- Delete Button -->
                    <div class="task-button"><a href="/tasks/delete?id=<?php echo $task->id; ?>">Delete</a></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>


<?php require('app/views/partials/footer.php'); ?>