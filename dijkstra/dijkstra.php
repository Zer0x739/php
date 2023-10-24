<?php
    function dijkstra($graph, $start)
{
    $vertices = count($graph);
    $distances = array_fill(0, $vertices, INF);
    $distances[$start] = 0;
    $visited = array_fill(0, $vertices, false);

    for ($i = 0; $i < $vertices - 1; $i++) {
        $minDistance = INF;
        $minIndex = -1;

        for ($j = 0; $j < $vertices; $j++) {
            if (!$visited[$j] && $distances[$j] < $minDistance) {
                $minDistance = $distances[$j];
                $minIndex = $j;
            }
        }

        $visited[$minIndex] = true;

        for ($j = 0; $j < $vertices; $j++) {
            if (!$visited[$j] && $graph[$minIndex][$j] > 0 && $distances[$minIndex] + $graph[$minIndex][$j] < $distances[$j]) {
                $distances[$j] = $distances[$minIndex] + $graph[$minIndex][$j];
            }
        }
    }

    $result = array();
    for ($i = 0; $i < $vertices; $i++) {
        $result[$i] = $distances[$i];
    }

    return $result;
}

$graph = array(
    array(0, 2, 4, 0, 0, 0),
    array(2, 0, 1, 7, 0, 0),
    array(4, 1, 0, 0, 3, 0),
    array(0, 7, 0, 0, 1, 2),
    array(0, 0, 3, 1, 0, 5),
    array(0, 0, 0, 2, 5, 0),
);
$startNode = 0;

$shortestPaths = dijkstra($graph, $startNode);
print_r($shortestPaths);
?>
