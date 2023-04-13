<?php
$data = file_get_contents('https://random-data-api.com/api/v2/beer/random_beer?size=10');

$beers = json_decode($data, true);
usort($beers, function($a, $b) {
    return $a['alcohol'] <=> $b['alcohol'];
});

echo "<table>
        <thead>
            <tr>
                <th>Značka</th>
                <th>Název</th>
                <th>Alkohol</th>
            </tr>
        </thead>
        <tbody>";
foreach ($beers as $beer) {
    echo "<tr>
            <td>{$beer['brand']}</td>
            <td>{$beer['name']}</td>
            <td>{$beer['alcohol']} %</td>
        </tr>";
}
echo "</tbody></table>";
?>
