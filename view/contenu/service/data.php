<?php
define('SERVICES', [
        ['Shampoing brushing courts', '30 min', '23.20'],
        ['Shampoing brushing mi longs', '30 min', '29.30'],
        ['Shampoing brushing longs', '45 min', '29.30']
    ]);


function service_html(array $services): string {
    $title = $services[0] ;
    $temps = $services[1];
    $prix = $services[2] ;
    return <<<HTML
    <div class="card-title">$title
        <div class="card-prix">$temps, à partir de $prix €</div>
    </div>
    HTML;
}