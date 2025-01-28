<?php 

require_once 'inc/config.php';
require_once 'inc/api.php';

$city = 'Brazil';
$days = 5;

$results = Api::get($city, $days);

if($results['status'] == 'error'){
    echo $results['message'];
    exit;
}

$data = json_decode($results['data'], true);


// location data
$location = [];
$location['name'] = $data['location']['name'];
$location['region'] = $data['location']['region'];
$location['country'] = $data['location']['country'];
$location['latitude'] = $data['location']['lat'];
$location['longitude'] = $data['location']['lon'];
$location['current_time'] = $data['location']['localtime'];

// current weather data
$current = [];
$current['temperature'] = $data['current']['temp_c'];
$current['condition'] = $data['current']['condition']['text'];
$current['condition_icon'] = $data['current']['condition']['icon'];
$current['wind_speed'] = $data['current']['wind_kph'];

// forecast weather data
$forecast = [];
foreach($data['forecast']['forecastday'] as $day){
    $forecast_day = [];
    $forecast_day['info'] = null;
    $forecast_day['date'] = $day['date'];
    $forecast_day['condition'] = $day['day']['condition']['text'];
    $forecast_day['condition_icon'] = $day['day']['condition']['icon'];
    $forecast_day['max_temp'] = $day['day']['maxtemp_c'];
    $forecast_day['min_temp'] = $day['day']['mintemp_c'];
    $forecast[] = $forecast_day;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-dark text-white">

    <div class="container-fluid mt-5">
        <div class="row justify-content-center mt-5">

            <div class="col-10 p-5 bg-light text-black">
                <h1 class="text-center mb-4">Tempo em <?php echo $location['name'];?></h1>
                
                <div class="row">
                    <div class="col-sm-6">
                        <h5 class="mb-3">Localização</h5>
                        <p>País: <?php echo $location['country'];?></p>
                        <p>Região: <?php echo $location['region'];?></p>
                        <p>Cidade: <?php echo $location['name'];?></p>
                        <p>Data e hora atual: <?php echo $location['current_time'];?></p>
                    </div>
                    <div class="col-sm-6">
                        <h5 class="mb-3">Clima Atual</h5>
                        <p>Temperatura: <?php echo $current['temperature'];?>°C</p>
            </div>

        </div>
    </div>
    
</body>
</html>
