<div class="statistics-per-day-container">
    <?php foreach ($completed_tasks_by_date as $date => $count) : ?>
        <li>
            Number of tasks completed on <?= $date ?> : <?= $count ?>
        </li>
    <?php endforeach; ?>
</div>