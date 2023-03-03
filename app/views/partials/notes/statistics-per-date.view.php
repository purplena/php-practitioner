<div class="statistics-per-day-container">
    <?php foreach ($completed_tasks_by_date as $date => $count) : ?>
        <div class="completed-tasks-container">
            <p style="font-weight: 700;"><?= dateReformat($date) ?></p>
            <p><span style="font-weight: 700;"><?= $count ?></span> task(s) completed</p>
        </div>
    <?php endforeach; ?>
</div>