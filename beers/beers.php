<?php
$data = file_get_contents('https://random-data-api.com/api/v2/beers?size=10');

$beers = json_decode($data, true);
usort($beers, function($a, $b) {
    return $a['alcohol'] > $b['alcohol'];
});

foreach ($beers as $beer) {
    echo '<tr>';
    echo '<td>' . $beer->brand . '</td>';
    echo '<td>' . $beer->name . '</td>';
    echo '<td>' . $beer->alcohol . '</td>';
    echo '</tr>';
}
?>
