<div class="task-color-container"  style="<?php echo ($task->completed) ?'opacity: 0.5;' : 'opacity: 1'; ?>">
    <div class="task-description"> 
        <?php if ($task->completed) { 
            echo '<strike>' . ($task->description) . '</strike>';
        } else {
            echo ($task->description);
        } ?>
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
        <div style="<?php echo ($task->completed) ?'opacity: 0;' : 'opacity: 1'; ?>" class="task-button"><a href="/tasks/edit?id=<?php echo $task->id; ?>">Edit</a></div>

        <!-- Delete Button -->
        <div class="task-button"><a href="/tasks/delete?id=<?php echo $task->id; ?>">Delete</a></div>
    </div>
</div>
