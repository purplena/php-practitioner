<?php require('app/views/partials/head.php'); ?>

<div class="section-container">
    <h1 class="weather-header">
        Weather in Perpignan
    </h1>
    <img class="flag" src="/images/flag.png" alt="flag of Catalonia">

    <div class="weather-section-container">
        <?php foreach ([
            'today'     => ['title' => 'today'],
            'tomorrow'  =>  ['title' => 'tomorrow']
        ] as $key => $value) : ?>
            <div class="weather-container">
                <p class="weather-paragraph">
                    Forcast for <strong><?php echo $value['title']; ?></strong> <br>
                    <strong><?php echo $weather[$key]['date']; ?></strong>
                </p>
                <p class="weather-paragraph">
                    We see <?php echo $weather[$key]['description']; ?><br>
                    Temperature: <strong><?php echo $weather[$key]['temperature']; ?> C</strong> <br>
                    Wind speed: <strong><?php echo $weather[$key]['wind']; ?> m/s</strong>
                </p>
                <img src="<?php echo $weather[$key]['icon_url']; ?>" alt="Weather icon" class="weather-icon">
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require('app/views/partials/footer.php'); ?>