<?php require('app/views/partials/head.php'); ?>

<h3>Tasks</h3> 
    <?php foreach ($tasks as $task) : ?> 
        <li> 
            <?php if ($task->completed) : ?> 
              <strike><?= $task->description; ?></strike> 
            <?php else: ?> 
            <?=$task->description; ?>
          <?php endif;?> 
      </li>
    <?php endforeach; ?>


    <!-- <?php foreach ($tasks as $task) : ?> 
        <li> 
            <?= $task->description; ?>
        </li>
    <?php endforeach; ?> -->

    <h1>Submit your name</h1>
    <form action="/tasks" method="POST">
      <input name="description"></input>
      <button type="submit">Submit</button>
    </form>

    <?php require('app/views/partials/footer.php'); ?>