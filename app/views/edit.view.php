<?php require('app/views/partials/head.php'); ?>
<div class="section-container">
  <h2 class="heading-2">Edit your task</h2>
    <form action="/tasks/edit?id=<?php echo $task['id']; ?>" method="POST">
        <input name="description" value="<?php echo $task['description']; ?>"></input>
        <button class="submit-button" type="submit">Edit Task</button>
    </form>
</div>  

    <?php require('app/views/partials/footer.php'); ?>