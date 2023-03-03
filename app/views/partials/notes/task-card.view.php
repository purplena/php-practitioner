<div class="task-color-container" style="<?php echo ($task->completed) ? 'background: rgba(247, 239, 153, 0.4);' : 'background: rgba(247, 239, 153)'; ?>">

    <!-- Delete Button -->
    <form method="POST" class="delete-form">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="id" value="<?= $task->id; ?>">
        <button class="delete-button"><img src="/images/close.png" class="delete-image" /></button>
    </form>


    <div class="opacity-task-color-container" style="<?php echo ($task->completed) ? 'opacity: 0.5;' : 'opacity: 1;' ?>">
        <!-- Description(body) of a Task -->
        <div class="task-description">
            <?php if ($task->completed) {
                echo '<strike>' . $task->description . '</strike>';
            } else {
                echo $task->description;
            } ?>
        </div>

        <!-- Date PHP Code-->
        <?php if ($task->completed) {
            echo "
            <div class='date-container'>
                <p>
                    Task created:" . dateReformat($task->created_at) .
                "</p>
                <p style='margin-top:0.5rem;'>
                    Task completed:" . dateReformat($task->completed_at) .
                "</p>
            </div>";
        } else {
            echo "
            <div class='date-container'>
                <p>
                    Task created:" . dateReformat($task->created_at) .
                "</p>
            </div>";
        }
        ?>

    </div>

    <!-- Logic for Done/Undone buttons -->
    <?php if ($task->completed) {
        $taskButtonText = 'Undone';
    } else {
        $taskButtonText = 'Done';
    } ?>

    <div class="task-button-container">
        <!-- Done/Undone -->
        <div><a class="task-button done-button" href="/tasks/changeStatus?id=<?php echo $task->id; ?>"><?php echo $taskButtonText; ?></a></div>
        <!-- Edit  -->
        <div style="<?php echo ($task->completed) ? 'display: none;' : 'display: block'; ?>"><a class="task-button" href="/tasks/edit?id=<?php echo $task->id; ?>">Edit</a></div>
    </div>

</div>