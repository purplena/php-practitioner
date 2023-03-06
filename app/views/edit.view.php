<?php require('app/views/partials/head.php'); ?>
<div class="section-container">
    <h2 class="heading-2" style="text-align: center;">Edit your task</h2>
    <form class="edit-task-form" method="POST" action="store">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
        <input name="description" id="description" value="<?php echo $task['description']; ?>">
        <button class="submit-button" type="submit">Edit Task</button>
    </form>
</div>

<?php require('app/views/partials/footer.php'); ?>