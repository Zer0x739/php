<?php

class Graph
{
    private $graph;

    public function __construct(array $graph)
    {
        $this->graph = $graph;
    }

    public function hasPath($start, $end)
    {
        if (!array_key_exists($start, $this->graph) || !array_key_exists($end, $this->graph)) {
            return false; // Start nebo end uzel neexistuje
        }

        $visited = array();
        $queue = new SplQueue();
        $queue->enqueue($start);

        while (!$queue->isEmpty()) {
            $node = $queue->dequeue();

            if (!in_array($node, $visited)) {
                $visited[] = $node;

                if ($node == $end) {
                    return true; // Cesta byla nalezena
                }

                foreach ($this->graph[$node] as $neighbor) {
                    if (!in_array($neighbor, $visited)) {
                        $queue->enqueue($neighbor);
                    }
                }
            }
        }

        return false; // Cesta nebyla nalezena
    }
}

// Příklad použití
$graph = new Graph([
    'A' => ['B', 'C'],
    'B' => ['A', 'D', 'E'],
    'C' => ['A'],
    'D' => ['B'],
    'E' => ['B'],
    'F' => ['C'],
]);

$startNode = 'A';
$endNode = 'F';

if ($graph->hasPath($startNode, $endNode)) {
    echo "Cesta existuje mezi uzly $startNode a $endNode.\n";
} else {
    echo "Cesta neexistuje mezi uzly $startNode a $endNode.\n";
}
