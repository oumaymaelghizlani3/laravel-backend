<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function getOrdersByYear()
    {
        $orders = Commande::selectRaw('YEAR(date) as year, COUNT(*) as total_count')
            ->groupBy('year')
            ->orderBy('year')
            ->get();

        $labels = $orders->pluck('year');
        $data = $orders->pluck('total_count');

        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
    }
}
