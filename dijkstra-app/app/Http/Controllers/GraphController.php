<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraphController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'start' => ['required', 'regex:/^[A-Ia-i]$/'],
            'end'   => ['required', 'regex:/^[A-Ia-i]$/'],
        ]);
        $start = strtoupper($request->start);
        $end = strtoupper($request->end);

        $graph = [
            'A' => ['B' => 4, 'C' => 2],
            'B' => ['A' => 4, 'D' => 5],
            'C' => ['A' => 2, 'D' => 8, 'E' => 10],
            'D' => ['B' => 5, 'C' => 8, 'E' => 2, 'F' => 6],
            'E' => ['C' => 10, 'D' => 2, 'G' => 3],
            'F' => ['D' => 6, 'H' => 1],
            'G' => ['E' => 3, 'I' => 7],
            'H' => ['F' => 1, 'I' => 2],
            'I' => ['G' => 7, 'H' => 2],
        ];

        $result = $this->dijkstra($graph, $start, $end);

        return view('home', compact('result'));
    }

    private function dijkstra($graph, $start, $end)
    {
        $distances = [];
        $previous = [];
        $nodes = [];

        foreach ($graph as $node => $edges) {
            $distances[$node] = INF;
            $previous[$node] = null;
            $nodes[] = $node;
        }

        $distances[$start] = 0;

        while (!empty($nodes)) {
            usort($nodes, function ($a, $b) use ($distances) {
                return $distances[$a] <=> $distances[$b];
            });

            $current = array_shift($nodes);

            if ($current == $end) break;

            foreach ($graph[$current] as $neighbor => $weight) {
                $alt = $distances[$current] + $weight;

                if ($alt < $distances[$neighbor]) {
                    $distances[$neighbor] = $alt;
                    $previous[$neighbor] = $current;
                }
            }
        }

        $path = [];
        $current = $end;

        while ($current !== null) {
            array_unshift($path, $current);
            $current = $previous[$current];
        }

        return [
            'path' => implode(' → ', $path),
            'distance' => $distances[$end]
        ];
    }
}