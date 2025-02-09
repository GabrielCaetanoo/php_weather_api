<div class="card my-2 p-3">
    <div>
        <?= $weather_info['info'] ?>
    </div>

    <div class="d-flex align-items-center">
        <div class="me-5">
            <img src="<?= $weather_info['condition_icon'] ?>" class="img-fluid d-block">
        </div>
        <?php if(!empty($weather_info['temperature'])) : ?>
            <div class="me-5">
                <h3><?= $weather_info['temperature'] ?>&deg;</h3>
            </div>
        <?php endif; ?>

        <div class="me-5">
            <?= $weather_info['condition']  ?>
        </div>

        <?php if(!empty($weather_info['max_temp'])) : ?>
            <div class="me-5">
                Dia: <?= $weather_info['date'] ?>
            </div>
            <div class="me-5">
                Temperatura Máxima: <?= $weather_info['max_temp'] ?>
            </div>
            <div class="me-5">
                Temperatura Mínima: <?= $weather_info['min_temp'] ?>
            </div>
        <?php endif; ?>
    </div>
</div>